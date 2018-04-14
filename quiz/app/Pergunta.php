<?php

namespace App;

class Pergunta
{
    private $series;

    public function __construct(Serie $serie)
    {
        $this->serie = $serie;
    }

    public function buscar()
    {
        return require_once base_path().'/database/series.php';
    }
}
