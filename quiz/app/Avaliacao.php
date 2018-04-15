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

        $this->dados = $avaliacao;

//        echo "<pre>";
//        print_r($avaliacao);
//        echo "</pre>";
//        die;
    }

    public function calcularNotas()
    {
        foreach( $this->dados as $k => $dados )
        {
            $this->dados[$k]['nota'] = 0;
            foreach( $dados['perguntas'] as $pergunta )
            {
                $this->dados[$k]['nota'] += $pergunta['peso'];
            }
        }

        echo "<pre>";
        #print_r( $this->dados );die;
        $arr = $this->dados;

        usort($arr, array($this,'ordenarPorNota'));
        print_r( $arr );
        echo "</pre>";
        die;
    }

    public static function ordenarPorNota($a, $b)
    {
        return $a['nota'] <= $b['nota'] ? 1 : -1;
    }
}
