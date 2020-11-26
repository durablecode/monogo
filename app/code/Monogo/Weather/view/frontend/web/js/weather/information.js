
define([
    'ko',
    'jquery',
    'uiComponent',
    'mage/url'
], function (
    ko,
    $,
    Component,
    urlBuilder
) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Monogo_Weather/weather/information'
        },
        initObservable: function () {
            return this._super()
                .observe(['description', 'temp', 'tempMin', 'tempMax', 'windSpeed', 'windDeg', 'pressure', 'humidity', 'countDown']);
        },
        initialize: function (config) {
            console.log(config);
            var self = this,
                refreshTime = config.refreshInterval * 60000,
                countDown = refreshTime,
                second = 1000;

            this.refreshData().done(function() {
                setInterval(function() {
                    var minutes = Math.floor((countDown % (second * 60 * 60)) / (second * 60));
                    var seconds = Math.floor((countDown % (second * 60)) / second);

                    self.countDown(minutes+':'+seconds);
                    if(countDown == 0) {
                        self.refreshData().done(function() {
                            countDown = refreshTime;
                        });
                    } else {
                        countDown -= second;
                    }

                }, second);
            });

            this._super();
        },
        refreshData: function() {
            var self = this;
            return this.request().done(function(data) {
                self.description(data.description);
                self.temp(data.temp);
                self.tempMin(data.min_temp);
                self.tempMax(data.max_temp);
                self.windSpeed(data.wind_speed);
                self.windDeg(data.wind_deg);
                self.pressure(data.pressure);
                self.humidity(data.humidity);
            });
        },
        request: function() {
            var url = urlBuilder.build('rest/V1/weather/current');

            return $.get(url);
        }
    });
});
