<?php
session_start(); //
if(!isset($_SESSION['usuario'])){ //
    header('Location: Login.php'); //
    exit(); //
}

include 'configuraçao.php'; //

$id = $_GET['id']; //
$sql = "DELETE FROM usuarios WHERE id=$id"; //

if ($conn->query($sql) === TRUE) { //
    echo "Usuário excluído com sucesso!"; //
} else {
    echo "Erro ao excluir: " . $conn->error; //
}

$conn->close(); //
?>

<!DOCTYPE html>
<html>
<head>
    <title>Excluir Usuário</title>
    <link rel="stylesheet" type="text/css" href="Dsigne.css">
</head>
<body>

<br>
<a href="Perfil.php">Voltar para o Perfil</a> | <a href="logout.php">Logout</a>

</body>
</html>