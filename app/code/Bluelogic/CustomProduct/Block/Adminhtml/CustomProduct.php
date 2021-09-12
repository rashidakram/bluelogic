<?php
namespace Bluelogic\CustomProduct\Block\Adminhtml;

class CustomProduct extends \Magento\Backend\Block\Widget\Grid\Container
{

	protected function _construct()
	{
		$this->_controller = 'adminhtml_customproduct';
		$this->_blockGroup = 'Bluelogic_CustomProduct';
		$this->_headerText = __('Custom Products');
		$this->_addButtonLabel = __('Create New Custom Product');
		parent::_construct();
	}
}