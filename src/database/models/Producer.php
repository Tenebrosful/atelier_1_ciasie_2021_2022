<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="producer")
 */
class Producer
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
    private $name;
    /**
     *    @var string
     *    @ORM\Column(type="string")
     */
    private $description;
    /**
     *    @var string
     *    @ORM\Column(type="string")
     */
    private $url_img;
    /**
     *    @var string
     *    @ORM\Column(type="string")
     */
    private $adress;
    /**
     *    @var string
     *    @ORM\Column(type="string")
     */
    private $email;
    /**
     *    @var string
     *    @ORM\Column(type="string")
     */
    private $phone;
    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="producer")
     * @var Product[]
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): bool
    {
        $this->name = $name;
        return true;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): bool
    {
        $this->description = $description;
        return true;
    }

    public function getUrlImg(): string
    {
        return $this->url_img;
    }

    public function setUrlImg(string $url_img): bool
    {
        $this->url_img = $url_img;
        return true;
    }

    public function getAdress(): string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): bool
    {
        $this->adress = $adress;
        return true;
    }

    public function getEmail(): string
    {
        return $this->description;
    }

    public function setEmail(string $email): bool
    {
        $this->email = $email;
        return true;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): bool
    {
        $this->phone = $phone;
        return true;
    }

    public function getProducts()
    {
        return $this->products;
    }
    
    public function addProduct(Product $product) {
        $this->products[] = $product;
    }
}
