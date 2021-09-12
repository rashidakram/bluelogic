<?php
namespace Bluelogic\CustomProduct\Model;
class CustomProduct extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'bluelogic_customproduct';

	protected $_cacheTag = 'bluelogic_customproduct';

	protected $_eventPrefix = 'bluelogic_customproduct';

	protected function _construct()
	{
		$this->_init('Bluelogic\CustomProduct\Model\ResourceModel\CustomProduct');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}