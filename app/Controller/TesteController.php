<?php
namespace App\Controller;

use Core\Template\Twig;

class TesteController extends Twig {
    public function teste($twig) {
        echo "kkkk";
        var_dump($twig);
        $twig->render('/app/home.html', []);
    }
}