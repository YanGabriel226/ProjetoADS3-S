<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: Login.php');
    exit();
}

include 'configuraçao.php';

$id = $_GET['id'];
// Seleciona todas as colunas necessárias: id, email, senha (hash), endereco
$sql = "SELECT id, email, senha, endereco FROM usuarios WHERE id=$id";
$result = $conn->query($sql);
$usuario = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuário</title>
    <link rel="stylesheet" type="text/css" href="Dsigne.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #e6f2ff, #cce6ff);
            margin: 0;
            padding: 20px;
            color: #333;
            text-align: center;
        }

        h1 {
            color: #007bff;
            margin-bottom: 20px;
            font-size: 2em;
        }

        form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 400px; /* Largura fixa para o formulário */
            margin: 20px auto; /* Centraliza o formulário e dá espaço */
            text-align: left; /* Alinha o texto do formulário à esquerda */
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="password"] {
            width: calc(100% - 22px); /* Largura total menos padding e borda */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Inclui padding e borda na largura */
        }

        form input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%; /* Botão ocupa a largura total do formulário */
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Estilo para os links de navegação inferior */
        body > a { /* Seleciona links diretos no body */
            display: inline-block;
            margin: 10px;
            padding: 8px 15px;
            background-color: #c6eafb;
            color: #007bff;
            border: 2px solid #007bff;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        body > a:hover {
            background-color: #9ac4f0;
            color: #004a99;
        }

    </style>
</head>
<body>

<h1>Editar Usuário</h1>

<form method="POST" action="atualizar_usuario.php">
    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

    <label for="email">Email do Usuário:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required><br><br>

    <label for="senha_nova">Senha:</label>
    <input type="password" id="senha_nova" name="senha_nova" placeholder="Deixe em branco para não alterar" autocomplete="new-password"><br><br>
    
    <label for="endereco">Endereço:</label>
    <input type="text" id="endereco" name="endereco" value="<?php echo htmlspecialchars($usuario['endereco']); ?>" required><br><br>
    
    <input type="submit" value="Atualizar">
</form>

<br>
<a href="Perfil.php">Voltar para o Perfil</a> | <a href="logout.php">Logout</a>

</body>
</html>