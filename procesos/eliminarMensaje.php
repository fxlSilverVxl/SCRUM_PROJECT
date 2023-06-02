<?php 
  include "../clases/conexion.php";
  include "../clases/crud.php";

  $Crud = new Crud();
  $id = $_POST['msjID'];
  //print_r($id);
  $respuesta = $Crud->eliminarMensaje($id);

  if($respuesta->getDeletedCount() > 0){
    header("location:../caja.php");
  } else {
    print_r($respuesta); 
  }

?>
