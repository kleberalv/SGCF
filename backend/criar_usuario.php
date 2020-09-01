<?php
session_name('brasalprotocolo');
session_start();
if (($_SESSION['logado']=="N")||empty($_SESSION['logado'])){
	
	//$_SESSION['logado']="S";
	header("location:index.php");
	exit();
}

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
<html lang="pt">
<head>
  <title>Brasal Protocolo</title>
 <!-- <link rel="stylesheet" href="Formatacao/reset.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/icone48.ico" />
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
  
   
 <script src="JS/jquery-3.2.1.min.js"></script> 
  <script src="JS/bootstrap.min.js"></script>
  <script src="JS/loader.js"></script> 
  <link rel="stylesheet" href="Formatacao/formatacao_area.css"> -->
</head>
<body>
    <div class="container">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td colspan="1">
                        <form class="well form-horizontal" action="inserirUsuario.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <?php if(!empty($resultado['id'])){
                                        print'<center><h3>Alterar cadastro Usuario</h3></center>';
                                    }else{
                                        print'<center><h3>Cadastro de Usuario</h3></center>';
                                    } ?>
                                    <label class="col-md-4 control-label">Nome</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <?php if(!empty($resultado['nome'])){
                                                print '<input id="nme" name="nme" placeholder="Nome" class="form-control" required="true" value="'.$resultado['nome'].'" type="text">';
                                            }else{
                                                print '<input id="nme" name="nme" placeholder="Nome" class="form-control" required="true" value="" type="text">';
                                            }?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Usuario</label>
                                    <div class="col-md-4 inputGroupContainer">
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
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Email</label>
                                    <div class="col-md-4 inputGroupContainer">
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
                                </div>
                                <center>
                                <div class="form-group">
                                    <div class="col-md-12 inputGroupContainer">                                        
                                            <div class="input-group">
                                                <?php 
                                                    if(!empty($resultado['id'])){
                                                        print '<input id="botaoCriar" name="botaoCiar" placeholder="Criar" class="btn btn-success" required="true" value="Alterar" type="submit">';
                                                    }else{
                                                        print '<input id="botaoCriar" name="botaoCiar" placeholder="Criar" class="btn btn-success" required="true" value="Cadastrar" type="submit">';
                                                    }
                                                ?>
                                                &nbsp;
                                                <a href="principal?menu=b.php" class="btn btn-danger">Cancelar</a>
                                            </div>
                                    </div>
                                </div>
                                </center>    
                            </fieldset>    
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>    
</body>