<?php
//https://stackoverflow.com/questions/59639893/how-to-use-doctrine-with-slim-framework-4

use Slim\Factory\AppFactory;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use DI\ContainerBuilder;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$app = \DI\Bridge\Slim\Bridge::create();

// Instantiate PHP-DI ContainerBuilder
$containerBuilder = new ContainerBuilder();

// Set up settings
$settings = require __DIR__ . '/../config/settings.php';
$settings($containerBuilder);

// Set up dependencies
$dependencies = require __DIR__ . '/../config/dependencies.php';
$dependencies($containerBuilder);


// Build PHP-DI Container instance
$container = $containerBuilder->build();

// Instantiate the app
AppFactory::setContainer($container);
$app = AppFactory::create();

//$app = \DI\Bridge\Slim\Bridge::create($container);

require __DIR__ . '/../config/routes.php';

$app->run();