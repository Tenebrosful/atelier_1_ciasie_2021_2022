<?php
use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Doctrine\ORM\EntityManager;
use Slim\Views\Twig;

require_once '../src/Controllers/ProductController.php';

$app->get('/',function ($request, $response, array $args){
    $pc = new ProductController($this->get(EntityManager::class));
    $products = $pc->getAll();
    return $this->get(Twig::class)->render($response,"index.html.twig", ['products' => $products]);
});

$app->get('/coop',function ($request, $response, array $args){
    return $this->get(Twig::class)->render($response,"cooperative.html.twig");
});



