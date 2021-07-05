<?php
  $host = 'localhost';
  $usuario = 'root';
  $senha = '';
  $BD = 'dbusuarios';
  try {
    $pdo=new PDO("mysql:dbname=$BD;host=$host","$usuario","$senha");
  } catch (PDPException $e) {
    echo "Erro com o banco de dados: ".$e->getMessage();
  } catch(Exception $e){
    echo "Erro generico: ".$e->getMessage();
  } 
?>