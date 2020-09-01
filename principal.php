<?php
session_name('sgcf');
session_start();
error_reporting(0);
if (($_SESSION['logado']=="N")||empty($_SESSION['logado'])){
	$_SESSION['logado']="S";
	header("location:index.php");
	exit();
}

?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <title>SGCF - Sistema de Gerenciamento e Controle de Frota</title>
  <link rel="stylesheet" href="Formatacao/reset.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/icone48.ico" />
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
  
   <!-- <script src="bootstrap/js/bootstrap.min.js"></script>  -->
  <script src="JS/jquery-3.2.1.min.js"></script> 
  <script src="JS/bootstrap.min.js"></script>
  <script src="JS/loader.js"></script> 
  <link rel="stylesheet" href="Formatacao/formatacao_area.css">
</head>
<body>
<div class="col-md-12">
<div class="menu">
<nav class="navbar navbar-default">
  <div class="container-fluid" >
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="images/menu.png" style="width: 32px;"></a>
      <!-- <a class="navbar-brand" href="#">WebSiteName</a>  -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">#<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">#</a></li>
            <li><a href="#">#</a></li> 
            <li><a href="#">#</a></li>
            <li><a href="#">#</a></li>
          </ul>
        </li>
         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">#<span class="caret"></span></a>
          <ul class="dropdown-menu">
          	 <li><a href="#">#</a></li>
          </ul>
        </li>
         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">#<span class="caret"></span></a>
          <ul class="dropdown-menu">
          	 <li><a href="#" target="_blank">#</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">#<span class="caret"></span></a>
          <ul class="dropdown-menu">
                 </li><li><a href="#">#</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="principal.php?menu=1">Listar usuários</span></a>
          <ul class="dropdown-menu">
          <li><a href="#">Listar</a></li>
          <li><a href="#">#</a>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="destroi_sessao.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['nome'];?></a></li>
        <li><a href="destroi_sessao.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
  <div class="container">
    <table class="layout" width="100%" >
        <tr>
            <td valign="top">
                <div>				
                    <?php
                        switch ($_GET['menu'])
                        {
                            case 'ok':
                                include('backend/home.php');
                                break;
                            case 1:
                                  include('listar_usuario.php');
                                  break;    	
                        }
                    ?>
                </div>
            </td>
        </tr>    
    </table>
</body>    
</html>


