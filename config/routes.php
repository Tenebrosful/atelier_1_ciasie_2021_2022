<?php
use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Doctrine\ORM\EntityManager;
use Slim\Views\Twig;

require_once '../src/Controllers/ProductController.php';
require_once '../src/Controllers/OrderController.php';

$app->get('/',function ($request, $response, array $args){
    $pc = new ProductController($this->get(EntityManager::class));
    $products = $pc->getAll();
    return $this->get(Twig::class)->render($response,"index.html.twig", ['products' => $products]);
});

$app->get('/{id}', function ($request, $response, array $args){
    $pc = new ProductController($this->get(EntityManager::class));
    $prod = $pc->getById($args['id']);
    return $this->get(Twig::class)->render($response,"detail.html.twig", ['prod' => $prod]);
}); 

$app->get('/coop/',function ($request, $response, array $args){
    $pc = new OrderController($this->get(EntityManager::class));
    $order = $pc->getAll();
    return $this->get(Twig::class)->render($response,"cooperative.html.twig", ['order' => $order]);
});



