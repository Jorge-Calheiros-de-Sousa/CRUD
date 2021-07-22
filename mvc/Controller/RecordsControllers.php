<?php

namespace Mvc\Controller;

require __DIR__ . '/../../vendor/autoload.php';

use Mvc\Model\Records;
$requestMethod = $_SERVER['REQUEST_METHOD'];
$methods = [
  'POST' => 'create_controller',
  'GET' => 'list_controller',
  'PUT' => 'update_controller',
  'DELETE' => 'destroy_controller'
 ];
$method = $methods[$requestMethod];
class RecordsControllers
{
  private $Records;
  private $JSON;
  private $header;

  public function __construct()
  {
    $this->Records = new Records;
    $this->JSON = json_decode(file_get_contents('php://input'));
    $this->header = header('Content-Type: application/json');
  }
  public function list_controller()
  {
    $this->Records->id = isset($_GET['ID'])?$_GET['ID']:"NoID";
    if($this->Records->id == "NoID"){
      $list = $this->Records->list();
      echo json_encode($list->fetchAll(\PDO::FETCH_ASSOC));
    }else{
      $dados = $this->Records->Show_ID();
      echo json_encode($dados->fetchAll(\PDO::FETCH_ASSOC));
    }
    die;
  }
  public function create_controller()
  {
    $this->Records->name = $this->JSON->Name;
    $this->Records->yearOld = $this->JSON->YearOld;
    $this->Records->create();
    die;
  }
  public function update_controller()
  {
    $this->Records->name = $this->JSON->Name;
    $this->Records->yearOld = $this->JSON->YearOld;
    $this->Records->id = $this->JSON->ID;
    $this->Records->update();
    die;
  }
  public function destroy_controller()
  {
    $this->Records->id = $_GET['ID'];
    $this->Records->destroy();
    die;
  }
}
$obj = new RecordsControllers;
$obj->$method();
