<?php
  include "../clases/conexion.php";
  include "../clases/crud.php";

  $crud = new Crud();

  $ids = $crud->obtenerID();
  $total = count(iterator_to_array($ids));


  // tabla en mongo --------- name en el pedidos.php
  $datos = array(
    "id" => date("d/m/Y") . '-' . $total,
    "producto" => $_POST['producto'],
    "precio" => $_POST['precio'],
    "descripcion" => $_POST['descripcion'],
    "fecha" => date("d/m/Y"),
    // "terminado" => false, //! Borrar
    // "entregado" => false, //! Borrar
    "estado" => "pedido"
  );
  $respuesta = $crud->insertarPedidos($datos);

  if($respuesta->getInsertedID() > 0){
     header("location:../caja.php");
  } else {
    print_r($respuesta); 
  }

?>
