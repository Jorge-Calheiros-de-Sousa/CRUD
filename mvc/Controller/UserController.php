<?php

namespace Mvc\Controller;


use Mvc\Model\UserModel;

class UserController extends BaseController
{
  private $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel;
  }

  /**
   * get all user and get a user by id
   */
  public function list()
  {
    $this->userModel->setId($this->get('ID'));
    $data = $this->userModel->list();
    $this->jsonResponse($data->fetchAll(\PDO::FETCH_ASSOC));
  }

  /**
   * create a new user
   */
  public function create()
  {
    $created = $this->userModel
      ->setName($this->request("Name"))
      ->setYearOld($this->request("YearOld"))
      ->create();
    if ($created) {
      $this->jsonResponse(null, 201);
    }
  }

  /**
   * update user data
   */
  public function update()
  {
    $updated = $this->userModel
      ->setName($this->request("Name"))
      ->setYearOld($this->request("YearOld"))
      ->setId($this->get("ID"))
      ->update();
    if ($updated) {
      $this->jsonResponse(null, 202);
    }
  }

  /**
   * delete user data
   */
  public function destroy()
  {
    $deleted = $this->userModel
      ->setId($this->get('ID'))
      ->destroy();
    if ($deleted) {
      $this->jsonResponse(null, 204);
    }
  }
}
BaseController::init(UserController::class);
