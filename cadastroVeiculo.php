<?php 
session_name('sab');
session_start();
error_reporting(0);

include 'Constantes/conecta_pdo.php';
include 'Classes/Veiculo.php';

$pdo = new PDO(DSN, USER, SENHA);
$veiculo = new Veiculo($pdo);
$id = $_GET['id'];
if(!empty($id)){
   $resultado = $veiculo->recuperarPorCodigo($id);
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

                <form class="well form-horizontal" action="backend/inserirVeiculo.php" method="post">
                    <fieldset>


              <div class="form-group">
                    <?php if(!empty($resultado['id'])){
                        print'<center><h3>Alterar cadastro de Veículo</h3></center>';
                        }else{
                            print'<center><h3>Cadastro de Veículos</h3></center>';
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
                        <label class="col-md-10 control-label">Modelo</label>
                        <div class="col-md-10 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-globe"></i>
                                </span>
                                <?php if(!empty($resultado['veiculo'])){
                                    print '<input id="veiculo" name="veiculo" placeholder="Modelo" class="form-control" required="true" value="'.$resultado['veiculo'].'" type="text">';
                                }else{
                                    print '<input id="veiculo" name="veiculo" placeholder="Modelo" class="form-control" required="true" value="" type="text"> ';
                                }?>
                            </div>
                        </div>
 <br>                           
                                    <label class="col-md-10 control-label">Ano</label>
                                    <div class="col-md-10 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-envelope"></i>
                                            </span>
                                            <?php if(!empty($resultado['ano'])){
                                                print '<input id="ano" name="ano" placeholder="Ano" class="form-control" required="true" value="'.$resultado['ano'].'" type="text">';
                                            }else{
                                                print '<input id="ano" name="ano" placeholder="Ano" class="form-control" required="true" value="" type="text">';
                                            }?>
                                        </div>
                                    </div>
<br>
                                 <div class="form-group">
                                    <label class="col-md-10 control-label">Placa</label>
                                    <div class="col-md-10 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-envelope"></i>
                                            </span>
                                            <?php if(!empty($resultado['placa'])){
                                                print '<input id="placa" name="placa" placeholder="Placa" class="form-control" required="true" type="text">';
                                            }else{
                                                print '<input id="placa" name="placa" placeholder="Placa" class="form-control" required="true" value="" type="text">';
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
