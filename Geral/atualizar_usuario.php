<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: Login.php');
    exit();
}

include 'configuraçao.php';

$id = $_POST['id'] ?? '';
$email = $_POST['email'] ?? '';
$senha_nova = $_POST['senha_nova'] ?? ''; // O novo campo de senha
$endereco = $_POST['endereco'] ?? '';

// Array para armazenar as partes da atualização SQL
$updates = [];
$params = [];
$types = ''; // String para os tipos de parâmetros para bind_param

// Adiciona email ao update
$updates[] = "email = ?";
$params[] = $email;
$types .= 's';

// Adiciona endereço ao update
$updates[] = "endereco = ?";
$params[] = $endereco;
$types .= 's';

// Se uma nova senha foi fornecida, hasheia e adiciona ao update
if (!empty($senha_nova)) {
    $senha_hashed = password_hash($senha_nova, PASSWORD_DEFAULT);
    $updates[] = "senha = ?";
    $params[] = $senha_hashed;
    $types .= 's';
}

// Junta as partes do UPDATE
$sql = "UPDATE usuarios SET " . implode(", ", $updates) . " WHERE id = ?";
$params[] = $id; // Adiciona o ID como último parâmetro
$types .= 'i'; // "i" para ID (inteiro)

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Erro na preparação da consulta: " . $conn->error);
}

// Vincula os parâmetros dinamicamente
// Use call_user_func_array para passar os parâmetros do array $params para bind_param
// array_unshift($params, $types); // Descomente esta linha se a linha abaixo não funcionar no seu PHP
// call_user_func_array([$stmt, 'bind_param'], $params); // Descomente esta linha se a linha abaixo não funcionar no seu PHP
$stmt->bind_param($types, ...$params); // Sintaxe moderna do PHP (>= 5.6)

if ($stmt->execute()) {
    echo "Usuário atualizado com sucesso!";
    // Se o email do usuário logado foi alterado, atualize a sessão
    // Para isso, você precisa armazenar o ID do usuário na sessão no login: $_SESSION['user_id'] = $user['id'];
    // if (isset($_SESSION['user_id']) && $id == $_SESSION['user_id'] && $email !== $_SESSION['usuario']) {
    //     $_SESSION['usuario'] = $email;
    // }
} else {
    echo "Erro ao atualizar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Usuário</title>
    <link rel="stylesheet" type="text/css" href="Dsigne.css">
</head>
<body>

<br>
<a href="Perfil.php">Voltar para o Perfil</a> | <a href="logout.php">Logout</a>

</body>
</html>