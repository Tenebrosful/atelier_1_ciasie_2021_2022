<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Category
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
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
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

    public function getProducts()
    {
        return $this->products;
    }
}
