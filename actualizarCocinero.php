<?php
  include "../clases/conexion.php";
  include "../clases/crud.php";

  $crud = new Crud();

  if (isset($_POST['enviar'])) {
    $id = $_POST['id'];
    $datos = array(
      "terminado" => true,
      "entregado" => true
    );
    $respuesta = $crud->actualizarCocina($id, $datos);
  }
?>
