<?php
session_name('sgcf');
session_start();



ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include '../Constantes/conecta_pdo.php';
include '../Classes/Veiculo.php';

$pdo = new PDO(DSN, USER, SENHA);
$u = new Veiculo($pdo);



$recebeVeiculo = $u->autentica($_POST['id']);


if($recebeVeiculo == false){    
    $u->setNome($_POST['nome']);
    $u->setModelo($_POST['modelo']);
    $u->setAno($_POST['ano']);
    $u->setPlaca($_POST['placa']);
}else{
    $u->setVeiculoCompleto($recebeVeiculo['id'], 
                           $_POST['nome'],
                           $_POST['modelo'], 
                           $_POST['ano'],                            
                           $_POST['placa']);
}

$resultadoSalvar = $u->salvar();


if($resultadoSalvar == "Ok"){
    header('Location:../sucesso.php');
}else{
    header('Location:../erro.php');
}

$pdo = null;