<?php

namespace Bluelogic\CustomProduct\Controller\Adminhtml;

abstract class CustomProduct extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Bluelogic_CustomProduct::customproduct';

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Registry $coreRegistry)
    {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    /**
     * Init page
     *
     * @param \Magento\Backend\Model\View\Result\Page $resultPage
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function initPage($resultPage)
    {
        $resultPage->setActiveMenu('Bluelogic_CustomProduct::bluelogic_customproduct')
            ->addBreadcrumb(__('CustomProduct'), __('CustomProduct'))
            ->addBreadcrumb(__('Bluelogic Products'), __('Bluelogic Products'));
        return $resultPage;
    }
}
