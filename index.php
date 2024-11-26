<?php

include 'db.php';

// Buscar todos os chamados
$sql = "SELECT * FROM chamados";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atendimento de Chamados</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Chamados</h1>
<!-- esse while aqui mantem as informações sendo mostradas enquanto há coisas no banco -->
        <div class="row">
            <?php while ($chamado = $result->fetch_assoc()): ?> 
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $chamado['nome_cliente'] ?></h5>
                            <p class="card-text"><?= $chamado['descricao'] ?></p>
                            <p class="card-text"><strong>Status:</strong> <?= $chamado['status'] ?></p>
                            <p class="card-text"><small class="text-muted"><?= $chamado['data_abertura'] ?></small></p>
                            <a href="editar.php?id=<?= $chamado['id'] ?>" class="btn btn-primary">Editar</a>
                            <a href="deletar.php?id=<?= $chamado['id'] ?>" class="btn btn-danger">Deletar</a>
                            <!-- vai ser passado por get para a outra página esse editar e excluir-->
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <!-- encerra o while -->
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
