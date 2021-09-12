<?php
namespace Bluelogic\CustomProduct\Model\ResourceModel\CustomProduct;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'entity_id';
	protected $_eventPrefix = 'bluelogic_customproduct_collection';
	protected $_eventObject = 'customproduct_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Bluelogic\CustomProduct\Model\CustomProduct', 'Bluelogic\CustomProduct\Model\ResourceModel\CustomProduct');
	}

}
