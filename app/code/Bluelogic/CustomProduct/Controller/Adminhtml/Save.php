<?php
namespace Bluelogic\CustomProduct\Controller\Adminhtml\CustomProduct;
 
use Bluelogic\CustomProduct\Controller\Adminhtml\CustomProduct;
 
class Save extends CustomProduct
{
    /**
     * @return void
     */
    public function execute()
    {
        $isProduct = $this->getRequest()->getCustomProduct();
 
        if ($isProduct) {
            $productModel = $this->customproductFactory->create();
            $productId = $this->getRequest()->getParam('id');
 
            if ($productId) {
                $productModel->load($productId);
            }
            $formData = $this->getRequest()->getParam('customproduct');
            $productModel->setData($formData);
 
            try {
                // Save
                $productModel->save();
 
                // Display success message
                $this->messageManager->addSuccess(__('The product has been saved.'));
 
                // Check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', ['id' => $productModel->getId(), '_current' => true]);
                    return;
                }
 
                // Go to grid page
                $this->_redirect('*/*/');
                return;
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
 
            $this->_getSession()->setFormData($formData);
            $this->_redirect('*/*/edit', ['id' => $productId]);
        }
    }
}