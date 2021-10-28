<?php
namespace classes\controller;
use classes\controller\InterfaceControlador;

class Abertura implements InterfaceControlador{

    public function processaRequisicao(): void
    {
        require './view/abertura.php';
    }
}