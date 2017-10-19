<?php
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);
Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Interviews', 'action' => 'index']);
    $routes->connect('/nadzor', ['controller' => 'Interviews', 'action' => 'nadzisuser']);
    $routes->connect('/employees', ['controller' => 'Users', 'action' => 'index']);
    $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/password', ['controller' => 'Users', 'action' => 'password']);
    $routes->fallbacks(DashedRoute::class);
});

Plugin::routes();
