<?php
$conn = new mysqli("localhost", "root", "", "sistema");
$id = $_GET['id'];
$conn->query("DELETE FROM usuarios WHERE id=$id");
header("Location: listar_usuarios.php");
