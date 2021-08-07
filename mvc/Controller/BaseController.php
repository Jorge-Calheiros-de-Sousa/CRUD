<?php

namespace Mvc\Controller;

class BaseController
{

  /**
   *  Choose a method using the HTTP verb
   */
  public static function init(string $class)
  {
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $methods = [
      'POST' => 'create',
      'GET' => 'list',
      'PUT' => 'update',
      'DELETE' => 'destroy'
    ];
    $method = $methods[$requestMethod];
    return (new $class())->$method();
  }

  /**
   * Download values ​​in json and transforms them into PHP classes
   */
  protected function request(string $key)
  {
    $json = json_decode(file_get_contents('php://input'));
    return $json->$key;
  }

  /**
   * Obter valores de verbo GET
   */
  protected function get(string $key): ?string
  {
    return isset($_GET[$key]) ? $_GET[$key] : null;
  }

  /**
   * Returns php results in json
   */
  protected function jsonResponse($data = null, int $status = 200): void
  {
    if ($data != null) {
      header('Content-Type: application/json');
      echo json_encode($data);
    }
    http_response_code($status);
  }
}
