<?php
session_name('sgcf');
session_start();

print'<center><h2>Bem-vindo '.$_SESSION['nome'].'!</h2></center>';

?>