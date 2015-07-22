<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Kisphp\Core\Factory;

$app = new Silex\Application();
$app['debug'] = true;

$app['factory'] = new Factory($app);

$app['swiftmailer.options'] = array(
    'host' => 'localhost',
    'port' => '25',
    'username' => '',
    'password' => '',
    'encryption' => null,
    'auth_mode' => null
);

$app->register(new \Silex\Provider\TranslationServiceProvider(), [
    'locale_fallbacks' => ['en'],
]);
$app->register(new \Silex\Provider\TwigServiceProvider(), [
    'twig.path' => dirname(__DIR__) . '/src/Kisphp/Views/',
]);

$app->register(new \Silex\Provider\FormServiceProvider());

$app->mount('/', new \Kisphp\Core\KisphpControllerProvider());

$app->run();
