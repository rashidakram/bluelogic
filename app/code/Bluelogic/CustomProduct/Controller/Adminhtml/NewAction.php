<?php
namespace Bluelogic\CustomProduct\Controller\Adminhtml\CustomProduct;
 
use Bluelogic\CustomProduct\Controller\Adminhtml\CustomProduct;
 
class NewAction extends CustomProduct
{
    /**
     * Create new custom product action
     *
     * @return void
     */
    public function execute()
    {
        $this->_forward('edit');
    }
}