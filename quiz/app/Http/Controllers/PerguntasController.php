<?php

namespace App\Http\Controllers;

use App\Avaliacao;
use App\Pergunta;
use Illuminate\Http\Request;

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

    public function index(Request $request, \App\Quiz $quiz, Avaliacao $avaliacao)
    {
        if( $request->isMethod('POST') ){

            $resposta = $avaliacao->avaliarDados( $request->all() );
        }

        $alternativasDasSeries = $quiz->criar();
        
        return view('index', compact('alternativasDasSeries', 'resposta'));
    }
}
