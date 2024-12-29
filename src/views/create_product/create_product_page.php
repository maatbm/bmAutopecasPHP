<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../index.html");
    exit();
}
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../public/css/style.css">
    <link rel="icon" href="../../../public/images/icon.png">
    <title>BM AUTOPEÇAS | CRIAR PRODUTO</title>
</head>

<body>
    <header class="container-fluid text-center">
        <h1 class="h1 mt-3 text-white">BM AUTOPEÇAS</h1>
    </header>
    <main class="container d-flex justify-content-around align-items-center">
        <div class="container card1 rounded">
            <div class="container">
                <h2 class="h2 text-center">Criar novo produto</h2>
            </div>
            <div class="container">
                <form class="d-flex flex-column align-items-center" action="create_product.php" method="post" autocomplete="off" enctype="multipart/form-data">
                    <p class="align-self-center">Imagem:</p>
                    <input class="align-self-center" type="file" name="imagem" id="imagem" required>
                    <p class="align-self-start">Nome do produto</p>
                    <input type="text" class="input1" name="nome" placeholder="Insira aqui o nome do produto">
                    <p class="align-self-start">Quantidade</p>
                    <input type="text" class="input1" name="quantidade" placeholder="Insira aqui a quantidade do produto">
                    <p class="align-self-start">Preço</p>
                    <input type="text" class="input1" name="preco" placeholder="Insira aqui o preço do produto">
                    <p class="align-self-start">Descrição rápida</p>
                    <input type="text" class="input1" name="descricao_rapida" placeholder="Insira aqui a descrição rápida">
                    <p class="align-self-start">Descrição detalhada</p>
                    <input type="text" class="input1" name="descricao_detalhada" placeholder="Insira aqui a descrição detalhada">
                    <input type="submit" class="input2 rounded btn btn-secondary" id="enviar" value="Criar">
                </form>
            </div>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</html>