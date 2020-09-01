<?php
session_name('sgcf');
session_start();

include '../Constantes/conecta_pdo.php';
include '../Classes/Usuario.php';

$pdo = new PDO(DSN, USER, SENHA);
$u = new Usuario($pdo);

$recebeUsuario = $u->recuperarPorUsuario($_POST['usuario']);


if($recebeUsuario == false){    
    $u->setNome($_POST['nome']);
    $u->setUsuario($_POST['usuario']);
    $u->setEmail($_POST['email']);
    $u->setSenha(md5($_POST['senha']));
}else{
    $u->setUsuarioCompleto($recebeUsuario['id'], 
                           $nome,
                           $usuario, 
                           $email);
}

$resultadoSalvar = $u->salvar();


if($resultadoSalvar == "Ok"){
    header('Location:../sucesso.php');
}else{
    header('Location:../erro.php');
}

$pdo = null;