<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="`order`")
 */
class Order
{
    /**
     *    @var int
     *    @ORM\Id
     *    @ORM\Column(type="integer")
     *    @ORM\GeneratedValue
     */
    private $id;
    /**
     *    @var string
     *    @ORM\Column(type="string")
     */
    private $client_name;
    /**
     *    @var string
     *    @ORM\Column(type="string")
     */
    private $client_adress;
    /**
     *    @var string
     *    @ORM\Column(type="string")
     */
    private $client_email;
    /**
     *    @var string
     *    @ORM\Column(type="string")
     */
    private $client_phone;
    /**
     *    @var float
     *    @ORM\Column(type="float")
     */
    private $total_price;
    /**
     *    @var bool
     *    @ORM\Column(type="boolean")
     */
    private $delivered;
    /**
     *    @var string
     *    @ORM\Column(type="boolean")
     */

    public function __construct()
    {
       
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getClientName(): string
    {
        return $this->client_name;
    }

    public function setClientName(string $client_name): bool
    {
        $this->client_name = $client_name;
        return true;
    }

    public function getClientAdress(): string
    {
        return $this->client_adress;
    }

    public function setClientAdress(string $client_adress): bool
    {
        $this->client_adress = $client_adress;
        return true;
    }

    public function getClientEmail(): string
    {
        return $this->client_email;
    }

    public function setClientEmail(string $client_email): bool
    {
        $this->client_email = $client_email;
        return true;
    }

    public function getClientPhone(): string
    {
        return $this->client_phone;
    }

    public function setClientPhone(string $client_phone): bool
    {
        $this->client_phone = $client_phone;
        return true;
    }

    public function getTotalPrice(): float
    {
        return $this->total_price;
    }

    public function setTotalPrice(string $total_price): bool
    {
        $this->total_price = $total_price;
        return true;
    }

    public function getDelivered(): bool
    {
        return $this->delivered;
    }

    public function setDelivered(bool $delivered): bool
    {
        $this->delivered = $delivered;
        return true;
    }

    public function getPaid(): bool
    {
        return $this->paid;
    }

    public function setPaid(bool $paid): bool
    {
        $this->paid = $paid;
        return true;
    }

    public function getProductOrders()
    {
        return $this->productOrders;
    }

    public function addProductOrder($productOrder): bool 
    {
        $this->productOrders[] = $productOrder;
        return true;
    }
}
