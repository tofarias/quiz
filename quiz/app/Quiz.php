<?php

namespace App;

class Quiz
{
    private $pergunta;
    private $serie;

    public function __construct(Pergunta $pergunta, Serie $serie)
    {
        $this->pergunta = $pergunta;
        $this->serie    = $serie;
    }

    public function criar() : Array
    {
        $series = $this->embaralharGrupo();
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
        
        return $alternativas;
    }

    public function embaralharGrupo() : Array
    {
        $series = $this->serie->buscar();
        #shuffle( $series );
        return $series;
    }
}
