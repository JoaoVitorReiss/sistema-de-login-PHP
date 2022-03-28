<?php
require('config/conexao.php');

//VERIFICAÇÃO DE AUTENTICAÇÃO
$user = auth($_SESSION['TOKEN']);
if ($user){
    echo "<h1> SEJA BEM-VINDO <strong style='color:red'>".$user['nome']."!</strong></h1>";
    echo "<br><br><a style='background: red; color:white; text-decoration:none; padding: 20px; margin: 20px 20px 0px; cursor: pointer;' href='logout.php'>Sair do sistema</a>";
}else{
    //REDIRECIONAR PARA LOGIN
    header('location: ../index.html'); 
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Bem-vindo!</title>
</head>
<body>
    
</body>
</html>