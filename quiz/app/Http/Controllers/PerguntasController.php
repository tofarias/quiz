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

    public function index()
    {
        $series = require_once base_path().'/database/series.php';
        #dd( $series );
        #dd( $series[0]['respostas']);
        return view('index', compact('series'));
    }
}
