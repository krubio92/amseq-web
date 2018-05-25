<?php

/**
 * Created by PhpStorm.
 * User: krubioc
 * Date: 25/05/2018
 * Time: 9:17
 */
class Conexion{
    private $datos = array(
        "host" => "localhost",
        "user" => "root",
        "pass" => "",
        "db" => "amseq-web"
    );
    private $conexion;

    public function __construct(){
        date_default_timezone_set("America/Lima");
        $this->conexion = new mysqli($this->datos["host"], $this->datos["user"], $this->datos["pass"], $this->datos["db"]);
        $this->conexion->query("SET NAMES 'utf8'");
        $this->conexion->query("SET lc_time_names = 'es_ES'");
    }

    public function escaparCaracteres($contenido){
        //Prevenir caracteres no legibles x mysql
        return $this->conexion->real_escape_string($contenido);
    }

    public function consultaSimple($sql){
        //Para consultas insert o update
        $this->conexion->query($sql) or die($this->conexion->error);
        return $this->conexion->affected_rows;
    }

    public function consultaRetorno($sql, $bandera = 0){
        //Para consultas select o que necesiten un resultado de regreso
        //bandera valor 0 es para retornar el resultado, y en valor 1 devuelve la cantidad de filas de la consulta.
        $resultado = $this->conexion->query($sql) or die($this->conexion->error);
        if($bandera == 0){
            $arreglo = array();
            $i = 0;
            while($fila = $resultado->fetch_assoc()){
                $arreglo[$i] = $fila;
                $i++;
            };
            return $arreglo;
        }else{
            return $resultado->num_rows;
        }
    }

    public function consultaEspecial($sql){
        //Para consultas que necesiten del último id insertado
        $this->conexion->query($sql);
        return  $this->conexion->insert_id;
    }
}