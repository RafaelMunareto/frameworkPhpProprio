<?php
namespace classes\controller;
require('../../autoload.php');
use classes\modais\Modais;


require('../helper/Formatador.php');

$modal = new Modais('vwPerformanceGECANNotaFinal', 'resultado');
$item = $_POST['item']; 

if($item != 2){
    $modal->modal_resultadoAG($item);
}else{
    $modal->modal_portabilidade(); 
}
