<?php
namespace Core\Template;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CustomtwigExtension extends AbstractExtension {
    public function getFunctions() {
        return [
            new TwigFunction("url", function(string $path = '') {
                echo $path;
            })
        ];
    }
}