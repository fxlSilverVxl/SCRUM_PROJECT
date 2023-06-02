<?php 
    include "../clases/conexion.php";
    include "../clases/crud.php";

    session_start();
    $crud = new Crud();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pass = $_POST['password'];
        $tipo = $_POST['tipo'];
    
        $res = $crud->validarCredenciales($tipo, $pass);

        if($res === NULL){
            header("Location: ../login.php");
            exit();
        } elseif ($tipo === 'caja') {
            $_SESSION['username'] = $tipo;
            header("Location: ../caja.php");
            exit();
        } elseif ($tipo === 'cocina') {
            $_SESSION['username'] = $tipo;
            header("Location: ../cocinero.php");
            exit();
        }
    }
?>