<?php

session_name('sgcf');
session_start();


ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

if (($_SESSION['logado']=="N")||empty($_SESSION['logado'])){
	
	//$_SESSION['logado']="S";
	header("location:index.php");
	exit();
}

$idveiculo = $_GET['id'];

if(!empty($idveiculo)){
    require_once('Constantes/conecta_pdo.php');
    require_once('Classes/Veiculo.php');
    $pdo = new PDO(DSN, USER, SENHA);
    $veiculo = new Veiculo($pdo);
    $veiculo->setId($idveiculo);

    if($veiculo->deletar()==1){
        header("Location:sucesso.php");
        exit();
    }else{
        header("Location:principal.php?menu=nok");
        exit();
    }
}