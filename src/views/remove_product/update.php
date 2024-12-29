<?php

include "../../../config/db.php";

$id = $_POST['id'];
$quantidade = $_POST['quantidade'];
$quant_atual = $_POST['quant_atual'];
$preco = $_POST['preco'];

if ($quantidade > $quant_atual) {
    echo "<script> alert('Quantidade de retirada não pode ser maior que a quatidade atual'); window.location.href = '../dashboard/dashboard.php'; </script>";
} else {
    $quant_nova = $quant_atual - $quantidade;

    $preco *= $quantidade;

    $conn = connect();

    $sql = "UPDATE produtos SET quantidade = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $quant_nova, $id);


    if ($stmt->execute()) {
        echo "<script> alert('Produto retirado com sucesso, valor total é: $" . $preco . "'); window.location.href = '../dashboard/dashboard.php'; </script>";
    }

    $stmt->close();
    $conn->close();
}
