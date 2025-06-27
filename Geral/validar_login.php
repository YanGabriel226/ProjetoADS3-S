<?php
session_start(); // Inicia a sessão no TOPO do arquivo

// Inclua o arquivo de configuração para a conexão com o banco de dados
include 'configuraçao.php'; // Verifique se o caminho está correto e o arquivo existe

// --- PONTO DE DEBUG 1: Verificar se a conexão está funcionando ---
if ($conn->connect_error) {
    die("DEBUG: Falha na conexão com o banco de dados em validar_login.php: " . $conn->connect_error);
} else {
    // echo "DEBUG: Conexão com o banco de dados bem-sucedida.<br>"; // Comentar após verificar
}

// Obter os dados do formulário de login (Login.php)
$email_digitado = $_POST['usuario'] ?? '';
$senha_digitada = $_POST['senha'] ?? '';

// --- PONTO DE DEBUG 2: Verificar se os dados do formulário estão chegando ---
echo "DEBUG: Email Digitado: " . htmlspecialchars($email_digitado) . "<br>";
echo "DEBUG: Senha Digitada: " . htmlspecialchars($senha_digitada) . "<br>";

// --- Lógica de validação com o banco de dados ---

// CUIDADO DE SEGURANÇA CRÍTICO:
// Lembre-se, esta consulta ainda está vulnerável a SQL Injection.
// Em produção, SEMPRE use prepared statements para a consulta SQL.
// O hashing de senha será tratado por password_verify().

$sql = "SELECT id, email, senha FROM usuarios WHERE email = '$email_digitado'";
// --- PONTO DE DEBUG 3: Exibir a consulta SQL que está sendo executada ---
echo "DEBUG: SQL da consulta: " . htmlspecialchars($sql) . "<br>";

$result = $conn->query($sql);

if ($result === FALSE) {
    // Erro na consulta SQL - muito útil para depuração
    echo "DEBUG: ERRO na consulta SQL: " . $conn->error . "<br>";
    // Opcional: redirecionar para uma página de erro ou logar o erro
    exit();
}

// --- PONTO DE DEBUG 4: Verificar se o usuário foi encontrado no banco de dados ---
echo "DEBUG: Número de linhas encontradas para o email: " . $result->num_rows . "<br>";

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // --- PONTO DE DEBUG 5: Exibir os dados do usuário recuperados do BD ---
    echo "DEBUG: Dados do usuário recuperados do BD:<br>";
    echo "DEBUG:   ID: " . $user['id'] . "<br>";
    echo "DEBUG:   Email BD: " . htmlspecialchars($user['email']) . "<br>";
    echo "DEBUG:   Senha BD (HASH): " . htmlspecialchars($user['senha']) . "<br>"; // CUIDADO: Nunca exibir senhas em produção!

    // *******************************************************************
    // ******** AQUI ESTÁ A ALTERAÇÃO CRÍTICA NA LINHA ABAIXO **********
    // *******************************************************************
    if (password_verify($senha_digitada, $user['senha'])) { // VERIFICAÇÃO DE HASH
        // --- PONTO DE DEBUG 6: Confirmar que as senhas CASARAM ---
        echo "DEBUG: Senhas CASARAM! Login bem-sucedido.<br>";

        // Login bem-sucedido
        $_SESSION['usuario'] = $user['email']; // Define a variável de sessão

        // --- PONTO DE DEBUG 7: Indicar o redirecionamento ---
        echo "DEBUG: Redirecionando para Perfil.php...<br>";

        // O redirecionamento DEVE ser a ÚLTIMA COISA.
        header('Location: Perfil.php');
        exit(); // Crucial usar exit() após o header()
    } else {
        // --- PONTO DE DEBUG 6b: Indicar que as senhas NÃO CASARAM ---
        echo "DEBUG: Senhas NÃO CASARAM! Senha incorreta.<br>";
        header('Location: Login.php?erro=senha_incorreta');
        exit();
    }
} else {
    // Usuário (email) não encontrado
    // --- PONTO DE DEBUG 4b: Indicar que o usuário NÃO FOI ENCONTRADO ---
    echo "DEBUG: Usuário (email) '" . htmlspecialchars($email_digitado) . "' NÃO encontrado no banco de dados.<br>";
    header('Location: Login.php?erro=usuario_nao_encontrado');
    exit();
}

// Fechar a conexão com o banco de dados
?>