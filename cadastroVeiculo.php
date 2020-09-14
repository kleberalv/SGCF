<?php
session_name('sgcf');
session_start();
if (($_SESSION['logado']=="N")||empty($_SESSION['logado'])){
    
    //$_SESSION['logado']="S";
    header("location:index.php");
    exit();
}

include 'Constantes/conecta_pdo.php';
include 'Classes/Veiculo.php';

$pdo = new PDO(DSN, USER, SENHA);
$veiculo = new Veiculo($pdo);
$placa = $_GET['placa'];
if(!empty($placa)){
   $resultado = $veiculo->recuperarPorPlaca($placa);
}

?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <title>SGCF</title>
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
                        <form class="well form-horizontal" action="backend/inserirVeiculo.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <?php if(!empty($resultado['placa'])){
                                        print'<center><h3>Alterar cadastro de caminhao</h3></center>';
                                    }else{
                                        print'<center><h3>Cadastro de caminhao</h3></center>';
                                    } ?>
                                    <label class="col-md-4 control-label">Nome</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <?php if(!empty($resultado['nome'])){
                                                print'<input id="id" name="id" type="hidden" value="'.$resultado['id'].'">';
                                                print '<input id="nome" name="nome" placeholder="Nome" class="form-control" required="true" value="'.$resultado['nome'].'" type="text">';
                                            }else{
                                                print '<input id="nome" name="nome" placeholder="Nome" class="form-control" required="true" value="" type="text">';
                                            }?>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <label class="col-md-4 control-label">Modelo</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <?php if(!empty($resultado['modelo'])){
                                                print '<input id="modelo" name="modelo" placeholder="Modelo" class="form-control" required="true" value="'.$resultado['modelo'].'" type="text">';
                                            }else{
                                                print '<input id="modelo" name="modelo" placeholder="Modelo" class="form-control" required="true" value="" type="text">';
                                            }?>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                     <label class="col-md-4 control-label">Ano</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <?php if(!empty($resultado['ano'])){
                                                print '<input id="ano" name="ano" placeholder="Ano" class="form-control" required="true" value="'.$resultado['ano'].'" type="text">';
                                            }else{
                                                print '<input id="ano" name="ano" placeholder="Ano" class="form-control" required="true" value="" type="text">';
                                            }?>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                     <label class="col-md-4 control-label">Placa</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <?php if(!empty($resultado['placa'])){
                                                print '<input id="placa" name="placa" placeholder="Placa" class="form-control" required="true" value="'.$resultado['placa'].'" type="text">';
                                            }else{
                                                print '<input id="placa" name="placa" placeholder="Placa" class="form-control" required="true" value="" type="text">';
                                            }?>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <center>
                                <div class="form-group">
                                    <div class="col-md-12 inputGroupContainer">                                        
                                            <div class="input-group">
                                                <?php 
                                                    if(!empty($resultado['placa'])){
                                                        print '<input id="botaoCriar" name="botaoCiar" placeholder="Criar" class="btn btn-success" required="true" value="Alterar" type="submit">';
                                                    }else{
                                                        print '<input id="botaoCriar" name="botaoCiar" placeholder="Criar" class="btn btn-success" required="true" value="Cadastrar" type="submit">';
                                                    }
                                                ?>
                                                &nbsp;
                                                <?php 
                                                    if(!empty($resultado['placa'])){
                                                        print '<a href="principal.php" class="btn btn-danger">Cancelar</a>';
                                                    }else{
                                                        print '<a href="principal.php" class="btn btn-danger">Cancelar</a>';
                                                    }
                                                ?>  
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
