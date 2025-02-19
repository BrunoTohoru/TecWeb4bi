<?php

namespace Controller;

/*
use src\controller\LocacaoController;
use src\controller\EstiloController;
use src\controller\ClienteController;
use src\controller\FilmeController;
use src\controller\HomeController;
use src\controller\LoginController;
*/

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

switch($url) {
    // Autenticação
    case '/login':
        LoginController::login();
        break;

    case '/autenticar':
        LoginController::autenticar();
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
        LocacaoController::listar();
        break;
    
    case "/locacao/form":
        LocacaoController::form();
        break;

    case "/locacao/form/create":
        LocacaoController::create();
        break;
    case "/locacao/delete":
        LocacaoController::delete();

    // cliente
    case '/cliente':
        ClienteController::listar();
        break;

    case "/cliente/form":
        ClienteController::form();
        break;

    case "/cliente/form/create":
        ClienteController::create();
        break;

    case "/cliente/delete":
        ClienteController::delete();
        break;

    // filme
    case '/filme':
        FilmeController::listar();
        break;

    case "/filme/form":
        FilmeController::form();
        break;

    case "/filme/form/create":
        FilmeController::create();
        break;

    case "/filme/delete":
        FilmeController::delete();
        break;

    // estilo
    case '/estilo':
        EstiloController::listar();
        break;

    case "/estilo/form":
        EstiloController::form();
        break;

    case "/estilo/form/create":
        EstiloController::create();
        break;

    case "/estilo/delete":
        EstiloController::delete();
    break;

    default:
        echo "Erro 404";
        break;
}

?>