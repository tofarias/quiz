<?php

namespace App\Http\Controllers;

use App\Pergunta;

class PerguntasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function index(\App\Quiz $quiz)
    {
        $gruposDeAlternativas = $quiz->criar();
        
        return view('index', compact('gruposDeAlternativas'));
    }

    public function avaliarRespostas(\Illuminate\Http\Request $request, Pergunta $pergunta)
    {
        $respostas = $request->all();

        $avaliacao = [];

        $i = 0;
        for($id = 1; $id <=5; $id ++)
        {
            $arr = array_keys($respostas, $id);
            #dd($arr);

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
