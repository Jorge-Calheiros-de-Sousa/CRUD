<?php
namespace Mvc\Model;
use Mvc\Model\Connection;

class Records
  {
    public $id;
    public $name;
    public $yearOld;
    private $bdConnection;

    public function __construct()
    {
      $this->bdConnection = new Connection;
    }
    public function create()
    {
      $pdo=$this->bdConnection->returnConnection();

      $insert=$pdo->prepare("insert into TbUsuarios (name_user,yearOld_user) values(:name,:yearOld)");
      $insert->bindParam(':name',$this->name);
      $insert->bindParam(':yearOld',$this->yearOld);

      $insert->execute();
      die;
    }
    public function update()
    {
      $pdo=$this->bdConnection->returnConnection();

      $up=$pdo->prepare("UPDATE TbUsuarios set name_user = :name_user, yearOld_user= :yearOld  where id=:id");
      $up->bindParam(":name_user",$this->name);
      $up->bindParam(":yearOld",$this->yearOld);
      $up->bindParam(":id",$this->id);

      $up->execute();
      die;
    }
    public function destroy()
    {
      $pdo=$this->bdConnection->returnConnection();

      $del=$pdo->prepare("delete from TbUsuarios where id = :id");
      $del->bindValue(":id",$this->id);
      $del->execute();
      die;
    }
    public function show_ID()
    {
      $pdo=$this->bdConnection->returnConnection();
      
      $sql= $pdo->prepare("select * from TbUsuarios where id=".$this->id);
      if($sql->execute()){
        return $sql;
      }
      die;
    }
    public function list()
    {
      $pdo=$this->bdConnection->returnConnection();
      
      $sql = $pdo->prepare("select * from TbUsuarios");
      if($sql->execute()){
        return $sql;
      }
      die;
    }
  }
