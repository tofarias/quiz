<?php

$router->get('/', [
    'as' => 'quiz', 'uses' => 'PerguntasController@index'
]);

$router->post('/avaliar-respostas', [
    'as' => 'avaliar-respostas', 'uses' => 'PerguntasController@index'
]);