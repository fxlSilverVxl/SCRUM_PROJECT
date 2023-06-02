<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/a552314827.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./public/css/login.css">
  <title>Log-in</title>
</head>
<body>
    <form action="./redirect.php" method="POST">
            <h1>Log-in</h1>
            <div class="form-grupo">
                <h2> <i class="fa-solid fa-user" style="margin-left: -27px;"></i> Usuario:</h2>
                
                <div class="form-check" style="margin-left: -41px;">
                    <input class="" type="radio" name="tipo" id="administrador" value="administrador" checked>
                    <label class="form-check-label" for="administrador">
                        Administrador
                    </label>
                </div>
                <div class="form-check" style="margin-left: -81px;">
                    <input class="" type="radio" name="tipo" id="cocina" value="cocina">
                    <label class="form-check-label" for="cocina">
                        Cocinero
                    </label>
                </div>
                <div class="form-check" style="margin-left: -75px;">
                    <input class="" type="radio" name="tipo" id="vendedor" value="vendedor">
                    <label class="form-check-label" for="vendedor">
                        Vendedor
                    </label>
                </div>
            </div>

            <div class="form-grupo">
                <h2> <i class="fa-solid fa-lock"></i>  Contraseña:</h2>
                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
            </div>
            <div>
              <input type="button" value="Pantalla de pedidos listos" class="btn btn-secondary btn-block" onclick="window.location.href = 'pedidosListos.php'">
            </div>

            <input type="button" value="Iniciar sesión" class="btn btn-primary btn-block" id="loginBTN">
        </form>
        
<?php include "./scripts.php"; ?>