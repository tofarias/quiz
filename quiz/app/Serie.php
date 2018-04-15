<?php

namespace App;

class Serie
{
    private static $series;

    public function __construct() { }

    public function buscar()
    {
        if( empty($this->series) ) {
            self::$series = require base_path() . '/database/series.php';
        }

        return $this->embaralharAlternativas(self::$series);
    }

    public function embaralharAlternativas($series) : Array
    {
        foreach( $series as $indice => $serie )
        {
            $alternativas = $serie['alternativas'];
            shuffle( $alternativas );
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

    public function buscarFrase(int $idSerie) : string
    {
        $series = $this->buscar();

        $frase = null;
        foreach( $series as $serie )
        {
            if( $serie['id'] == $idSerie ){
                $frase = $serie['frase'];
            }
        }

        return $frase;
    }
}
