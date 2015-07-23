<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Kisphp\Core\Factory;
use Kisphp\Core\Config;
use Symfony\Component\Yaml\Parser;

$yaml = new Parser();
$params = $yaml->parse(file_get_contents(dirname(__DIR__).'/app/config/parameters.yml'));

$config = Config::getInstance()->setParams($params['parameters']);

$app = new Silex\Application();
$app['debug'] = true;

$app['factory'] = new Factory($app);

$app->register(new \Silex\Provider\TwigServiceProvider(), [
    'twig.path' => dirname(__DIR__) . '/src/Kisphp/Views/',
]);

$app->register(new \Silex\Provider\SwiftmailerServiceProvider(), [
    'host' => 'localhost',
    'port' => '25',
    'username' => '',
    'password' => '',
    'encryption' => null,
    'auth_mode' => null
]);

$app->mount('/', new \Kisphp\Core\KisphpControllerProvider());

$app->run();
