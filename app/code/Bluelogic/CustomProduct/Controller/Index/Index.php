<?php
namespace Bluelogic\CustomProduct\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	protected $_productFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Bluelogic\CustomProduct\Model\CustomProductFactory $productFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_productFactory = $productFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$product = $this->_productFactory->create();
		$collection = $product->getCollection();
		foreach($collection as $item){
			echo "<pre>";
			print_r($item->getData());
			echo "</pre>";
		}
		exit();
		return $this->_pageFactory->create();
	}
}