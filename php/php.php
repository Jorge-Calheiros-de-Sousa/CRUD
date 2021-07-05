<?php
  include("conexao.php");
  $a=isset($_GET['a'])?$_GET['a']:"";
  if($a=="c"){
    $insert=$pdo->prepare("insert into TbUsuarios (nome,telefone) values(:nome,:telefone)");
    $insert->bindParam(':nome',$nome);
    $insert->bindParam(':telefone',$fone);
    $nome=$_POST['nome'];
    $fone=$_POST['telefone'];
    if($insert->execute()){
      $aviso="Seu cadastro foi efetuado com sucesso";
    }else{
      $aviso="Tente denovo";
    }
    echo '<script>alert("'.$aviso.'");location.href="../";</script>';
  }else if($a=="u"){
    $id=$_GET['id'];
    $nome=$_GET['nome'];
    $fone=$_GET['fone'];
    $sql="UPDATE TbUsuarios set nome='$nome',telefone='$fone' where id=$id";
    $up=$pdo->prepare("UPDATE TbUsuarios set nome = :nome, telefone= :fone  where id=:id");
    $up->bindParam(":nome",$nome);
    $up->bindParam(":fone",$fone);
    $up->bindParam(":id",$id);
    if($up->execute()){
      $aviso="Atualizado";
    }else{
      $aviso="tente denovo";
    }
    echo '<script>alert("'.$aviso.'");location.href="../";</script>';
  }else if($a=="d"){
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
    echo '<script>alert("'.$aviso.'");location.href="../";</script>';
  }
?>