<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: Login.php');
    exit();
}

include 'configuraçao.php';

// Modifique a consulta SQL para selecionar as colunas que você realmente tem
// E que deseja exibir ou usar
$sql = "SELECT id, email, endereco FROM usuarios"; // Seleciona ID, EMAIL e ENDERECO
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listar Usuários</title>
    <link rel="stylesheet" type="text/css" href="Dsigne.css">
    <style>
        /* Estilo para o botão de PDF */
        .btn-pdf {
            background-color: #dc3545; /* Vermelho vibrante */
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none; /* Remover sublinhado do link */
            display: inline-block; /* Para o padding e largura funcionarem em links */
            margin-left: 20px; /* Espaçamento da margem */
            margin-top: 20px; /* Espaço acima do botão */
        }

        .btn-pdf:hover {
            background-color: #c82333; /* Tom mais escuro no hover */
        }

        /* Estilos adicionais para a tabela ficar parecida com o perfil.php */
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
        }

        table {
            width: 80%;
            margin: 0 auto; /* Centraliza a tabela */
            border-collapse: collapse;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px; /* Bordas arredondadas para a tabela */
            overflow: hidden; /* Garante que as bordas arredondadas sejam visíveis */
        }

        table, th, td {
            border: 1px solid #cce6ff; /* Borda mais suave */
        }

        th {
            background-color: #007bff;
            color: white;
            padding: 12px 15px;
            text-align: left;
        }

        td {
            background-color: white;
            padding: 10px 15px;
            text-align: left;
        }

        tr:nth-child(even) td { /* Alterna a cor do background para linhas pares */
            background-color: #f7f7f7;
        }

        td a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        td a:hover {
            text-decoration: underline;
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

<h1>Lista de Usuários</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Email do Usuário</th>
        <th>Senha</th> <th>Endereço</th> <th>Ações</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['email']); ?></td>
        <td>******</td> <td><?php echo htmlspecialchars($row['endereco']); ?></td> <td>
            <a href="editar_usuario.php?id=<?php echo $row['id']; ?>">Editar</a> |
            <a href="excluir_usuario.php?id=<?php echo $row['id']; ?>">Excluir</a>
        </td>
    </tr>
    <?php } ?>
</table>

<br>
<a href="Perfil.php">Voltar para o Perfil</a> | <a href="logout.php">Logout</a>

<a href="gerar_pdf.php" target="_blank" class="btn-pdf">Gerar PDF de Usuários</a>

</body>
</html>