<?php

require_once "../../config/db.php";

$id = $_POST['id'];

$conn = connect();

$stmt = $conn->prepare("SELECT imagem FROM produtos WHERE id = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

$imagem = null;

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imagem = $row['imagem'];
};

$stmt->close();

$imagem = str_replace('../', '', $imagem);

$imagem = '../../' . $imagem;

if (file_exists($imagem)) {
    unlink($imagem);
}

$stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
$stmt->bind_param("s", $id);

if ($stmt->execute()) {
    echo "<script> alert('Produto deletado com sucesso'); window.location.href = '../views/dashboard/dashboard.php'</script>";
} else {
    echo "<script> alert('Houve um erro ao deletar o produto'); window.location.href = '../views/dashboard/dashboard.php'</script>";
}

$stmt->close();
$conn->close();
