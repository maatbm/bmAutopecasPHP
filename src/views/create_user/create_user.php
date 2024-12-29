<?php
require '../../../vendor/autoload.php';
include "../../../config/db.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('../../../config');
$dotenv->load();


$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$chave = $_POST['chave'];
$security_key = $_ENV['SECURITY_KEY'];

if ($chave == $security_key) {
    if (strlen($usuario) > 200 or strlen($usuario) == 0) {
        echo "<script> alert('O usuário não pode conter mais de 200 caracteres e nem estar vazio'); window.location.href = '../create_user/create_user.html'</script>";
        exit();
    }
    if (strlen($senha) > 10 or strlen($senha) == 0) {
        echo "<script> alert('A senha não pode conter mais de 10 caracteres e nem estar vazia'); window.location.href = '../create_user/create_user.html'</script>";
        exit();
    }

    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);
    $conn = connect();

    $stmt = $conn->prepare('INSERT INTO users(usuario, senha) VALUES (?, ?)');
    $stmt->bind_param("ss", $usuario, $senha_hash);


    if ($stmt->execute()) {
        echo "<script> alert('Usuário criado com sucesso'); window.location.href = '../../../index.html'</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script> alert('Chave de segurança incorreta'); window.location.href = '../create_user/create_user.html'</script>";
}
