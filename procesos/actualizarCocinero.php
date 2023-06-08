<?php
  include "../clases/conexion.php";
  include "../clases/crud.php";

  $crud = new Crud();

  $id = $_POST['id'];

  // Verificar el parámetro 'accion' en la URL
  $accion = isset($_GET['accion']) ? $_GET['accion'] : '';

  if ($accion == 'enviar') {
    $datos = array(
      "estado" => "listo"
    );
  } elseif ($accion == 'recogido') {
    $datos = array(
      "estado" => "entregado"
    );
  } elseif ($accion =='tomado') {
    $datos = array(
      "estado" => "tomado"
    );
  }else {
    // Acción no válida
    echo "Acción no válida";
    exit;
  }

  $respuesta = $crud->actualizarCocina($id, $datos);

  if ($respuesta->getModifiedCount() > 0 || $respuesta->getMatchedCount() > 0) {
    header("location:../cocinero.php");
  }else{
    print_r($respuesta);
  }
?>
