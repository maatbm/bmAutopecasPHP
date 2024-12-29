<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../index.html");
    exit();
}

include "../../../config/db.php";

$conn = connect();

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

$produtos = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $produtos[] = $row;
  }
}

?>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../../public/css/dashboard.css">
  <link rel="icon" href="../../../public/images/icon.png">
  <title>BM AUTOPEÇAS | DASHBOARD</title>
</head>

<body>
  <header class="container-fluid mt-3 text-center">
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded shadow">
      <div class="container-fluid">
        <a class="navbar-brand h1 fs-1">BM AUTOPEÇAS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-dark bg-warning rounded" aria-current="page" href="../create_product/create_product_page.php">Criar novo produto</a>
            </li>
          </ul>
          <form class="d-flex" action="../search/busca.php" method="post" autocomplete="off">
            <input class="form-control me-2" type="search" placeholder="Nome do produto" aria-label="Search" name="nome">
            <button class="btn  btn-outline-warning" type="submit">Buscar</button>
          </form>
        </div>
      </div>
    </nav>
  </header>
  <main class="container-fluid d-flex justify-content-around mt-4 container1">
    <?php foreach ($produtos as $produto): ?>

      <div class="card text-center mt-4 shadow">
        <img src="<?= htmlspecialchars($produto['imagem']); ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($produto['nome']); ?></h5>
          <p class="card-text"><?= htmlspecialchars($produto['descricao_rapida']); ?></p>
          <h5 class="card-title">Quantidade: <?= htmlspecialchars($produto['quantidade']); ?></h5>
          <h5 class="card-title">Preço: $<?= htmlspecialchars($produto['preco']); ?></h5>
          <h5 class="card-title">Código do produto: <?= htmlspecialchars($produto['id']); ?></h5>
          <form action="../remove_product/retirar.php" method="post" autocomplete="off">
            <input type="text" name="id" value="<?= htmlspecialchars($produto['id']); ?>" style="display: none;">
            <input type="submit" class="btn btn-warning mt-3 container" value="Retirar">
          </form>
          <form action="../add_product/adicionar.php" method="post" autocomplete="off">
            <input type="text" name="id" value="<?= htmlspecialchars($produto['id']); ?>" style="display: none;">
            <input type="submit" class="btn btn-warning mt-3 container" value="Adicionar">
          </form>
          <form action="../update_product/update_product_page.php" method="post" autocomplete="off">
            <input type="text" name="id" value="<?= htmlspecialchars($produto['id']); ?>" style="display: none;">
            <input type="submit" class="btn btn-warning mt-3 container" value="Atualizar produto">
          </form>
          <form action="../../delete_product/delete.php" method="post" autocomplete="off">
            <input type="text" name="id" value="<?= htmlspecialchars($produto['id']); ?>" style="display: none;">
            <input type="submit" class="btn btn-warning mt-3 container" value="Deletar produto">
          </form>
        </div>
      </div>

    <?php endforeach; ?>
  </main>
  <footer class="bg-warning">
    <div class="container-fluid text-center">
      <h4 class="h5 title_footer">BM AUTOPEÇAS / Copyright © <?= date('Y') ?>. Todos os direitos reservados</h4>
    </div>
  </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>