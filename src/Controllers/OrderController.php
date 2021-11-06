<?php 

use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/../database/models/Order.php';

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
        return $this->em->find('Order',$id);
    }
    public function setDelivered(int $id) {
        $order = $this->getById($id);
        $order->setDelivered(!$order->getDelivered());
        $this->em->persist($order);
        $this->em->flush();
    }
    public function getAll()
    {
        return $this->em->getRepository(Order::class)->findAll();
    }

    public function createOrder(array $args) 
    {
        $order = new Order();
        $order->setClientName($args['name']);
        $order->setClientAdress($args['address']);
        $order->setClientEmail($args['mail']);
        $order->setClientPhone($args['phone']);
        $order->setPaid(false);
        $order->setDelivered(false);
        $order->setTotalPrice(0);
        $this->em->persist($order);
        $this->em->flush();
        return $order;
    }

    public function computeTotalPrice($id,$price) {
        $order = $this->getById($id);
        $order->setTotalPrice($price);
        $this->em->persist($order);
        $this->em->flush();
    }
    public function deleteOrder(int $id): bool
    {
        if ($order = $this->getById($id) != null) {
            $this->em->remove($order);
            $this->em->flush();
            return true;
        }
        return false;
    }

}