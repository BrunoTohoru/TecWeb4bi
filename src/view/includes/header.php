<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="http://localhost:3000/assets/css/style.css">-->
    <!--<link rel="stylesheet" href="assets/css/style.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Atividade de TecWeb 3 - 2º Bimestre</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">TECWEB 3</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/cliente">Listar Cliente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/cliente/form">Cadastrar Cliente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/estilo">Listar Estilo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/estilo/form">Cadastrar Estilo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/filme">Listar Filme</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/filme/form">Cadastrar Filme</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/locacao">Listar Locação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/locacao/form">Cadastrar Locação</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="user-info">
            <legend>Dados do usuário</legend>
            Bem-vindo <strong><?=$_SESSION["usuario_logado"]["nome"]?></strong> | <a href="/sair"><img src="../assets/img/logout.png"></a>
        </div>
    </header>