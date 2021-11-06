<?php

use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/../database/models/Product.php';

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

    public function getByCateg($array)
    {
        return $this->em->getRepository('Product')->findBy(array('category' => $this->em->getRepository('Category')->findBy(array("id" => $array))));
    }

    public function getAll()
    {
        return $this->em->getRepository(Product::class)->findAll();
    }

    public function encodeProductsJson($array){
      $dataArray = array();
      foreach ($array as $product){
        array_push($dataArray,array(
          'id' => $product->getId(),
          'name' => $product->getName(),
          'price' => $product->getPrice(),
          'amount_unit' => $product->getAmountUnit(),
          'unit' => $product->getUnit(),
          'description' => $product->getDescription(),
          'url_img' => $product->getUrlImg(),
          'category_id' => $product->getCategory()->getId(),
          'producer_id' => null
        ));
      }
      return json_encode($dataArray);
    }
}
