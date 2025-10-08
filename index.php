<?php

require("vendor/autoload.php");
session_start();

use Core\Template\Twig;

$twig = new Twig();

$uri = parse_url($_SERVER['REQUEST_URI']);

switch ($uri["path"]) {
    case '/':
        $twig->render("/app/home.html");
        break;

        case '/login':
            $twig->render("/app/login.html");
            break;
    
    default:
        echo "<h1>404 Not Found</h1>";
        break;
}

/**
 * Observações!
 * 
 * Ao definir a rota assim 'teste' mesmo acessando a rota http://localhost/teste a rota não e encontrada mais ao definir
 * a rota como '/teste' a rota e encontrada porque ao usar o parse_url e obter o 'path' a rota e retornada com uma '/' no começo da rota
 */