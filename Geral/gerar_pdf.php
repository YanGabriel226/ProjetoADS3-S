<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: Login.php');
    exit();
}

// Inclua a biblioteca FPDF usando __DIR__ para um caminho mais robusto
require(__DIR__ . '/fpdf/fpdf.php');

// Inclua o arquivo de configuração do banco de dados
include 'configuraçao.php';

// Crie uma nova instância FPDF
$pdf = new FPDF();
$pdf->AddPage(); // Adiciona uma nova página ao PDF

// Define a fonte para o título
$pdf->SetFont('Arial','B',16);
// Aplica utf8_decode() ao título principal
$pdf->Cell(0,10,utf8_decode('Relatório de Usuários Cadastrados'),0,1,'C'); // Título centralizado

$pdf->Ln(10); // Quebra de linha

// Define a fonte para o conteúdo da tabela
$pdf->SetFont('Arial','B',10);

// Cabeçalhos da Tabela - Aplica utf8_decode() a cada cabeçalho
$pdf->Cell(20,7,utf8_decode('ID'),1,0,'C');
$pdf->Cell(80,7,utf8_decode('Email do Usuário'),1,0,'C'); //
$pdf->Cell(60,7,utf8_decode('Endereço'),1,1,'C'); // Use 1 para quebrar a linha após a última célula

$pdf->SetFont('Arial','',10);

// Consulta ao banco de dados
$sql = "SELECT id, email, endereco FROM usuarios ORDER BY id ASC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pdf->Cell(20,7,utf8_decode($row['id']),1,0,'C'); // ID geralmente não precisa, mas não atrapalha
        $pdf->Cell(80,7,utf8_decode(htmlspecialchars($row['email'])),1,0,'L');
        $pdf->Cell(60,7,utf8_decode(htmlspecialchars($row['endereco'])),1,1,'L'); // Quebra de linha após o endereço
    }
} else {
    $pdf->Cell(0,10,utf8_decode('Nenhum usuário encontrado.'),1,1,'C');
}

// Fechar a conexão com o banco de dados
$conn->close();

// Saída do PDF para o navegador
$pdf->Output('I', 'usuarios.pdf'); // 'I' para exibir no navegador, 'D' para forçar download
?>