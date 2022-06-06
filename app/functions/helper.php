<?php
use philo\Blade\Blade;


function view($path, array $data = [])
{
    $view= __DIR__ . '/../../resources/views';
    $cache= __DIR__ . '/../../bootstrap/cache';

    $blade= new Blade();
    echo $blade->view()->make($path,$data)-> render();
    
}