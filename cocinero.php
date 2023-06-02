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
  $datos = $crud->mostrarPedidos();

?>




<?php include "./header.php";?>
    <div class="container">
      <p></p>
      <h1>Pedidos del Cocinero</h1>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Enviar</th>
            <th>Listo</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach($datos as $item){
          ?>
            <tr>
              <td><?php echo $item->_id ?></td>
              <td><?php echo $item->producto ?></td>
              <td><?php echo $item->descripcion ?></td>
              <td>
                <form action="ActualizarCocinero.php" method="POST">
                  <input type="hidden" value="<?php echo $item->_id ?>" name="id">
                  <button type="submit" class="btn btn-enviar" name="enviar"><i class="fas fa-paper-plane"></i></button>
                </form>
              </td>
              <td><button class="btn btn-listo"><i class="fas fa-check"></i></button></td>
            </tr>


          <?php } ?>
        </tbody>
      </table>
      
      <div class="alert-container">
        <h3>Alertas</h3>
        <div class="d-flex align-items-start">
          <textarea class="mr-2" placeholder="Ingrese la alerta"></textarea>
          <button class="btn btn-enviar-alerta">Enviar alerta</button>
        </div>
      </div>
    </div>

  <?php include "./scripts.php"; ?>



