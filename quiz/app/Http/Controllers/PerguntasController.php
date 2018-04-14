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
}
