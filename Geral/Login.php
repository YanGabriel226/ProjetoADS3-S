<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .login-container {
      max-width: 400px;
      margin: 80px auto;
      background-color: #ffffff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 8px 0 16px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .button-group {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }

    .button-group input[type="submit"] {
      flex: 1;
      padding: 12px;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }

    .login-btn {
      background-color: #007bff;
      color: white;
    }

    .login-btn:hover {
      background-color: #0056b3;
    }
    .register-btn {
    background-color: #28a745;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    flex: 1;
    }

    .register-btn:hover {
    background-color: #1e7e34;
    }

  </style>
</head>
<body>

  <div class="login-container">
    <h2>Logar</h2>
    <form action="login.php" method="post">
      <input type="text" name="login" placeholder="Usuário" required />
      <input type="password" name="password" placeholder="Senha" required />
      
      <div class="button-group">
        <input type="submit" class="login-btn" value="Entrar" />
        <button type="button" class="register-btn" onclick="window.location.href='cadastrar.html'">Cadastrar</button>
      </div>
    </form>
  </div>

</body>
</html>
