<?php 
    include "../clases/conexion.php";
    include "../clases/crud.php";

    $crud = new Crud();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // $usuario = $_POST['usuario'];
        $pass = $_POST['password'];
        $tipo = $_POST['tipo'];
    
        $res = $crud->validarCredenciales($tipo, $pass);

        if($res === NULL){
            header("Location: ../login.php");
            exit();
        } elseif ($tipo === 'caja') {
            header("Location: ../pedidos.php");
            exit();
        } elseif ($tipo === 'cocina') {
            header("Location: ../cocinero.php");
            exit();
        }
    }
?>