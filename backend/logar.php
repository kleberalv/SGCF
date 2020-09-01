<?php
session_name('sgcf');
session_start();

require_once("../Constantes/conecta_pdo.php");
require_once("../Classes/Usuario.php");


$pdo=new PDO(DSN,USER,SENHA);
$u=new Usuario($pdo);

//recebe os valores
$senhaCriptografada = md5($_POST['senha']);

$u->setUsuario($_POST['usuario']);
$u->setSenha($senhaCriptografada);

$resultado = $u->autentica();

if($resultado['senha'] == $senhaCriptografada and $resultado['situacao'] == "liberado"){
	$_SESSION['logado']="S";
	$_SESSION['nome']=$resultado['nome'];
	$_SESSION['usuario']=$resultado['usuario'];
	header("Location:../principal.php?menu=ok");
	exit();
}else{
	$_SESSION['logado']="N";
	header("Location:../index.php?logado=N");
	exit();
}

//Fechar conexão
$pdo=null; 

?>