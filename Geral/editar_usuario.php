<?php
$conn = new mysqli("localhost", "root", "", "sistema");
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM usuarios WHERE id = $id");
$usuario = $result->fetch_assoc();
?>

<form action="atualizar_usuario.php" method="post">
  <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
  Email: <input type="email" name="email" value="<?= $usuario['email'] ?>"><br>
  Endereço: <input type="text" name="endereco" value="<?= $usuario['endereco'] ?>"><br>
  <button type="submit">Salvar</button>
</form>
