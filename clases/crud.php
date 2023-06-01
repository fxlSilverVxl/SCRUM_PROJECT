<?php
class Crud extends Conexion{
  public function mostrarPedidos (){
    try {
      $conexion = Conexion::conectar(); 
      $coleccion = $conexion->pedidos;
      $datos = $coleccion->find();
      return $datos;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
  }

  public function insertarPedidos ($datos){
    try {
      $conexion = Conexion::conectar(); 
      $coleccion = $conexion->pedidos;
      $respuesta = $coleccion->insertOne($datos);
      return $respuesta;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
  }

  public function eliminarPedido($id){
    try {
      $conexion = Conexion::conectar(); 
      $coleccion = $conexion->pedidos;
      $respuesta = $coleccion->deleteOne(
                    array(
                      '_id'=> new MongoDB\BSON\ObjectId($id)
                    )
                  );
      return $respuesta;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
  }

}

?>