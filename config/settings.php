<?php

// settings.php
use DI\ContainerBuilder;

define('APP_ROOT', __DIR__);

return function (ContainerBuilder $containerBuilder) {
    if (is_array($bddConfig = parse_ini_file(__DIR__ . '/bdd.ini')))
        $containerBuilder->addDefinitions([
            'settings' => [
                'displayErrorDetails' => true,
                'determineRouteBeforeAppMiddleware' => false,

                'doctrine' => [
                    // if true, metadata caching is forcefully disabled
                    'dev_mode' => true,

                    // path where the compiled metadata info will be cached
                    // make sure the path exists and it is writable
                    'cache_dir' => APP_ROOT . '/var/doctrine',

                    // you should add any other path containing annotated entity classes
                    'metadata_dirs' => [APP_ROOT . '/../src/database/models'],

                    'connection' => $bddConfig
                ],
                'twig' => [
                    'paths' => [
                        __DIR__ . '/../src/views'
                    ],
                    'options' => [
                        'cache_enabled' => false,
                        'cache_path' => __DIR__ . '/../var/twig',
                    ]
                ]
            ]
        ]);
    else {
        echo "ERREUR : Fichier de configuration de la base de donnée introuvable";
        exit();
    }
};
