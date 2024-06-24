<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');

Router::addGroup('/product', function () {
    Router::addRoute(['POST'], '/Create', 'App\Controller\ProductController@create');
    Router::addRoute(['POST'], '/', 'App\Controller\ProductController@find');
    Router::addRoute(['GET'], '/List', 'App\Controller\ProductController@list');
    Router::addRoute(['POST'], '/Delete', 'App\Controller\ProductController@delete');
    Router::addRoute(['POST'], '/Update', 'App\Controller\ProductController@update');
});

Router::get('/favicon.ico', function () {
    return '';
});
