<?php

include "../../../config/db.php";

$id = $_POST['id'];
$quantidade = $_POST['quantidade'];
$quant_atual = $_POST['quant_atual'];

$quant_nova = $quant_atual + $quantidade;

$conn = connect();

$sql = "UPDATE produtos SET quantidade = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $quant_nova, $id);


if ($stmt->execute()) {
    echo "<script> alert('Produto adicionado com sucesso'); window.location.href = '../dashboard/dashboard.php'</script>";
}

$stmt->close();
$conn->close();
