<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="usermanager")
 */
class UserManager
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
    private $username;

    /**
     *    @var string
     *    @ORM\Column(type="string")
     */
    private $password;

    public function getId(): int
    {
        return $this->id;
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
