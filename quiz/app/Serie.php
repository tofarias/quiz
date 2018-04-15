<?php

namespace App;

class Serie
{
    private $series;

    public function __construct() { }

    public function _buscar() : Array
    {
        $series = require_once base_path().'/database/series.php';
        return $this->embaralharAlternativas($series);
    }

    public function buscar() : Array
    {
        return require_once base_path().'/database/series.php';
    }

    public function embaralharAlternativas($series) : Array
    {
        foreach( $series as $indice => $serie )
        {
            $alternativas = $serie['alternativas'];
            #shuffle( $alternativas );
            $series[$indice]['alternativas'] = $alternativas;
        }

        return $series;
    }

    public function getIds() : Array
    {
        $series = $this->buscar();
        $ids = [];

        foreach( $series as $serie )
        {
            $ids[] = $serie['id'];
        }

        return $ids;
    }
}
