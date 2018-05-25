<?php

/**
 * Created by PhpStorm.
 * User: krubioc
 * Date: 25/05/2018
 * Time: 9:17
 */
require_once ("Conexion.php");

class Empresa
{
    private $idEmpresa, $ruc, $razonSocial, $direccion, $email, $telefono, $mision, $vision, $descripcion;

    public function __construct(){
        $this->con = new Conexion();
    }

    public function set($atributo, $contenido){
        $this->$atributo = $this->con->escaparCaracteres($contenido);
    }

    public function get($atributo){
        return $this->$atributo;
    }

    public function readAll(){
        $sql = "";
        $datos = $this->con->consultaRetorno($sql);
        return $datos;
    }

    public function read(){
        $sql = "SELECT * FROM empresa WHERE idEmpresa = '{$this->idEmpresa}'";
        return $this->con->consultaRetorno($sql);
    }

    public function create(){
        $sql = "";
        return $this->con->consultaSimple($sql);
    }

    public function update(){
        $sql = "";
        return $this->con->consultaSimple($sql);
    }
}