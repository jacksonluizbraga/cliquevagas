<?php 
require("controllers/autentication.php");

    $precisase = pg_escape_string($_POST['precisase']);
    $descricao = pg_escape_string($_POST['descricao']);
    $telefone = pg_escape_string($_POST['telefone']);
    $email = pg_escape_string($_POST['email']);
    $endereco = pg_escape_string($_POST['endereco']);
    $datainsercao = pg_escape_string($_POST['data_insercao']);
    $datavencimento = pg_escape_string($_POST['data_vencimento']);

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clique Vagas Caruaru</title>
    <link rel="stylesheet" href="style/principal.css" />
    <link rel="stylesheet" href="style/adicionaranuncio.css" />
  </head>
  <body class="bg2">
    <div class="container">
      <div class="titulo bg1">
      <a href="index.php"> <img   src="images/logo.png" /></a>
      <a class="limpartitulo" href="index.php"> Click Vagas Caruaru</a>
      </div>
      <div class="conteudo">
        <h3>Criar anúncio:</h3>
        <form>
          <p>Precisa-se:</p>
          <input class="caixaprecisase" type="text" method="POST" value="<?php $precisase ?>"/>
          <p>Descrição da vaga:</p>
          <input class="caixadescricao" type="text" method="POST" value="<?php $descricao ?>" />
          <h4>Contatos:</h4>
          <p>Telefone:</p>
          <input class="caixatelefone" type="tel" method="POST" value="<?php $telefone ?>" />
          <p>E-mail:</p>
          <input class="caixaemail" type="email" method="POST" value="<?php $email ?>" />
          <p>Site:</p>
          <input class="caixasite" type="url" method="POST" value="<?php  ?>" />
          <p>Endereço da empresa:</p>
          <input class="caixaendereco" type="text" method="POST" value="<?php $endereco ?>" />
          <h4>Tempo de anúncio:</h4>
          <div class="slidecontainer">
            <input type="range" min="1" max="30" value="30" class="slider" id="myRange">
            <p>Dias: <span id="demo"></span></p>
          </div>
          <div class="botoes">
          <a class="botaocancelar" type="button" href="perfil.php">Cancelar</button>
          <input class="botaopostar" type="submit" value="Salvar pesquisa" />
          </div>
        </form>
      </div>
    </div>
    <script src="js/adicionaranuncio.js"></script>
  </body>
</html>