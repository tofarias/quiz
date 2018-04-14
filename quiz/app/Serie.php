<?php

namespace App;

class Serie
{
    private $series;

    public function __construct() { }

    public function buscar()
    {
        $series = require_once base_path().'/database/series.php';
        return $this->embaralharAlternativas($series);
    }

    public function embaralharAlternativas($series)
    {
        foreach( $series as $indice => $serie )
        {
            $alternativas = $serie['alternativas'];
            #shuffle( $alternativas );
            $series[$indice]['alternativas'] = $alternativas;
        }

        return $series;
    }
}
