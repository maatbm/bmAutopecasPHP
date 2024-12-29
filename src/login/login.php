<?php

include "../../config/db.php";

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$conn = connect();

$stmt = $conn->prepare("SELECT id, senha FROM users WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->bind_result($id, $senha_hash);
$stmt->fetch();

$stmt->close();

if ($senha_hash) {
    if (password_verify($senha, $senha_hash)) {
        session_start();
        $_SESSION['user_id'] = $id;
        header("Location: ../views/dashboard/dashboard.php");
        $conn->close();
        exit();
    } else {
        echo "<script> alert('Usuário ou senha incorretos'); window.location.href = '../../index.html'</script>";
    }
} else {
    echo "<script> alert('Usuário ou senha incorretos'); window.location.href = '../../index.html'</script>";
}

$conn->close();
