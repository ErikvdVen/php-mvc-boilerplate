<?php

use \Klein\Klein;

use \ErikvdVen\PHP_MVC\Controllers\UserController;

$router = new Klein();
$userCtrl = new UserController();

$router->respond(function ($request, $response, $service, $app) use ($router) {

    $app->register('twig', function () {
        $loader = new Twig_Loader_Filesystem('./');
        return new Twig_Environment($loader);
    });
});

$router->respond('GET', '/', [$userCtrl, 'indexAction']);
$router->respond('POST', '/', [$userCtrl, 'indexAction']);

$router->dispatch();

?>