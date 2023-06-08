<?php
class Crud extends Conexion{
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
  
  public function mostrarPedidosCaja (){
    try {
      $conexion = Conexion::conectar(); 
      $coleccion = $conexion->pedidos;

      $filtro = [
        'estado' => 'pedido'
      ];
      $datos = $coleccion->find($filtro);
      return $datos;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
  }
  public function obtenerID() {
    try {
      $conexion = Conexion::conectar(); 
      $coleccion = $conexion->pedidos;
      $filtro = [
        'fecha' => date("d/m/Y")
      ];
      $datos = $coleccion->find($filtro);
      return $datos;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
  }
  public function mostrarPedidosCocina (){
    try {
      $conexion = Conexion::conectar(); 
      $coleccion = $conexion->pedidos;
      $filtro = [
        '$or' => [
          ['estado' => 'tomado'],
          ['estado' => 'listo'],
        ]
      ];
      $datos = $coleccion->find($filtro);
      return $datos;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
  }
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

  public function mostrarPantallaPedidos() {
    try {
      $conexion = Conexion::conectar(); 
      $coleccion = $conexion->pedidos;
      $filtro = [
        'estado' => 'listo'
      ];
      $datos = $coleccion->find($filtro);
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

  public function actualizarPedido($id, $datos){
    try {
      $conexion = Conexion::conectar(); 
      $coleccion = $conexion->pedidos;
      $respuesta = $coleccion->updateOne(
                                  [
                                    '_id' => new MongoDB\BSON\ObjectId($id)
                                  ],
                                  [
                                    '$set' => $datos
                                  ]
                              );
      return $respuesta;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
  }

  public function mostrarMensajes (){
    try {
      $conexion = Conexion::conectar(); 
      $coleccion = $conexion->mensajes;
      $datos = $coleccion->find();
      return $datos;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
  }
  public function insertarMensaje($datos){
    try {
      $conexion = Conexion::conectar(); 
      $coleccion = $conexion->mensajes;
      $respuesta = $coleccion->insertOne($datos);
      return $respuesta;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
  }
  
  public function eliminarMensaje($id){
    try {
      $conexion = Conexion::conectar(); 
      $coleccion = $conexion->mensajes;
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

}
?>