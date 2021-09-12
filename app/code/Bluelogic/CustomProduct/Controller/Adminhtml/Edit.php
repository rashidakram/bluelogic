<?php
namespace Bluelogic\CustomProduct\Controller\Adminhtml\CustomProduct;
 
use Bluelogic\CustomProduct\Controller\Adminhtml\CustomProduct;
 
class Edit extends CustomProduct
{
    /**
     * @return void
     */
    public function execute()
    {
        $productId = $this->getRequest()->getParam('id');
 
        $model = $this->customproductFactory->create();
 
        if ($productId) {
            $model->load($postId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This Product no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }
 
        // Restore previously entered form data from session
        $data = $this->_session->getCustomProductData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register('bluelogic_customproduct', $model);
 
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Bluelogic_CustomProduct::products_list');
        $resultPage->getConfig()->getTitle()->prepend(__('Custom Products'));
 
        return $resultPage;
    }
}