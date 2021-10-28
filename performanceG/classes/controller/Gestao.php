<?php
namespace classes\controller;
use classes\controller\InterfaceControlador;
use classes\select\SelectBox;
use classes\consulta\ConsultaTabelas;
use classes\modais\Modais;

class Gestao implements InterfaceControlador{

    public function processaRequisicao(): void
    {
        
        $select = new SelectBox('vwPerformanceGECANNotaFinalGestao', 'gestao');
        $consulta = new ConsultaTabelas('vwPerformanceGECANNotaFinalGestao', 'gestao');
        $modal = new Modais('vwPerformanceGECANNotaFinalGestao', 'gestao');
        require './view/gestao.php';
    }
}