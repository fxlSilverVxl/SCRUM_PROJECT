<?php
require_once "./clases/conexion.php";
require_once "./clases/crud.php";

$crud = new Crud();
$id = $_POST['id'];

$datos = $crud->obtenerDocumento($id);
$idMongo = $datos->_id;
?>

<?php include "./header.php"; ?>

<div class="container">
<div class="row">
  <div class="col">
    <div class="card mt-4">
      <div class="card-body">
        <a href="./cocinero.php" class="btn btn-outline-info">
          <i class="fa-solid fa-arrow-rotate-left"></i> Regresar
        </a>
        <h2>Pedido recogido</h2>
        <form action="./procesos/actualizarCocinero.php?accion=recogido" method="post">
          <input type="text" hidden value="<?php echo $idMongo ?>" name="id">
          <label for="Producto">Producto</label>
          <input type="text" class="form-control" id="producto" name="producto" value="<?php echo $datos->producto ?>" readonly>
          <label for="descripcion">Descripcion </label>
          <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $datos->descripcion ?>" readonly>
          <button class="btn btn-primary mt-3">
            <i class="fas fa-check"></i> Recogido 
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>





<?php include "./scripts.php"; ?>