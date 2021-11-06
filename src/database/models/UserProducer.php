<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

require_once 'Producer.php';

/**
 * @ORM\Entity
 * @ORM\Table(name="userproducer")
 */
class UserProducer
{
    /** 
     * @var Producer
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Producer")
     */
    private $producer;

    /**
     *    @var string
     *    @ORM\Column(type="string")
     */
    private $username;

    /**
     *    @var string
     *    @ORM\Column(type="string")
     */
    private $password;

    public function getProducer(): Producer
    {
        return $this->producer;
    }

    public function setProducer(Producer $producer): bool
    {
        $this->producer = $producer;
        return true;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): bool
    {
        $this->username = $username;
        return true;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): bool
    {
        $this->password = $password;
        return true;
    }
    
}
