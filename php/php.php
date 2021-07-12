<?php
  include("conexao.php");
  $a=isset($_GET['a'])?$_GET['a']:"";
  if($a=="c"){
    $insert=$pdo->prepare("insert into TbUsuarios (nome,idade) values(:nome,:idade)");
    $insert->bindParam(':nome',$nome);
    $insert->bindParam(':idade',$idade);
    $nome=$_GET['name'];
    $idade=$_GET['year'];
    if($insert->execute()){
      $aviso="Seu cadastro foi efetuado com sucesso";
    }else{
      $aviso="Tente denovo";
    }
  }else if($a=="u"){
    $id=$_GET['id'];
    $nome=$_GET['name'];
    $idade=$_GET['year'];
    $up=$pdo->prepare("UPDATE TbUsuarios set nome = :nome, idade= :idade  where id=:id");
    $up->bindParam(":nome",$nome);
    $up->bindParam(":idade",$idade);
    $up->bindParam(":id",$id);
    if($up->execute()){
      $aviso="Atualizado";
    }else{
      $aviso="tente denovo";
    }
  }else if($a=="ver_resultados"){
    $sql= $pdo->prepare("select * from TbUsuarios");
    if($sql->execute()){
      echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
    }
  }else if($a=="verID"){
    $id=$_GET['id'];
    $sql=$pdo->prepare("select * from TbUsuarios where id=$id");
    if($sql->execute()){
      echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
    }
  }else if($a=="excluir"){
    $sql="delete from TbUsuarios where id=$id";
    $del=$pdo->prepare("delete from TbUsuarios where id = :id");
    $id=$_GET['id'];
    $del->bindValue(":id",$id);
    $del->execute();
    if($del->execute()){
      $aviso="Deletado";
    }else{
      $aviso="tente denovo";
    }
  }
?>