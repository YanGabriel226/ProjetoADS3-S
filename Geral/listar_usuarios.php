<?php
$conn = new mysqli("localhost", "root", "", "sistema");
$result = $conn->query("SELECT * FROM usuarios");
?>

<h2>Usuários Cadastrados</h2>
<table border="1">
  <tr><th>Email</th><th>Endereço</th><th>Ações</th></tr>
  <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['email'] ?></td>
      <td><?= $row['endereco'] ?></td>
      <td>
        <a href="editar_usuario.php?id=<?= $row['id'] ?>">Editar</a> |
        <a href="excluir_usuario.php?id=<?= $row['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>
