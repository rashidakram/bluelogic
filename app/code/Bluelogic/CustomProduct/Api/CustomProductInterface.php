<?php 

namespace Bluelogic\CustomProduct\Api;

interface CustomProductInterface
{
    /**
     * GET get all products
     * @return array
     */
    public function getAll();
    
    /**
     * GET get single product by Entity ID
     * @param string $entityId
     * @return string
     */
    public function getById($entityId);
    
    /**
     * POST save product
     * @return Bluelogic\CustomProduct\Model\CustomProduct
     */
    public function save();
    
    /**
     * DELETE delete single product by Entity ID
     * @param string $entityId
     * @return string
     */
    public function deleteById($entityId);
}
