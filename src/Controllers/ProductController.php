<?php 

use Doctrine\ORM\EntityManager;

require_once '/database/models/Product';

class ProductController {

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em; 
    }

    public function getById(int $id): Product
    {
        return $this->em->find('Product',$id);
    }

    public function getAll()
    {
        return $this->em->getRepository(Product::class)->findAll();
    }
}