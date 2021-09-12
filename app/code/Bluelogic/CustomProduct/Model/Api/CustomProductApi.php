<?php 

namespace Bluelogic\CustomProduct\Model\Api;

use Psr\Log\LoggerInterface;
//use Magento\Framework\App\Action\Context;
//use Bluelogic\CustomProduct\Model\ResourceModel\CustomProduct\Collection;
use Bluelogic\CustomProduct\Model\CustomProductFactory;
use Bluelogic\CustomProduct\Api\CustomProductInterface;

class CustomProductApi implements CustomProductInterface
{
    protected $logger;
    protected $_customProductFactory;
    
    public function __construct(
        LoggerInterface $logger,
        CustomProductFactory $customProductFactory    
    )
    {
        $this->logger = $logger;
        $this->_customProductFactory = $customProductFactory;
    }
 
    
    public function getAll(){
        try {
            $resultPage = $this->_customProductFactory->create();
            $collection = $resultPage->getCollection(); //Get Collection of module data
            $data = $collection->getData();
            $response = ['success' => true, 'message' => $data];
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
            $this->logger->info($e->getMessage());
        }
        $returnArray = json_encode($response);
        return $returnArray; 
    }
    
    public function getById($entityId){
        try {
            $productModel = $this->_customProductFactory->create();
            $customProduct = $productModel->load($entityId);
            $data = [
                'entity_id' => $customProduct->getEntityId(),
                'sku' => $customProduct->getSku(),
                'vendor_number' => $customProduct->getVendorNumber(),
                'vendor_note' => $customProduct->getVendorNote(),
                'created_at' => $customProduct->getCreatedAt(),
                'updated_at' => $customProduct->getUpdatedAt()    
            ];
            //var_dump($customProduct->getSku()); exit;
            $response = ['success' => true, 'message' => $data];
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
            $this->logger->info($e->getMessage());
        }
        $returnArray = json_encode($response);
        return $returnArray; 
    }
    
    public function save(){
        try {
            // TODO
            $response = ['success' => true, 'message' => "Product Saved Successfully"];
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
            $this->logger->info($e->getMessage());
        }
        $returnArray = json_encode($response);
        return $returnArray; 
    }
    
    public function deleteById($productId){
        try {
            // TODO
            
            $response = ['success' => true, 'message' => "Product ID: ".$productId." deleted successfully"];
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
            $this->logger->info($e->getMessage());
        }
        $returnArray = json_encode($response);
        return $returnArray; 
    }
}
