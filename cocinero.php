<?php
  require_once "./clases/conexion.php";
  require_once "./clases/crud.php";

  session_start();
  $usuario = $_SESSION['username'];
  if($usuario == 'cocina') {}
  else {
    session_destroy();
    header("Location: ./login.php");
    exit();
  }

  
  $crud = new Crud();
  $datosEntrantes = $crud->mostrarPedidosCaja();
  $datosEnCurso = $crud->mostrarPedidosCocina();
?>

<?php include "./header.php";?>
  <div class="container">
    <h1>Pedidos entrantes</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Descripción</th>
          <th>Tomar</th>
          <!-- <th>Listo</th> -->
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($datosEntrantes as $item){
        ?>
          <tr>
            <td><?php echo $item->producto ?></td>
            <td><?php echo $item->descripcion ?></td>
            <!-- <td>
              <form action="./enviarPantallaPedidos.php" method="POST">
                <input type="text" hidden value="<?php echo $item->_id ?>" name="id">
                <button class="btn btn-enviar" name="enviar"><i class="fas fa-paper-plane"></i></button>
              </form>
            </td> -->
            <form action="./procesos/actualizarCocinero.php?accion=tomado" method="POST">
            <input type="text" hidden value="<?php echo $item->_id ?>" name="id">
            <td><button class="btn btn-info"><i class="fas fa-check"></i></button></td>
            </form>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    
    <h1>Pedidos tomados</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Descripción</th>
          <th>Pedido listo</th>
          <th>Entregado</th>
        </tr>
      </thead>


      <tbody>
      <?php
        foreach ($datosEnCurso as $item2) {
            ?>
            <tr>
                <td><?php echo $item2->producto ?></td>
                <td><?php echo $item2->descripcion ?></td>
                <td>
                    <form action="./enviarPantallaPedidos.php" method="POST">
                        <input type="text" hidden value="<?php echo $item2->_id ?>" name="id">
                        <input type="text" hidden value="<?php echo $item2->estado ?>" id="estado">
                        <?php if ($item2->estado === "tomado") { ?>
                            <button id="botonListo" class="btn btn-enviar" name="enviar">Listo <i class="fas fa-paper-plane"></i></button>
                        <?php } ?>
                    </form>
                </td>
                <form action="./ordenRecogida.php" method="POST">
                    <input type="text" hidden value="<?php echo $item2->_id ?>" name="id">
                    <td id="entregado">
                        <?php if ($item2->estado === "listo") { ?>
                            <button id="botonEntregado" class="btn btn-listo">
                                Entregado <i class="fas fa-check"></i>
                            </button>
                        <?php } ?>
                    </td>
                </form>
            </tr>
            <?php
          }
        ?>
        
      </tbody>
    </table>
    
    <div class="alert-container">
      <h3>Alertas</h3>
      <form action="./procesos/insertarMensaje.php" method="POST">
        <div class="d-flex align-items-start">
          <input type="text" class="form-control" id="mensaje" name="mensaje" placeholder="Ingrese la alerta" required>
          <button class="btn btn-enviar-alerta">Enviar</button>
        </div>
      </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body> 
</html>