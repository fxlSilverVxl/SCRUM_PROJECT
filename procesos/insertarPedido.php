<?php
  include "../clases/conexion.php";
  include "../clases/crud.php";

  $crud = new Crud();

  // tabla en mongo --------- name en el pedidos.php
  $datos = array(
    "producto" => $_POST['producto'],
    "precio" => $_POST['precio'],
    "descripcion" => $_POST['descripcion'],
    "fecha" => date("d/m/Y")
  );
  $respuesta = $crud->insertarPedidos($datos);

  if($respuesta->getInsertedID() > 0){
     header("location:../pedidos.php");
  } else {
    print_r($respuesta); 
  }

?>
