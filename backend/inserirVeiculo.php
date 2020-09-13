<?php
session_name('sgcf');
session_start();

include '../Constantes/conecta_pdo.php';
include '../Classes/Veiculo.php';

$pdo = new PDO(DSN, USER, SENHA);
$u = new Veiculo($pdo);

$recebeVeiculo = $u->recuperarPorVeiculo($_POST['veiculo']);


if($recebeVeiculo == false){    
    $u->setNome($_POST['nome']);
    $u->setModelo($_POST['modelo']);
    $u->setAno($_POST['ano']);
    $u->setPlaca($_POST['placa']);
}else{
    $u->setVeiculoCompleto($recebeVeiculo['id'], 
                           $nome,
                           $modelo, 
                           $ano,                            
                           $placa);
}

$resultadoSalvar = $u->salvar();


if($resultadoSalvar == "Ok"){
    header('Location:../sucesso.php');
}else{
    header('Location:../erro.php');
}

$pdo = null;