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

    public function avaliarDados( Array $dadosDaRequisicao )
    {
        $idSeries = $this->serie->getIds();

        $avaliacao = [];

        $i = 0;
        foreach($idSeries as $i => $idSerie)
        {
            $perguntas = array_keys($dadosDaRequisicao, $idSerie);

            if( !empty(count($perguntas)) ){
                $avaliacao[$i]['serie_id']    = $idSerie;
                $avaliacao[$i]['frase']       = $this->serie->buscarFrase($idSerie);
                $avaliacao[$i]['total_votos'] = count($perguntas);

                foreach( $perguntas as $k => $pergunta )
                {
                    $avaliacao[$i]['perguntas'][$k]['pergunta'] = $pergunta;
                    $avaliacao[$i]['perguntas'][$k]['peso']     = $this->pergunta->getPesoPergunta($pergunta);
                }
            }

            $i ++;
        }

        $avaliacao = $this->calcularNotas($avaliacao);
        return current($avaliacao)['frase'];
    }

    public function calcularNotas( Array $avaliacao ) : Array
    {
        foreach( $avaliacao as $k => $dados )
        {
            $avaliacao[$k]['nota'] = 0;
            foreach( $dados['perguntas'] as $pergunta )
            {
                $avaliacao[$k]['nota'] += $pergunta['peso'];
            }
        }

        $arr = $avaliacao;
        usort($arr, array($this,'ordenarPorNota'));
        return $arr;
    }

    private static function ordenarPorNota($a, $b)
    {
        return $a['nota'] <= $b['nota'] ? 1 : -1;
    }
}
