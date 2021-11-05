<?php

use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Doctrine\ORM\EntityManager;
use Slim\Views\Twig;

require_once '../src/Controllers/ProductController.php';
require_once '../src/Controllers/CategoryController.php';
require_once '../src/Controllers/OrderController.php';

$app->get('/',function ($request, $response, array $args){
    $pc = new ProductController($this->get(EntityManager::class));
    $ct = new CategoryController($this->get(EntityManager::class));
    $products = $pc->getAll();
    $categories = $ct->getAll();
    return $this->get(Twig::class)->render($response,"index.html.twig", ['products' => $products, 'categories' => $categories]);
});

$app->get('/{id}', function ($request, $response, array $args) {
    $pc = new ProductController($this->get(EntityManager::class));
    $prod = $pc->getById($args['id']);
    return $this->get(Twig::class)->render($response, "detail.html.twig", ['prod' => $prod]);
});

$app->get('/panier/', function ($request, $response, array $args) {
    session_start();
    $panier = $_SESSION['panier'];
    $panier_display = array();
    foreach ($panier as $item) {
        array_push($panier_display, unserialize($item));
    }
    return $this->get(Twig::class)->render($response, "panier.html.twig", ['panier' => $panier_display]);
});

$app->post('/panier/add/{id}', function ($request, $response, array $args) {
    session_start();
    if (isset($_SESSION['panier'])) {
        $prod = (new ProductController($this->get(EntityManager::class)))->getById($args['id']);
        $already_in = false;
        $quantity = $request->getParsedBody()['input'];

        //Check si l'item est déjà présent dans le panier
        for ($i=0; $i<count($_SESSION['panier']); $i++ ) {
            $item = unserialize($_SESSION['panier'][$i]);
            if ($item->getProduct()->getId() == $args['id']) {
                $old_qty = $item->getQuantity();
                $item->setQuantity($old_qty + $quantity);
                $_SESSION['panier'][$i] = serialize($item);
                $already_in = true;
            }
        }
        if (!$already_in) {
            $po = new ProductOrder();
            $po->setProduct($prod);
            $po->setQuantity($quantity);
            array_push($_SESSION['panier'],serialize($po));
        }
    }
    return $this->get(Twig::class)->render($response, "index.html.twig");
});

$app->get('/products/', function ($request, $response, array $args){
    $pc = new ProductController($this->get(EntityManager::class));
    $products = $pc->encodeProductsJson($pc->getAll());
    $response->getBody()->write(json_encode($products));
    return $response;
});


$app->get('/coop/',function ($request, $response, array $args){
    $pc = new OrderController($this->get(EntityManager::class));
    $order = $pc->getAll();
    return $this->get(Twig::class)->render($response,"cooperative.html.twig", ['order' => $order]);
});
