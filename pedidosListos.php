<?php

  require_once "./clases/conexion.php";
  require_once "./clases/crud.php";
  $crud = new Crud();
  $datos = $crud->mostrarPantallaPedidos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv=refresh content=10>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/a552314827.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./public/css/style.css">
  <link rel="stylesheet" href="./public/estilos.css">
  <link rel="stylesheet" href="./public/css/cocinero.css">
  <title>Comanda Cafetería</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="height: 60px">
  <div class="container-fluid">
    <h1 class="navbar-brand" href="#">Lunch-Line
      <img src="./public/img/taza_logo.png" alt="" width="40" height="34" class="d-inline-block align-text-top" style="margin-top: -5px;">
    </h1>
    <h2 class="navbar-brand" href="#";>COCINA EPICA 🥵🥵👻</h2>
    <button id="logout" type="button" class="btn btn-primary" style="background-color: #DD540A; border-color: #DD540A" onclick="window.location.href = './login.php'">
      Salir <i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i>
    </button>
  </div>
</nav>

<link rel="stylesheet" href="./public/css/listos.css">

        <div class="container my-4">
            <div class="text-center ">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><h3>No. Pedido</h3></th>
                            <th><h3>Producto</h3></th>
                            <th><h3>Descripcion</h3></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($datos as $item) {
                        ?>
                            <tr>
                                <td> <h2><?php 
                                          $matches = [];
                                          $patron = "/-(\d+)/"; //* Expresion regular para discriminar lo que hay antes del guion
                                          preg_match($patron, $item->id, $matches);
                                          echo $matches[1]
                                      ?> </h2></td>
                                <td> <h2><?php echo $item->producto?> </h2></td>
                                <td> <h2><?php echo $item->descripcion?> </h2></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>

<?php include "./scripts.php"; ?>