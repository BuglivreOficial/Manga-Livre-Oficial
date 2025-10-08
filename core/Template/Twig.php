<?php
namespace Core\Template;


use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use Core\Template\CustomtwigExtension;

class Twig
{
    private $twig;

    public function render(string $file, array $data = [])
    {
        $loader = new FilesystemLoader("layout");
        $this->twig = new Environment($loader, [
            //'cache' => 'layout/cache'
        ]);

        $this->twig->addExtension(new CustomtwigExtension());

        echo $this->twig->render($file, $data);
    }
}
