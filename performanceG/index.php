<?php

require 'autoload.php';

$endereco = $_SERVER['REQUEST_URI'];
$rotas = require 'config/Rotas.php';

if (!array_key_exists($endereco, $rotas)){
    http_response_code(404);
    exit();
}
        
 $classeControladora = $rotas[$endereco];
 $controlador = new $classeControladora();
 $controlador->processaRequisicao();
 
?>