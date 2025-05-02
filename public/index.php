<?php

// Подключение автозагрузки через composer
require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use Slim\Flash\Messages;
use Illuminate\Support\Collection;
use DI\Container;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Exception\HttpExceptionInterface;
use Slim\Middleware\MethodOverrideMiddleware;


// Старт PHP сессии
session_start();


$container = new Container();
// Настройка настроек приложения

$container->set('renderer', function () {
    // Параметром передается базовая директория, в которой будут храниться шаблоны
    return new \Slim\Views\PhpRenderer(__DIR__ . '/../templates');
});

$container->set('flash', function () {
    return new \Slim\Flash\Messages();
});



$app = AppFactory::createFromContainer($container);
$app->addErrorMiddleware(true, true, true);
$app->add(MethodOverrideMiddleware::class);



$app->get('/', function ($request, $response) {

    $params = [
       'users'=>[]
    ];

    return $this->get('renderer')->render($response, 'index.phtml', $params);
}) ;

$app->run();
 