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

  public function obtenerDocumento($id) {
    try {
        $conexion = Conexion::conectar();
        $coleccion = $conexion->pedidos;
        $datos = $coleccion->findOne(
                                array(
                                    '_id' => new MongoDB\BSON\ObjectId($id)
                                )
                            );
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

  public function actualizarCocina($id, $datos){
    try{
      $conexion = Conexion::conectar(); 
      $coleccion = $conexion->pedidos;
      $respuesta = $coleccion->updateOne(
                                        ['_id' => new MongoDB\BSON\ObjectId($id)],
                                        [
                                          '$set' => $datos
                                        ]
      );
      return $respuesta;
    }
    catch (\Throwable $th) {
      return $th->getMessage();
    }
  }

  public function validarCredenciales($usuario, $password) {
    try {
        $conexion = Conexion::conectar();
        $coleccion = $conexion->usuarios;
        $filtro = array(
            'usuario' => $usuario,
            'contrasena' => $password
        );
        $datos = $coleccion->findOne($filtro);
        return $datos;
    } catch (\Throwable $th) {
        return false;
    }
  }
}
?>