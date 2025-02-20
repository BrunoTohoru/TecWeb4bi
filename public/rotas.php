<?php

use Controller\LocacaoController;
use Controller\EstiloController;
use Controller\ClienteController;
use Controller\FilmeController;
use Controller\HomeController;
use Controller\LoginController;


$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

switch($url) {
    // Autenticação
    case '/login':
        LoginController::login();
        break;

    case '/autenticar':
        LoginController::autenticar($entityManager);
        break;

    case '/sair':
        LoginController::sair();
        break;

    // Página Home
    case '/':
        HomeController::index();
        break;
    
    // locacão
    case '/locacao':
        LocacaoController::listar($entityManager);
        break;
    
    case "/locacao/form":
        LocacaoController::form($entityManager);
        break;

    case "/locacao/form/create":
        LocacaoController::create($entityManager);
        break;
    case "/locacao/delete":
        LocacaoController::delete($entityManager);

    // cliente
    case '/cliente':
        ClienteController::listar($entityManager);
        break;

    case "/cliente/form":
        ClienteController::form($entityManager);
        break;

    case "/cliente/form/create":
        ClienteController::create($entityManager);
        break;

    case "/cliente/delete":
        ClienteController::delete($entityManager);
        break;

    // filme
    case '/filme':
        FilmeController::listar($entityManager);
        break;

    case "/filme/form":
        FilmeController::form($entityManager);
        break;

    case "/filme/form/create":
        FilmeController::create($entityManager);
        break;

    case "/filme/delete":
        FilmeController::delete($entityManager);
        break;

    // estilo
    case '/estilo':
        EstiloController::listar($entityManager);
        break;

    case "/estilo/form":
        EstiloController::form($entityManager);
        break;

    case "/estilo/form/create":
        EstiloController::create($entityManager);
        break;

    case "/estilo/delete":
        EstiloController::delete($entityManager);
    break;

    default:
        echo "Erro 404";
        break;
}

?>