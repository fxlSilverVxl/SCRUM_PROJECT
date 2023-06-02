<?php
  include "../clases/conexion.php";
  include "../clases/crud.php";

  $crud = new Crud();

  // tabla en mongo --------- name en el pedidos.php
  $datos = array(
    "producto" => $_POST['producto'],
    "precio" => $_POST['precio'],
    "descripcion" => $_POST['descripcion'],
    "fecha" => date("d/m/Y"),
    "terminado" => false,
    "entregado" => false
  );
  $respuesta = $crud->insertarPedidos($datos);

  if($respuesta->getInsertedID() > 0){
     header("location:../caja.php");
  } else {
    print_r($respuesta); 
  }

?>
