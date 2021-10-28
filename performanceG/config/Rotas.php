<?php

use classes\controller\Abertura;
use classes\controller\Gestao;
use classes\controller\Resultado;

$caminho = '/performanceG';
$mat = "";
if(isset($_GET['m'])){ $mat = $_GET['m'];}

return [ 
    
    "{$caminho}/abertura" => Abertura::class,
    "{$caminho}/gestao" => Gestao::class,
    "{$caminho}/resultado" => Resultado::class,
    "{$caminho}/gestao?m={$mat}"  => Gestao::class,
    "{$caminho}/resultado?m={$mat}"  => Resultado::class,

];


