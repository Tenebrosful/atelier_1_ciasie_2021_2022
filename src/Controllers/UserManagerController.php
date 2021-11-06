<?php

use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/../database/models/UserManager.php';
require_once __DIR__ . '/../database/models/ProductOrder.php';

class UserManagerController {

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getAll()
    {
        return $this->em->getRepository(UserManager::class)->findAll();
    }

    public function createUserManager(array $args)
    {
        $manager = new UserManager();
        $manager->setUsername($args["username"]);
        $manager->setpassword(password_hash($args["password"],PASSWORD_DEFAULT));
        $this->em->persist($manager);
        $this->em->flush();
    }

    public function signIn(array $args){

        if ($args['username'] != "" && $args['password'] != ""){
            $user = $this->em->getRepository(UserManager::class)->findOneBy(['username' => $args['username']]);
            if ($user == null || !password_verify($args['password'], $user->getPassword())) {
                $_SESSION["messageErrorSignin"] = "Les identifiants ne correspondent pas à un compte enregistré.";
            }
            else {
                $_SESSION["userId"] = $user->getId();
                $_SESSION["typeUser"] = "gerant";
            }
        } else {
            $_SESSION["messageErrorSignin"] = "Veuillez remplir tous les champs !";
        }
    }
}
