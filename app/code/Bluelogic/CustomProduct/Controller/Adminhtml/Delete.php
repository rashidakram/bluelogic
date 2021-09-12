<?php
namespace Bluelogic\CustomProduct\Controller\Adminhtml\CustomProduct;
 
use Bluelogic\CustomProduct\Controller\Adminhtml\CustomProduct;
 
class Delete extends CustomProduct
{
    public function execute()
    {
        $productId = (int) $this->getRequest()->getParam('id');
 
        if ($productId) {
            /** @var $productModel \Bluelogic\CustomProduct\Model\CustomProduct */
            $productModel = $this->customproductFactory->create();
            $productModel->load($productId);
 
            // Check this news exists or not
            if (!$productModel->getId()) {
                $this->messageManager->addError(__('This product no longer exists.'));
            } else {
                try {
                    // Delete
                    $productModel->delete();
                    $this->messageManager->addSuccess(__('The product has been deleted.'));
 
                    // Redirect to grid page
                    $this->_redirect('*/*/');
                    return;
                } catch (\Exception $e) {
                    $this->messageManager->addError($e->getMessage());
                    $this->_redirect('*/*/edit', ['id' => $productModel->getId()]);
                }
            }
        }
    }
}