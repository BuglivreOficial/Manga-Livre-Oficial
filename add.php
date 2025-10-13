<?php

use Core\Supabase\Supabase;

require_once("vendor/autoload.php");

$supabase = new Supabase();

if (isset($_POST['username'])) {
    $username = htmlspecialchars($_POST['username']); // segurança básica
    $data = ['name' => $username];

    // Chama sua função que adiciona no Supabase
    $supabase->add('users', $data);

    echo "Usuário '$username' criado com sucesso!";
} else {
    echo "Nenhum nome enviado.";
}
