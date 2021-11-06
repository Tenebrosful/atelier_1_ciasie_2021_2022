<?php

use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/../database/models/UserProducer.php';
require_once __DIR__ . '/../database/models/Producer.php';
require_once __DIR__ . '/../database/models/ProductOrder.php';

class UserProducerController {

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
        return $this->em->getRepository(UserProducer::class)->findAll();
    }

    public function createUserProducer(array $args)
    {
        $producer = new UserProducer();
        $producer->setProducer($this->em->find('Producer',$args["id"]));
        $producer->setUsername($args["username"]);
        $producer->setpassword(password_hash($args["password"],PASSWORD_DEFAULT));
        $this->em->persist($producer);
        $this->em->flush();
    }

    public function signIn(array $args){

        if ($args['username'] != "" && $args['password'] != ""){
            $user = $this->em->getRepository(UserProducer::class)->findOneBy(['username' => $args['username']]);
            if ($user == null || !password_verify($args['password'], $user->getPassword())) {
                $_SESSION["messageErrorSignin"] = "Les identifiants ne correspondent pas à un compte enregistré.";
            }
            else {
                $_SESSION["userName"] = $user->getProducer()->getName();
                $_SESSION["userId"] = $user->getProducer()->getId();
            }
        } else {
            $_SESSION["messageErrorSignin"] = "Veuillez remplir tous les champs !";
        }
    }

    public function getMyProduct(){
        $qb = $this->em->createQuery(`SELECT COUNT(pr.id) AS nb, p as po, SUM(p.quantity) AS quantity
        FROM ProductOrder p JOIN p.product pr JOIN p.order o JOIN pr.producer pdc
        WHERE pdc.id = `.$_SESSION['userId'].` AND o.delivered = 0 GROUP BY pr.id`);
        return $qb->getResult();
    }

}
