<?php

/**
 * Created by PhpStorm.
 * User: krubioc
 * Date: 25/05/2018
 * Time: 10:58
 */
require_once ("../models/Empresa.php");

class empresaController
{
    private $empresa;

    public function __construct(){
        $this->empresa = new Empresa();
    }

    public function rEmpresa($idEmpresa){
        $this->empresa->set("idEmpresa", $idEmpresa);
        $datos = $this->empresa->read();
        return $datos;
    }
}