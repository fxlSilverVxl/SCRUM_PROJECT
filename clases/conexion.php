<?php
  require_once $_SERVER['DOCUMENT_ROOT'] . "/cloneRep/SCRUM_PROJECT/vendor/autoload.php";
  class Conexion {
    public function conectar(){
      try {
        $servidor = "127.0.0.1";
        $baseDatos = "comanda-cafeteria-db";
        $puerto = "27017";

        $cadenaConexion = "mongodb://" 
                          . $servidor . ":"
                          . $puerto . "/"
                          . $baseDatos;
        
        $cliente = new MongoDB\Client($cadenaConexion);
        return $cliente->selectDatabase($baseDatos);

      } catch (\Throwable $th) {
        return $th->getMessage();
      }
    }
  }

  $objeto = new Conexion();
  //var_dump($objeto->conectar());