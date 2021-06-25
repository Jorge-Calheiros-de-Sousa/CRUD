<?php
  include("conexao.php");
  $a=isset($_GET['a'])?$_GET['a']:"";
  if($a=="c"){
    $nome=$_POST['nome'];
    $fone=$_POST['telefone'];
    $sql="insert into TbUsuarios (nome,telefone,dataMeeting,horaMeeting,descricaoMeeting)values('$nome','$fone',CURDATE( ),CURTIME( ),'usuario'); ";
    if(mysqli_query($conexao,$sql)){
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
    if(mysqli_query($conexao,$sql)){
      $aviso="Atualizado";
    }else{
      $aviso="tente denovo";
    }
    echo '<script>alert("'.$aviso.'");location.href="../";</script>';
  }else if($a=="d"){
    $id=$_GET['id'];
    $sql="delete from TbUsuarios where id=$id";
    if(mysqli_query($conexao,$sql)){
      $aviso="Deletado";
    }else{
      $aviso="tente denovo";
    }
    echo '<script>alert("'.$aviso.'");location.href="../";</script>';
  }
?>