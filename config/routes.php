<?php

use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Doctrine\ORM\EntityManager;
use Slim\Views\Twig;

require_once '../src/Controllers/ProductController.php';

$app->get('/', function ($request, $response, array $args) {
    $pc = new ProductController($this->get(EntityManager::class));
    $products = $pc->getAll();
    session_start();

    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
    }

    return $this->get(Twig::class)->render($response, "index.html.twig", ['products' => $products]);
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
        $panier = $_SESSION['panier'];
        $already_in = false;
        $quantity = $request->getParsedBody()['input'];
        foreach ($panier as $item) {
            $item2 = unserialize($item);
            if ($item2->getProduct()->getId() == $args['id']) {
                $old_qty = $item2->getQuantity();
                $item2->setQuantity(3);
                $already_in = true;
                $item = serialize($item2);
            }
        }
        if (!$already_in) {
            $po = [$args['id'],$request->getParsedBody()['input']];
            
            array_push($_SESSION['panier'],serialize($po));
        }
    }
    return $this->get(Twig::class)->render($response, "index.html.twig");
});

$app->get('/coop/', function ($request, $response, array $args) {
    return $this->get(Twig::class)->render($response, "cooperative.html.twig");
});
