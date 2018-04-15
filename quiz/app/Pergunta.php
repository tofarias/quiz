<?php

namespace App;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\String_;

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

    public function getPesoPergunta(string $pergunta) : string
    {
        $perguntas = [
            'pergunta1' => 1,
            'pergunta2' => 2,
            'pergunta3' => 3,
            'pergunta4' => 4,
            'pergunta5' => 5
        ];

        return $perguntas[$pergunta];
    }
}
