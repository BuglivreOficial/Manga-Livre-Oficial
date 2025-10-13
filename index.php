<?php

use Core\Log\LogLevel;
use Core\Supabase\Supabase;

require_once("vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Core\Template\Twig;
use Core\Router\Router;

use Core\Log\Logger;

use App\Controller\TesteController;

$twig = new Twig();

$route = new Router();

$logger = new Logger();

$teste = new Supabase();

$teste->add('users', [
    'name' => 'Faz o L'
])
?>

