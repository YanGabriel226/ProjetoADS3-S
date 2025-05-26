<?php
$conn = new mysqli("localhost", "root", "", "sistema");
$id = $_POST['id'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$conn->query("UPDATE usuarios SET email='$email', endereco='$endereco' WHERE id=$id");
header("Location: listar_usuarios.php");
