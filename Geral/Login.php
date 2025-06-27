<?php
session_start();

// Verifica se o usuário já está logado
if(isset($_SESSION['usuario'])){
    // Se estiver logado, exibe a mensagem
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Login</title>
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
            .message-box {
                background-color: #fff3cd; /* Amarelo claro para alerta */
                color: #856404; /* Texto amarelo escuro */
                border: 1px solid #ffeeba;
                border-radius: 5px;
                padding: 15px;
                margin: 20px auto;
                width: 80%;
                max-width: 500px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            }
            .link-button {
                display: inline-block;
                margin: 10px;
                padding: 10px 20px;
                background-color: #007bff;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }
            .link-button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <h1>Atenção!</h1>
        <div class="message-box">
            <p>Você já está logado como **<?php echo htmlspecialchars($_SESSION['usuario']); ?>**.</p>
            <p>Por favor, encerre sua sessão atual para entrar com uma nova conta.</p>
            <a href="logout.php" class="link-button">Encerrar Sessão</a>
            <a href="Perfil.php" class="link-button">Voltar para o Perfil</a>
        </div>
    </body>
    </html>
    <?php
    exit(); // Importante para parar a execução e não mostrar o formulário de login
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="Dsigne.css">
    <style>
        /* Estilos específicos para a página de login quando o formulário é exibido */
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
            width: 300px; /* Largura fixa para o formulário */
            margin: 20px auto; /* Centraliza o formulário e dá espaço */
            text-align: left; /* Alinha o texto do formulário à esquerda */
        }

        form input[type="text"],
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

        .cadastrar-link { /* Novo estilo para o botão de cadastrar */
            display: block; /* Para que ocupe a linha inteira */
            text-align: center;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007bff; /* Cor de fundo mais neutra para um botão secundário */
            color: #333;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1em;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .cadastrar-link:hover {
            background-color: #0056b3;
            color: #000;
        }
    </style>
</head>
<body>

<h1>Login</h1>

<form method="POST" action="validar_login.php">
    <label for="usuario">Usuário (Email):</label>
    <input type="text" id="usuario" name="usuario" required><br><br>
    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required><br><br>
    <input type="submit" value="Entrar">
    <a href="cadastrar.html" class="cadastrar-link">Cadastrar Nova Conta</a>
</form>

</body>
</html>