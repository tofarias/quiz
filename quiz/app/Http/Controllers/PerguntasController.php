<?php

namespace App\Http\Controllers;

use App\Avaliacao;
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

    public function avaliarRespostas(\Illuminate\Http\Request $request, Avaliacao $avaliacao)
    {
        $avaliacao->organizarDados( $request->all() );
        $avaliacao->calcularNotas();
    }
}
