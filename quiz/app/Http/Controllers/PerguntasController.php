<?php

namespace App\Http\Controllers;

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

    public function avaliarRespostas(\Illuminate\Http\Request $request)
    {
        #dd( $request->all() );

        $avaliacao = [];

        if ($request->filled('pergunta1')) {
            $pesoQuestao = 1;

            $avaliacao['q1'] = [
                'id' => $request->input('pergunta1'),
                'peso_questao' => $pesoQuestao
                ];

        }
        if ($request->filled('pergunta2')) {
            $pesoQuestao = 2;

            $avaliacao['q2'] = [
                'id' => $request->input('pergunta2'),
                'peso_questao' => $pesoQuestao
            ];
        }
        if ($request->filled('pergunta3')) {
            $pesoQuestao = 3;

            $avaliacao['q3'] = [
                'id' => $request->input('pergunta3'),
                'peso_questao' => $pesoQuestao
            ];
        }
        if ($request->filled('pergunta4')) {
            $pesoQuestao = 4;

            $avaliacao['q4'] = [
                'id' => $request->input('pergunta4'),
                'peso_questao' => $pesoQuestao
            ];
        }
        if ($request->filled('pergunta5')) {
            $pesoQuestao = 5;

            $avaliacao['q5'] = [
                'id' => $request->input('pergunta5'),
                'peso_questao' => $pesoQuestao
            ];
        }

        //

        /*
         array (size=5)
          'pergunta1' => string '3' (length=1)
          'pergunta2' => string '3' (length=1)
          'pergunta3' => string '1' (length=1)
          'pergunta4' => string '5' (length=1)
          'pergunta5' => string '5' (length=1)
         */

        dd( $avaliacao );
        $r = array_keys($avaliacao, 3);

        dd( $r );
    }
}
