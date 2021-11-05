<?php

use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Doctrine\ORM\EntityManager;
use Slim\Views\Twig;

require_once '../src/Controllers/ProductController.php';
require_once '../src/Controllers/CategoryController.php';
require_once '../src/Controllers/OrderController.php';
require_once '../src/Controllers/ProducerController.php';
require_once '../src/Controllers/UserProducerController.php';

$app->get('/', function ($request, $response, array $args) {
    $pc = new ProductController($this->get(EntityManager::class));
    $ct = new CategoryController($this->get(EntityManager::class));
    $products = $pc->getAll();
    $categories = $ct->getAll();
    return $this->get(Twig::class)->render($response,"index.html.twig", ['products' => $products, 'categories' => $categories]);
});

$app->get('/product/{id}', function ($request, $response, array $args) {
    $pc = new ProductController($this->get(EntityManager::class));
    $prod = $pc->getById($args['id']);
    return $this->get(Twig::class)->render($response, "detail.html.twig", ['prod' => $prod]);
});

$app->get('/panier', function ($request, $response, array $args) {
    $panier = $_SESSION['panier'];
    $panier_display = array();
    foreach ($panier as $item) {
        $po = new ProductOrder();
        $prod = (new ProductController($this->get(EntityManager::class)))->getById(intval($item[0]));
        $po->setProduct($prod);
        $po->setQuantity($item[1]);
        array_push($panier_display, $po);
    }
    return $this->get(Twig::class)->render($response, "panier.html.twig", ['panier' => $panier_display]);
});

$app->get('/panier/empty', function ($request, $response, array $args) {
    $_SESSION['panier'] = array();
    return $this->get(Twig::class)->render($response, "panier.html.twig", ['panier' => null]);
});

$app->post('/panier/add/{id}', function ($request, $response, array $args) {
    $already_in = false;
    $quantity = intval($request->getParsedBody()['qnt_article']);

    if ($quantity > 0) {
        //Check si l'item est déjà présent dans le panier
        for ($i = 0; $i < count($_SESSION['panier']); $i++) {

            if ($_SESSION['panier'][$i][0] == $args['id']) {
                $_SESSION['panier'][$i][1] += $quantity;
                $already_in = true;
            }
        }
        if (!$already_in) {
            array_push($_SESSION['panier'], [$args['id'], $quantity]);
        }
    }

    return $this->get(Twig::class)->render($response, "index.html.twig");
});

$app->post('/panier/validation', function ($request, $response, array $args) {
    $parsedBody = $request->getParsedBody();
    $oc = new OrderController($this->get(EntityManager::class));
    $order = $oc->createOrder($parsedBody);
    $total_price = 0;
    foreach ($_SESSION['panier'] as $item) {
        $po = new ProductOrder();
        $prod = (new ProductController($this->get(EntityManager::class)))->getById($item[0]);
        $po->setProduct($prod);
        $po->setQuantity($item[1]);
        $po->setOrder($order);
        $total_price+=$prod->getPrice() * $item[1];
        $this->get(EntityManager::class)->persist($po);
        $this->get(EntityManager::class)->flush();
    }
    $oc->computeTotalPrice($order->getId(),$total_price);
    $_SESSION['panier'] = array();
    return $this->get(Twig::class)->render($response, "panier.html.twig");
});

$app->get('/products', function ($request, $response, array $args) {
    $pc = new ProductController($this->get(EntityManager::class));
    $products = $pc->encodeProductsJson($pc->getByCateg(explode(',', $request->getQueryParams()["categ"])));
    $response->getBody()->write(json_encode($products));
    return $response;
});

$app->get('/signIn', function ($request, $response) {
    if (isset($_SESSION["messageErrorSignin"])) {
        return $this->get(Twig::class)->render($response, 'signIn.html.twig', ['messageError' => $_SESSION["messageErrorSignin"]]);
    } else {
        return $this->get(Twig::class)->render($response, 'signIn.html.twig');
    }
});

$app->get('/producer', function ($request, $response) {
    if (isset($_SESSION["userId"])){
        $poc = new UserProducerController($this->get(EntityManager::class));
        $productOrders = $poc->getMyProduct();
        return $this->get(Twig::class)->render($response, 'producer.html.twig', ['productOrders' => $productOrders, 'producerName' => $_SESSION["userName"]]);
    } else {
        return $this->get(Twig::class)->render($response, 'signIn.html.twig');
    }
});

$app->post('/signIn', function ($request, $response) {
    $parsedBody = $request->getParsedBody();
    $upc = new UserProducerController($this->get(EntityManager::class));
    $upc->signIn($parsedBody);
    if(isset($_SESSION["messageErrorSignin"]) &&  (!isset($_SESSION["userId"]))){
        return $this->get(Twig::class)->render($response, 'signIn.html.twig', ['messageError' => $_SESSION["messageErrorSignin"]]);
    } else {
        header("Location:http://localhost:8080/");
        exit();
    }
});


$app->get('/coop', function ($request, $response, array $args) {
    $pc = new OrderController($this->get(EntityManager::class));
    $order = $pc->getAll();
    return $this->get(Twig::class)->render($response, "cooperative.html.twig", ['order' => $order]);
});

$app->get('/producers',function ($request, $response, array $args){
    $pc = new ProducerController($this->get(EntityManager::class));
    if(isset($request->getQueryParams()["page"])){
      $producers =$pc->encodeProductsJson($pc->getByPage($request->getQueryParams()["page"]));
      $response->getBody()->write(json_encode($producers));
      return $response;
    }else{
      $producers = $pc->getAll();
      return $this->get(Twig::class)->render($response,"producers.html.twig", ['producers' => $producers]);
    }
});
