<?php

namespace App;

use Illuminate\Support\Collection;

class Quiz
{
    private $pergunta;
    private $serie;

    public function __construct(Pergunta $pergunta, Serie $serie)
    {
        $this->pergunta = $pergunta;
        $this->serie    = $serie;
    }

    public function criar() : Collection
    {
        $series = $this->embaralharSeries();
        $alternativas = [];
        foreach( $series as $k => $serie )
        {
            $alternativasDaSerie = $serie['alternativas'];
            
            for( $contadorDePerguntas = 0; $contadorDePerguntas < 5; $contadorDePerguntas ++ )
            {
                for( $contadorDeAlternativas = 0; $contadorDeAlternativas < 5; $contadorDeAlternativas ++ )
                {
                    if( empty($alternativas[$contadorDeAlternativas][$contadorDePerguntas]['alternativa']) ){
                        
                        $alternativas[$contadorDeAlternativas][$contadorDePerguntas]['alternativa'] = array_shift( $serie['alternativas'] );
                        $alternativas[$contadorDeAlternativas][$contadorDePerguntas]['id'] = $serie['id'];
                    }
                }
            }
        }

        return new Collection($alternativas);
    }

    public function embaralharSeries() : Array
    {
        $series = $this->serie->buscar();
        #shuffle( $series );
        return $series;
    }
}
