<?php
declare(strict_types=1);

namespace Monogo\Weather\Controller\Index;

use Magento\Framework\App\Action\{
    Action,
    Context
};
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Monogo\Weather\Controller\Index
 */
class Index extends Action
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * {@inheritDoc}
     */
    public function execute()
    {
        return $this->pageFactory->create();
    }
}
