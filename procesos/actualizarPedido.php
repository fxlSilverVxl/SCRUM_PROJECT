<?php
  include "../clases/conexion.php";
  include "../clases/crud.php";

  $Crud = new Crud();
  $id = $_POST['itemID'];  
  
  // tabla en mongo --------- name en el actualizar.php
  $datos = array(
    "producto" => $_POST['producto'],
    "precio" => $_POST['precio'],
    "descripcion" => $_POST['descripcion'],
  );

  $respuesta = $Crud->actualizarPedido($id, $datos);

  if($respuesta->getModifiedCount() > 0 || $respuesta->getMatchedCount() > 0){
    header("location:../caja.php");
  } else {
    print_r($respuesta); 
  }

?>