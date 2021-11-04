<?php 

use Doctrine\ORM\EntityManager;

require_once '/database/models/Producer';

class OrderController {

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

}