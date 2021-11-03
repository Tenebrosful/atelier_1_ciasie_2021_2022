<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
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
     *    @var float
     *    @ORM\Column(type="float")
     */
    private $price;
    /**
     *    @var float
     *    @ORM\Column(type="float")
     */
    private $amount_unit;
    /**
     *    @var string
     *    @ORM\Column(type="string")
     */
    private $unit;
    /**
     * @var Category
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     */
    private $category;
    /**
     * @var Producer
     * @ORM\ManyToOne(targetEntity="Producer", inversedBy="products")
     */
    private $producer;
    /**
     * @var ProductOrder[]
     * @ORM\OneToMany(targetEntity="ProductOrder",mappedBy="product")
     */
    private $productOrders;

    public function __construct()
    {
        $this->productOrders = new ArrayCollection();
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

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): bool
    {
        if ($price < 0) return false;

        $this->price = $price;
        return true;
    }

    public function getAmountUnit(): int
    {
        return $this->amount_unit;
    }

    public function setAmountUnit(int $amount_unit): bool
    {
        if ($amount_unit < 0) return false;

        $this->amount_unit = $amount_unit;
        return true;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): bool
    {
        $this->unit = $unit;
        return true;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): bool
    {
        $category->addProduct($this);
        $this->category = $category;
        return true;
    }

    public function getProducer(): Producer
    {
        return $this->producer;
    }

    public function setProducer(Producer $producer): bool
    {
        $producer->addProduct($this);
        $this->producer = $producer;
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
