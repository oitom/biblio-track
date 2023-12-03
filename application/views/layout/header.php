<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblio Track</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="<?=CSS?>style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light nav-bg">
    <div class="container">
        <!-- Logo à Esquerda -->
        <a class="navbar-brand" href="/">
            <img src="<?= IMAGES ?>logo.png" width="40" height="40" class="d-inline-block align-top" alt="Logo">
            Biblio Track
        </a>

        <!-- Botão de Alternância para Tamanhos Pequenos -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Itens da Navegação -->
        <!-- <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cadastar-se</a>
                </li>
            </ul>
        </div> -->
    </div>
</nav> 