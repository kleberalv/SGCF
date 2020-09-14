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

$id = $_GET['id'];

if(!empty($id)){
    require_once('Constantes/conecta_pdo.php');
    require_once('Classes/usuario.php');
    $pdo = new PDO(DSN, USER, SENHA);
    $usuario = new Usuario($pdo);
    $usuario->setId($id);

    if($usuario->deletar()==1){
        header("Location:sucesso.php");
        exit();
    }else{
        header("Location:principal.php?menu=nok");
        exit();
    }
}