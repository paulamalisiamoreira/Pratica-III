<?php
include('db.php');


// recebendo por get
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM chamados WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Chamado deletado com sucesso!";
        header("Location: index.php");
    } else {
        echo "Erro: " . $conn->error;
    }
}

$conn->close();
?>
