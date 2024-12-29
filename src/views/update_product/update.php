<?php 

require_once "../../../config/db.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];
$desc_rapida = $_POST['descricao_rapida'];
$desc = $_POST['descricao_detalhada'];

$conn = connect();

$stmt = $conn -> prepare("UPDATE produtos SET nome = ?, quantidade = ?, descricao_rapida = ?, descricao = ?, preco = ? WHERE id = ?");
$stmt -> bind_param("sissss", $nome, $quantidade, $desc_rapida, $desc, $preco, $id);

if($stmt -> execute()){
    echo "<script> alert('Produto atualizado com sucesso'); window.location.href = '../dashboard/dashboard.php'</script>";
}else{
    echo "<script> alert('Houve um erro ao atualizar o produto'); window.location.href = '../dashboard/dashboard.php'</script>";
}

$stmt -> close();
$conn ->close();
