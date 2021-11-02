<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="productorder")
 */
class ProductOrder
{
    /**
     * @var Product
     * @ORM\OneToOne(targetEntity="Product")
     */
    private $product;
    /**
     * @var Order
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="products")
     */
    private $order;

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
}
