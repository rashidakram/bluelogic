<?php
namespace Bluelogic\CustomProduct\Model\ResourceModel;

class CustomProduct extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('bluelogic_customproduct', 'entity_id');
	}
	
}