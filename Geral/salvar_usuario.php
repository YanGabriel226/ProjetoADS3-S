<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "sistema";

$conn = new mysqli($host, $usuario, $senha, $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$endereco = $_POST['endereco'];

$sql = "INSERT INTO usuarios (email, senha, endereco) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $email, $senha, $endereco);

if ($stmt->execute()) {
    header("Location: login.php");
    exit();
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$conn->close();
?>
