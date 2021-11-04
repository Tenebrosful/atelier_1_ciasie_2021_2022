<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

require_once 'Order.php';
require_once 'Product.php';

/**
 * @ORM\Entity
 * @ORM\Table(name="productorder")
 */
class ProductOrder
{
    /** 
     * @var Product
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="productOrders")
     */
    private $product;
    /** 
     * @ORM\Id
     * @var Order
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="productOrders")
     */
    private $order;
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $quantity;

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): bool
    {
        $this->product = $product;
        return true;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): bool
    {
        $this->order = $order;
        return true;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): bool
    {
        $this->quantity = $quantity;
        return true;
    }

    public function computePrice() 
    {
        return $this->product->getPrice() * $this->quantity;
    }
}
