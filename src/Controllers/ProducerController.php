<?php

use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/../database/models/Producer.php';

class ProducerController {

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getById(int $id): Order
    {
        return $this->em->find('Producer',$id);
    }

    public function getAll()
    {
        return $this->em->getRepository(Producer::class)->findAll();
    }

    public function getByPage($page)
    {
        if($page != 1){
          $page = 10*($page-1);
        }

        $qb = $this->em->createQueryBuilder();
        $qb->add('select', 'p')
           ->add('from', 'Producer p')
           ->add('orderBy', 'p.name ASC')
           ->setFirstResult( $page -1 )
           ->setMaxResults( 10 );
        return $qb->getQuery()->getResult();
    }

    public function createProducer(array $args)
    {
        $producer = new Producer();
        $producer->setName($args['name']);
        $producer->setAdress($args['adress']);
        $producer->setEmail($args['email']);
        $producer->setPhone($args['phone']);
        $this->em->persist($producer);
        $this->em->flush();
    }

    public function deleteProducer(int $id): bool
    {
        if ($producer = $this->getById($id) != null) {
            $this->em->remove($producer);
            $this->em->flush();
            return true;
        }
        return false;
    }

    public function encodeProductsJson($array){
      $dataArray = array();
      foreach ($array as $product){
        array_push($dataArray,array(
          'id' => $product->getId(),
          'name' => $product->getName(),
          'email' => $product->getEmail(),
          'phone' => $product->getPhone(),
          'description' => $product->getDescription(),
          'url_img' => $product->getUrlImg()
        ));
      }
      return json_encode($dataArray);
    }

}
