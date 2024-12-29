<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.html");
    exit();
}

include "../../../config/db.php";

$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$descricao_rapida = $_POST['descricao_rapida'];
$descricao_detalhada = $_POST['descricao_detalhada'];
$preco = $_POST['preco'];

$target_dir = "../../../public/uploads/";
$target_file = $target_dir . basename($_FILES["imagem"]["name"]);
move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);

$target_file;

$conn = connect();

$sql = "INSERT INTO produtos(nome, quantidade, imagem, descricao_rapida, descricao, preco) VALUES (?,?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $nome, $quantidade, $target_file, $descricao_rapida, $descricao_detalhada, $preco);

if ($stmt->execute()) {
    echo "<script> alert('Produto cadastrado com sucesso'); window.location.href = '../dashboard/dashboard.php'</script>";
}

$stmt->close();
$conn->close();
