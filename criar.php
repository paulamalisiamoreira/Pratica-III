<?php
include('db.php');

// recebendo os dados por post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coletar dados do formulário
    $nome_cliente = $_POST['nome_cliente'];
    $descricao = $_POST['descricao'];
    
    // Inserir dados no banco de dados
    $sql = "INSERT INTO chamados (nome_cliente, descricao) VALUES ('$nome_cliente', '$descricao')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Novo chamado criado com sucesso!";
        header("Location: index.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Chamado</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Criar Chamado</h1>

        <form action="criar.php" method="POST">
            <div class="form-group">
                <label for="nome_cliente">Nome do Cliente</label>
                <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Criar Chamado</button>
        </form>
    </div>
</body>
</html>
