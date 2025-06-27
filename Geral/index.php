<?php
session_start(); //
if(!isset($_SESSION['usuario'])){ //
    header('Location: Login.php'); //
    exit(); //
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="Dsigne.css">
</head>
<body>

<h1>Bem-vindo ao Sistema</h1>

<p>Use o menu para navegar.</p>

<br>
<a href="Perfil.php">Voltar para o Perfil</a> | <a href="logout.php">Logout</a>

</body>
</html>