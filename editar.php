<?php
include('db.php');

// vamos enviar por post esses dados novos

// recebendo os dados, mas pq por post e não por get que foi como ele trouxe o ID da outra página pra ser enviado?
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coletar dados do formulário
    $id = $_POST['id'];
    $nome_cliente = $_POST['nome_cliente'];
    $descricao = $_POST['descricao'];
    
    // Atualizar os dados no banco de dados
    $sql = "UPDATE chamados SET nome_cliente='$nome_cliente', descricao='$descricao' WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Chamado atualizado com sucesso!";
        header("Location: index.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM chamados WHERE id='$id'";
    $result = $conn->query($sql);
    $chamado = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Chamado</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Editar Chamado</h1>

        <form action="editar.php" method="POST">
            <input type="hidden" name="id" value="<?= $chamado['id'] ?>">
            <div class="form-group">
                <label for="nome_cliente">Nome do Cliente</label>
                <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" value="<?= $chamado['nome_cliente'] ?>" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="4" required><?= $chamado['descricao'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Chamado</button>
        </form>
    </div>
</body>
</html>
