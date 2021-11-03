<?php 
declare(strict_types=1);

use DI\ContainerBuilder;

use Psr\Container\ContainerInterface;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Cache\FilesystemCache;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Tools\Setup;

use Slim\Views\Twig;
use Slim\Flash\Messages;

return function (ContainerBuilder $containerBuilder){
    $containerBuilder->addDefinitions([
        EntityManager::class => function (ContainerInterface $container): EntityManager{
            $settings = $container->get('settings');
            $config = Setup::createAnnotationMetadataConfiguration(
                $settings['doctrine']['metadata_dirs'],
                $settings['doctrine']['dev_mode']
            );
            $config->setMetadataDriverImpl(
                new AnnotationDriver(
                    new AnnotationReader,
                    $settings['doctrine']['metadata_dirs']
                )
            );
            $config->setMetadataCacheImpl(
                new FilesystemCache(composer require "twig/twig:^2.0"
            return EntityManager::create(
                $settings['doctrine']['connection'],
                $config
            );
        },
        Twig::class => function (ContainerInterface $container) {
            $settings = $container->get('settings');
            $twigSettings = $settings['twig'];

            $options = $twigSettings['options'];
            $options['cache'] = $options['cache_enabled'] ? $options['cache_path'] : false;

            $twig = Twig::create($twigSettings['paths'], $options);

            return $twig;
        },
        Messages::class => function (ContainerInterface $container) {
            return new Messages();
            }

    ]);
};