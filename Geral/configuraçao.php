<?php
// Não deve ter sessão aqui, como discutimos antes
// REMOVIDO: session_start();
// REMOVIDO: if(!isset($_SESSION['usuario'])){
// REMOVIDO:    header('Location: Login.php');
// REMOVIDO:    exit();
// REMOVIDO: }

$servername = "localhost";
$username = "root";
$password = "3011Yan@"; // Insira sua senha MySQL aqui se tiver uma.
$dbname = "sistema"; // <-- MUDEI DE 'crud' PARA 'sistema'

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
?>