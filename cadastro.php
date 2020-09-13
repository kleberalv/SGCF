<?php 
session_name('sab');
session_start();
error_reporting(0);

include 'Constantes/conecta_pdo.php';
include 'Classes/Usuario.php';

$pdo = new PDO(DSN, USER, SENHA);
$usuario = new Usuario($pdo);
$id = $_GET['id'];
if(!empty($id)){
   $resultado = $usuario->recuperarPorCodigo($id);
}

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
      <div class="col-sm-8 mt-5 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-1">
          <div class="card-body">
              <center></center>
              <br>

                <form class="well form-horizontal" action="backend/inserirUsuario.php" method="post">
                    <fieldset>


              <div class="form-group">
                    <?php if(!empty($resultado['id'])){
                        print'<center><h3>Alterar cadastro Usuario</h3></center>';
                        }else{
                            print'<center><h3>Cadastro de Usuario</h3></center>';
                        } ?>
                </div>
            <br>
                
                <div class="form-group">

                    <label class="col-md-10 control-label">Nome</label>
                        <div class="col-md-10 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                            
                            <?php if(!empty($resultado['nome'])){
                                print '<input id="nome" name="nome" placeholder="Nome" class="form-control" required="true" value="'.$resultado['nome'].'" type="text">';
                                    }else{
                                    print '<input id="nome" name="nome" placeholder="Nome" class="form-control" required="true" value="" type="text">';
                                    }?>
                            </div>
                        </div>

<br>
                        <label class="col-md-10 control-label">Usuario</label>
                        <div class="col-md-10 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-globe"></i>
                                </span>
                                <?php if(!empty($resultado['usuario'])){
                                    print '<input id="usuario" name="usuario" placeholder="Usuario" class="form-control" required="true" value="'.$resultado['usuario'].'" type="text">';
                                }else{
                                    print '<input id="usuario" name="usuario" placeholder="Usuario" class="form-control" required="true" value="" type="text"> ';
                                }?>
                            </div>
                        </div>
 <br>                           
                                    <label class="col-md-10 control-label">Email</label>
                                    <div class="col-md-10 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-envelope"></i>
                                            </span>
                                            <?php if(!empty($resultado['email'])){
                                                print '<input id="email" name="email" placeholder="Email" class="form-control" required="true" value="'.$resultado['email'].'" type="text">';
                                            }else{
                                                print '<input id="email" name="email" placeholder="Email" class="form-control" required="true" value="" type="email">';
                                            }?>
                                        </div>
                                    </div>
<br>
                                 <div class="form-group">
                                    <label class="col-md-10 control-label">Senha</label>
                                    <div class="col-md-10 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-envelope"></i>
                                            </span>
                                            <?php if(!empty($resultado['email'])){
                                                print '<input id="senha" name="senha" placeholder="Senha" class="form-control" required="true" type="hidden">';
                                            }else{
                                                print '<input id="senha" name="senha" placeholder="Senha" class="form-control" required="true" value="" type="password">';
                                            }?>
                                        </div>
                                    </div>
                                </div>
<br>

                                <div class="btn-group">
                                    <div class="row col-9">
                                                <?php 
                                                    if(!empty($resultado['id'])){
                                                        print '<input id="botaoCriar" name="botaoCiar" placeholder="Criar" class="btn btn-success" required="true" value="Alterar" type="submit">';
                                                    }else{
                                                        print '<input id="botaoCriar" name="botaoCiar" placeholder="Criar" class="btn btn-lg btn-success btn-block text-uppercase required="true" value="Cadastrar" type="submit">';

                                                    }
                                                ?>
                                                </div>
                                                &nbsp;
                                                <div class="row col-9">
                                                <a href="index.php" class="btn btn-lg btn-danger btn-block text-uppercase">Cancelar</a>
                                    </div>

                                </div>
        </div>
  
            </fieldset>

    </div>


</body>
</html>
