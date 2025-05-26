<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #e6f2ff, #cce6ff);
            margin: 0;
            padding: 20px;
            color: #333;
            text-align: center;
        }

        .header-perfil {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .perfil-box {
            display: flex;
            align-items: center;
            gap: 15px;
            background-color: #007bff;
            padding: 12px 24px;
            border-radius: 50px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .perfil-box img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .perfil-box h1 {
            color: white;
            font-size: 1.2em;
            margin: 0;
        }

        .perfil-box form {
            margin: 0;
        }

        .btn-login {
            background-color: white;
            color: #007bff;
            border: none;
            border-radius: 20px;
            padding: 6px 12px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #e6f0ff;
        }

        .calendar-img {
            width: 300px;
            height: 300px;
            object-fit: contain;
            border: 5px solid #66b3ff;
            border-radius: 50%;
            padding: 10px;
            background-color: white;
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.2);
        }

        .nav-btn {
            background-color: #c6eafb;
            color: #007bff;
            border: 2px solid #007bff;
            padding: 20px;
            font-size: 24px;
            border-radius: 999px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-btn:hover {
            background-color: #9ac4f0;
            color: #004a99;
            transform: scale(1.05);
            box-shadow: 0 0 15px 5px rgba(0, 123, 255, 0.4);
        }

        .nav-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: inherit;
            transition: left 0.3s ease;
            z-index: 1;
        }

        .nav-btn:hover::after {
            left: 0;
        }
        .btn-config {
        background-color: white;
        color: #007bff;
        border: none;
        border-radius: 20px;
        padding: 6px 12px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 1.2rem;
    }

        .btn-config:hover {
        background-color: #e6f0ff;
    }

    </style>
</head>
<body>

<div class="header-perfil">
    <div class="perfil-box">
        <img src="perfil5.png" alt="Ícone de perfil">
        <h1>Perfil do Usuário</h1>
        <form action="Login.php" method="post">
            <button type="submit" class="btn-login">Login</button>
        </form>
        <form action="configuracao.php" method="get">
        <button type="submit" class="btn-config">
            ⚙️
        </button>
</form>

    </div>
</div>
<br><br><br><br>
<?php
    $meses = ['janeiro'];
    foreach ($meses as $mes) {
        echo "
        <a href='{$mes}.html'>
            <button class='nav-btn' aria-label='Ir para {$mes}'>
                <img src='Design sem nome.png' alt='Calendário' class='calendar-img'>
            </button>
        </a>";
    }
?>
</body>
</html>
