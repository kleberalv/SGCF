<?php
session_name('sgcf');
session_start();
if (($_SESSION['logado']=="N")||empty($_SESSION['logado'])){
    
    //$_SESSION['logado']="S";
    header("location:index.php");
    exit();
}

//conectar ao servidor de banco de dados
require_once("Constantes/conecta_pdo.php");
//Chama a Classe Usuarios
require_once("Classes/Veiculo.php");
$pdo = new PDO(DSN, USER, SENHA);
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset=ISO-8859-1">
        <script src="JS/jquery-1.12.4.js"></script>
        <script src="JS/jquery.dataTables.min.js"></script> 
        <script src="JS/dataTables.bootstrap.min.js"></script> 
        <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
        </script>
    </head>
    <body>
    <?php
        //total de registro
        $veiculos= new Veiculo($pdo);
        //joga os dados na tabela
        $listar = $veiculos->listar();
    ?>
    <div class="panel panel-default">
        <div class="panel-heading titulo-tabela">&nbsp; Listagem de usuários</div> 
            <table  class="table table-striped" id="example">
                <thead>                  
                    <tr>
                        <th>Nome</th>
                        <th>Modelo</th>
                        <th>Ano</th>
                        <th>Placa</th>
                        <th>Acoes</th>
                    </tr>
                </thead >
                        <tbody class="corpo-tabela">
                            <?php foreach($listar as $i=> $linha): ?>
                                <tr>
                                    <td><?php echo $linha['nome']?></td>
                                    <td><?php echo $linha['modelo']?></td>
                                    <td><?php echo $linha['ano'] ?></td>
                                    <td><?php echo $linha['placa'] ?></td>
                                    <td>
                                        <a class=acao href="principal.php?menu=2&placa=<?php echo $linha['placa']?>"><button type="button" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit">&nbsp;</i>Editar</button></a>
                                        &nbsp;|&nbsp;  
                                        <a class=acao href="delete_veiculo.php?id=<?php echo $linha['id']?>"  onclick="if(!confirm('Deseja realmente excluir o veículo?')) return false;"><button type="button" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-trash">&nbsp;</i> Excluir</button></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
            </table> 
        </div>
    </body>
</html>
