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
        $this->serie->getIds();

        $avaliacao = [];

        $i = 0;
        for($id = 1; $id <=5; $id ++)
        {
            $arr = array_keys($dadosDaRequisicao, $id);
            dd($arr);

            if( !empty(count($arr)) ){
                $avaliacao[$i]['serie_id']    = $id;
                $avaliacao[$i]['total_votos'] = count($arr);

                foreach( $arr as $k => $p )
                {
                    $avaliacao[$i]['perguntas'][$k]['pergunta'] = $p;
                    $avaliacao[$i]['perguntas'][$k]['peso'] = $pergunta->getPesoPergunta($p);
                }

                #$avaliacao[$i]['perguntas']   = $arr;
            }

            $i ++;
        }

        echo "<pre>";
        print_r($avaliacao);
        echo "</pre>";
        die;
    }
}
