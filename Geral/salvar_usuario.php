<?php
// Inclua o arquivo de configuração para a conexão com o banco de dados
// Certifique-se de que 'configuraçao.php' foi corrigido para se conectar a 'sistema' e sem o if(!isset($_SESSION['usuario']))
include 'configuraçao.php'; //

// Obter os dados do formulário de cadastro
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$endereco = $_POST['endereco'] ?? '';

// Verificar se os campos obrigatórios foram preenchidos
if (empty($email) || empty($senha) || empty($endereco)) {
    echo "Todos os campos são obrigatórios. Por favor, volte e preencha-os.";
    // Opcional: Adicionar um link de volta para o formulário de cadastro
    echo "<br><a href='cadastrar.html'>Voltar para o Cadastro</a>"; //
    exit();
}

// 1. Gerar o hash da senha
// password_hash() cria um hash seguro da senha. PASSWORD_DEFAULT usa o algoritmo mais forte disponível.
$senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

// 2. Preparar a consulta SQL para inserir os dados
// Usando prepared statements para prevenir SQL Injection (boa prática de segurança)
$stmt = $conn->prepare("INSERT INTO usuarios (email, senha, endereco) VALUES (?, ?, ?)"); //

// Verificar se a preparação da consulta falhou
if ($stmt === false) {
    die("Erro na preparação da consulta: " . $conn->error);
}

// 3. Bind dos parâmetros (vincula as variáveis aos placeholders da consulta)
// "sss" indica que todos os três parâmetros são strings
$stmt->bind_param("sss", $email, $senha_hashed, $endereco);

// 4. Executar a consulta
if ($stmt->execute()) {
    // Redireciona para a página de login após o cadastro bem-sucedido
    header('Location: Login.php?cadastro_sucesso=1'); //
    exit();
} else {
    echo "Erro ao cadastrar usuário: " . $stmt->error;
    // Opcional: Adicionar um link de volta para o formulário de cadastro
    echo "<br><a href='cadastrar.html'>Voltar para o Cadastro</a>"; //
}

// Fechar o statement e a conexão
$stmt->close();
$conn->close();
?>