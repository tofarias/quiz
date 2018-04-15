<?php

namespace App;

use Illuminate\Http\Request;

class Pergunta
{
    const PESO_PERGUNTA_01 = 1;
    const PESO_PERGUNTA_02 = 2;
    const PESO_PERGUNTA_03 = 3;
    const PESO_PERGUNTA_04 = 4;
    const PESO_PERGUNTA_05 = 5;

    private $series;

    public function __construct(Serie $serie)
    {
        $this->serie = $serie;
    }

    public function buscar()
    {
        return require_once base_path().'/database/series.php';
    }

    public function avaliarRespostas(Request $request)
    {

    }


}
