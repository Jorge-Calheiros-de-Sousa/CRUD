<?php
  include('php/conexao.php');
  $delete=isset($_GET['d']) ? $_GET['d']: "";
  $update=isset($_GET['u']) ? $_GET['u']: "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atividade de PW</title>
  <link rel="stylesheet" href="css.css">
</head>
<body>
  <div class="conteudo">
    <div class="cabecalho">
      <h1>Nome: Jorge Calheiros de Sousa <u> 3DS</u></h1>
    </div>
    <div class="crud">
      <h1>Sistema de CRUD</h1>
      <hr>
      <button id='c'>Criar um conta</button><button  id='r'>Ver dados da tabela</button><button  id='d'>Deletar dados da tabela</button><button  id='u'>Editar dados da tabela</button>
    </div>
    <div class="view">
      <u><h1 id='h1'>Crie a sua conta</h1></u>
      <section>
        <form action="php/php.php?a=c" method="post" onsubmit=" return validar_cadastro()" id='form_cadastro' class="formulario display">
          <h1>Cadastrar</h1>
          <label for="nome">Digite seu nome: </label>
          <input type="text" name="nome" id="nome" placeholder="Digite seu nome aqui" autocomplete="off">
          <br><br>
          <label for="nome">Digite seu Telefone: </label>
          <input type="text" name="telefone" id="telefone" placeholder="Digite seu telefone aqui" autocomplete="off">
          <button class="cadastrar">Cadastrar</button>
        </form>
      </section>
      <div class="table_read display" id='read'>
        <table>
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Data do cadastro</th>
            <th>Hora do cadastro</th>
            <th>Descrição</th>
          </tr>
          <?php
          $sql="select * from TbUsuarios";
          $consulta=mysqli_query($conexao,$sql);
          if($consulta){
            while($arr=$consulta->fetch_array()){
              $id=$arr['id'];
              $nome=$arr['nome'];
              $fone=$arr['telefone'];
              $date=$arr['dataMeeting'];
              $hora=$arr['horaMeeting'];
              $txt=$arr['descricaoMeeting'];
              echo"
              <tr>
                <td>$id</td>
                <td>$nome</td>
                <td>$fone</td>
                <td>$date</td>
                <td>$hora</td>
                <td>$txt</td>
              </tr>
              ";
            }
          }
          ?>
        </table>
      </div>
      <br>
      <div class="table_read display" id='modi'>
        <table id='table_modi'>
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Data do cadastro</th>
            <th>Hora do cadastro</th>
            <th>Descrição</th>
          </tr>
          <tr>
          <?php
            $sql="select * from TbUsuarios";
            $consulta=mysqli_query($conexao,$sql);
            if($consulta){
              while($arr=$consulta->fetch_array()){
                $id=$arr['id'];
                $nome=$arr['nome'];
                $fone=$arr['telefone'];
                $date=$arr['dataMeeting'];
                $hora=$arr['horaMeeting'];
                $txt=$arr['descricaoMeeting'];
                echo"
                <tr>
                  <td><input type='text' name='id' id='id_$id' autocomplete='off' value='$id' class='read'></td>
                  <td><input type='text' name='nome_modi' id='nome_modi_$id' autocomplete='off' value='$nome'  class='read'></td>
                  <td><input type='text' name='fone_modi' id='fone_modi_$id' autocomplete='off' value='$fone'  class='read'></td>
                  <td>$date</td>
                  <td>$hora</td>
                  <td>$txt</td>
                  <td><button type='button' onclick='redirecionar_modi(`$id`)'>Modificar</button></td>
                  <td><button type='button' id='$id' onclick='save($id)' class='display'>Salvar</button></td>
                </tr>
                ";
              }
            }
            ?>
          </tr>
        </table>
      </div>
      <br>
      <div class="table_read display" id='delete'>
        <table>
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Data do cadastro</th>
            <th>Hora do cadastro</th>
            <th>Descrição</th>
          </tr>
          <tr>
          <?php
            $sql="select * from TbUsuarios";
            $consulta=mysqli_query($conexao,$sql);
            if($consulta){
              while($arr=$consulta->fetch_array()){
                $id=$arr['id'];
                $nome=$arr['nome'];
                $fone=$arr['telefone'];
                $date=$arr['dataMeeting'];
                $hora=$arr['horaMeeting'];
                $txt=$arr['descricaoMeeting'];
                echo"
                <tr>
                  <td>$id</td>
                  <td>$nome</td>
                  <td>$fone</td>
                  <td>$date</td>
                  <td>$hora</td>
                  <td>$txt</td>
                  <td><button class='delete' onclick='redirecionar_delete(`$id`)'>Deletar</button></td>
                </tr>
                ";
              }
            }
            ?>
          </tr>
        </table>
      </div>
      <br>
    </div>
  </div>
  <script src="js.js"></script>
</body>
</html>