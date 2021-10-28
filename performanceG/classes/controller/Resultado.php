<?php
namespace classes\controller;
use classes\controller\InterfaceControlador;
use classes\select\SelectBox;
use classes\consulta\ConsultaTabelas;
use classes\modais\Modais;

class Resultado implements InterfaceControlador{

    public function processaRequisicao(): void
    {
        $select = new SelectBox('vwPerformanceGECANNotaFinal', 'resultado');
        $consulta = new ConsultaTabelas('vwPerformanceGECANNotaFinal', 'resultado');
        $modal = new Modais('vwPerformanceGECANNotaFinal', 'resultado');
        require './view/resultado.php';
    }
}