<?php 
session_name('sab');
session_start();
error_reporting(0);
$logado=$_GET['logado'];

?>
<!DOCTYPE html>
<html>
    <style>
        body {
            background: #007bff;
            background:url("images/fundo.jpg")no-repeat;
        }
    </style>
    <head>       
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" >
        <link href="css/cipa.css" type="text/css" rel="stylesheet">
        <link href="css/login.css" type="text/css" rel="stylesheet">
        <link rel="icon" href="images/icone48.ico" />
        <title>SGCF</title>
    </head>
    <body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
              <center></center>
              <br>
              <?php if($logado == "N"){
                  print'<center><h5 class="text text-danger">Não foi possível autenticar</center></h5>';
                  print'<br>';
              }?>
              <form action="backend/logar.php" method="post">
              <div class="form-label-group">
                <input type="text" name="usuario" id="inputEmail" class="form-control" placeholder="Usuário" required autofocus>
                <label for="inputEmail">Usuário</label>
              </div>
                <br>
              <div class="form-label-group">
                <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
                <label for="inputPassword">Senha</label>
              </div>
              <br>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
            </form>
            <br>
            <form action="cadastro.php">
              <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit">Cadastrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
