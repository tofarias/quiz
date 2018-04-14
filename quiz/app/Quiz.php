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

    public function criar()
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
                    if( empty($alternativas[$contadorDeAlternativas][$contadorDePerguntas]['frase']) ){

                        $id = $serie['id'];
                        $nmSerie = array_shift( $serie['alternativas'] );
                        
                        $alternativas[$contadorDeAlternativas][$contadorDePerguntas]['frase'] = $nmSerie;
                        $alternativas[$contadorDeAlternativas][$contadorDePerguntas]['id_grupo'] = $id;
                    }
                }
            }
        }
        
        return $alternativas;
    }

    public function embaralharGrupo()
    {
        $series = $this->serie->buscar();
        #shuffle( $series );
        return $series;
    }
}
