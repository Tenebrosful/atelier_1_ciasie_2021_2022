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

    public function getAll()
    {
        return $this->em->getRepository(Order::class)->findAll();
    }

    public function createOrder(array $args) 
    {
        $order = new Order();
        $order->setClientName($args['name']);
        $order->setClientAdress($args['adress']);
        $order->setClientEmail($args['email']);
        $order->setClientPhone($args['phone']);
        $order->setPaid(false);
        $order->setDelivered(false);
        $this->em->persist($order);
        $this->em->flush();
    }

    public function computeTotalPrice($id) {
        $order = $this->getById($id);
        $pos = $order->getProductOrders();
        $total_price = 0;
        foreach ($pos as $po) {
            $total_price+=$po->getQuantity() * $po->getProduct()->getPrice(); 
        }
        $order->setTotalPrice($total_price);

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