<?php

require_once "../clases/conexion.php";
require_once "../clases/crud.php";

$crud = new Crud();

$datos = array (
    "mensaje" => $_POST['mensaje']
);

$respuesta = $crud->insertarMensaje($datos);

if ($respuesta->getInsertedID() > 0) {
    header("location:../cocinero.php");
} else {
    print_r($respuesta);
}
?>
