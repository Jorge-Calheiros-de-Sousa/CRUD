<?php

namespace Mvc;

class Routes
{
  private const ROUTES = [
    '/' => '/View/index.html',
    '/CRUD/' => '/View/index.html',
    '/CRUD/api/v1/users' => 'Mvc\\Controller\\UserController',
    '/api/v1/users' => 'Mvc\\Controller\\UserController',
  ];

  public static function isRequestAPI($uri)
  {
    return strpos($uri, '/api') === 0 || strpos($uri, '/CRUD/api') === 0;
  }

  public static function init()
  {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if (in_array($uri, ['/', '/CRUD/'])) {
      include __DIR__ . static::ROUTES[$uri];
    }

    $controller = static::ROUTES[$uri];

    if ((!static::isRequestAPI($uri) || !class_exists($controller)) && !in_array($uri, ['/', '/CRUD/'])) {
      header('Location: /');
      die;
    }

    if (!in_array($uri, ['/', '/CRUD/'])) {
      return new $controller();
    }
  }
}
