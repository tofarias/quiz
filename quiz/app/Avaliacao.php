<?php

namespace App;


class Avaliacao
{
    private $dados;
    private $serie;

    public function __construct(Pergunta $pergunta, Serie $serie)
    {
        $this->dados = [];
        $this->pergunta = $pergunta;
        $this->serie = $serie;
    }

    public function organizarDados( Array $dadosDaRequisicao )
    {
        $idSeries = $this->serie->getIds();

        $avaliacao = [];

        $i = 0;
        foreach($idSeries as $i => $idSerie)
        {
            $perguntas = array_keys($dadosDaRequisicao, $idSerie);

            if( !empty(count($perguntas)) ){
                $avaliacao[$i]['serie_id']    = $idSerie;
                $avaliacao[$i]['total_votos'] = count($perguntas);

                foreach( $perguntas as $k => $pergunta )
                {
                    $avaliacao[$i]['perguntas'][$k]['pergunta'] = $pergunta;
                    $avaliacao[$i]['perguntas'][$k]['peso']     = $this->pergunta->getPesoPergunta($pergunta);
                }
            }

            $i ++;
        }

        echo "<pre>";
        print_r($avaliacao);
        echo "</pre>";
        die;
    }
}
