<?php
/**
 * Created by PhpStorm.
 * User: krubioc
 * Date: 25/05/2018
 * Time: 12:12
 */
$controller = $_REQUEST["controller"];
$task = $_REQUEST["task"];

switch ($controller){
    case "Empresa":
        require_once ("empresaController.php");
        $objeto = new empresaController();
        switch ($task){
            case 1:
                echo json_encode($objeto->rEmpresa(1));
                break;
            default:
                echo json_encode($controller . " aún no tiene implementado la tarea " . $task);
                break;
        }
        break;
    default:
        echo json_encode("Aún no has implementado el controlador " . $controller);
        break;
}