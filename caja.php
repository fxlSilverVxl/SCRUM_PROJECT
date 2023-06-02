<?php
  require_once "./clases/conexion.php";
  require_once "./clases/crud.php";
  $crud = new Crud();
  $datos = $crud->mostrarPedidos();
  $mensajes = $crud->mostrarMensajes();

?>

<?php include "./header.php";?>
    <div class="container my-4">
        <div class="row">
            <div class="col-sm-7 col-md-8 col-lg-8 col-xl-8 text-center">
                <h2 class="h2pedidos">Pedidos  Enviados</h2>
                <div class="scrollable">
                    <table class="table table-bordered table-striped ">
                        <thead class="headtabla">
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($datos as $item) {
                            ?>
                                <tr>
                                    <td> <?php echo $item->producto?> </td>
                                    <td> <?php echo $item->precio?> </td>
                                    <td> <?php echo $item->descripcion?> </td>
                                    <th> <?php echo $item->fecha?></th>
                                    <th>
                                        <button type="button" 
                                          class="btn btn-secondary btneditar" 
                                          data-bs-toggle="modal" 
                                          data-bs-target="#EditModal" 
                                          data-pedido-id="<?php echo $item->_id?>"
                                          data-pedido-producto="<?php echo $item->producto?>"
                                          data-pedido-precio="<?php echo $item->precio?>"
                                          data-pedido-desc="<?php echo $item->descripcion?>"
                                        >
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </th>
                                    <th>
                                        <button type="button" class="btn btn-danger btnborrarpedido" data-bs-toggle="modal" data-bs-target="#AdvertenciaModal" data-pedido-id="<?php echo $item->_id?>">
                                          <i class="fa-sharp fa-solid fa-trash"></i>
                                        </button>
                                    </th>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                <button type="button" class="btn btnnuevopedido" data-bs-toggle="modal" data-bs-target="#miModal">Nuevo Pedido</button>
                <p></p>
                <h4>Buzón de mensajes</h4>
                <div class="scrollable">
                    <table class="table table-bordered table-hover">
                        <thead class="headtabla">
                            <tr>
                                <th>Mensaje</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($mensajes as $msj){?>
                            <tr>
                                <td> <?php echo $msj->mensaje?> </td>
                                <td>
                                  <button type="button" class="btn btn-danger btneliminarmensaje" data-bs-toggle="modal" data-bs-target="#AdveMensModal" data-mensaje-id="<?php echo $msj->_id?>">
                                    <input type="text" hidden value="<?php echo $msj->_id?>">
                                    <i class="fa-sharp fa-solid fa-trash"></i>
                                  </button>
                                </td>
                            </tr>
                          <?php }?>  
                        </tbody>
                    </table>
                </div>
            </div> 

            <div class="modal fade" id="miModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalTitle">Nueva orden Lunch-Line</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" arial-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="./procesos/insertarPedido.php" method="post">
                                <div class="form-group">
                                    <label for="producto">Producto</label>
                                    <input type="text" class="form-control" id="producto" name="producto" aria-describedby="emailHelp" placeholder="Inserta el producto a comprar" required>
                                  </div>
                                  <div class="form-group">
                                    <label class="label" for="precio">Precio</label>
                                    <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio a pagar" required>
                                  </div>
                                  <div class="form-group">
                                    <label class="label" for="descripcion">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Detalles del producto">
                                  </div>
                                  <button type="submit" class="btn btn-primary btn-ordenar">Ordenar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="EditModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title2" id="modalTitle">Modificar Pedido</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" arial-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="./procesos/actualizarPedido.php" method="post">
                                <div class="form-group">
                                    <label for="producto">Producto</label>
                                    <input type="text" class="form-control" id="producto" name="producto" aria-describedby="emailHelp" required>
                                  </div>
                                  <div class="form-group">
                                    <label class="label" for="precio">Precio</label>
                                    <input type="text" class="form-control" id="precio" name="precio" required>
                                  </div>
                                  <div class="form-group">
                                    <label class="label" for="descripcion">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion">
                                  </div>
                                  <input type="text" value="" hidden name="itemID" id="itemID">
                                  <button type="submit" class="btn btn-primary btnlisto">¡Listo!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="AdvertenciaModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered text-center">
                    <div class="modal-content">
                        <div class="modal-header modaladvertencia">
                            <h3 class="modal-title title-adv" id="modalTitle">¡Advertencia!</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" arial-label="Close"></button>
                        </div>
                        <form action="./procesos/eliminarPedido.php" method="post">
                          <div class="contenidoadv">
                              <h5> El pedido será eliminado</h5>
                              <h5> ¿Desea continuar?</h5>
                          </div>
                          <div class="modal-body">
                              <input type="text" value="" hidden name="itemID">
                              <button type="submit" class="btn btn-primary btneliminar">Eliminar</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="AdveMensModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered text-center">
                    <div class="modal-content">
                        <div class="modal-header modaladvertencia">
                            <h3 class="modal-title title-adv" id="modalTitle">¡Advertencia!</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" arial-label="Close"></button>
                        </div>
                        <form action="./procesos/eliminarMensaje.php" method="post">
                          <div class="contenidoadv">
                              <h5> El mensaje será eliminado </h5>
                              <h5> ¿Desea continuar?</h5>
                          </div>
                          <div class="modal-body">
                              <input type="text" value="" hidden name="msjID">
                              <button type="submit" class="btn btn-primary btneliminar">Eliminar</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const eliminarPedidoButton = document.querySelectorAll('.btnborrarpedido');

        eliminarPedidoButton.forEach(function(button) {
          button.addEventListener('click', function() {
            const pedidoID = this.getAttribute('data-pedido-id');

            const itemIDInput = document.querySelector('#AdvertenciaModal input[type="text"]');
            itemIDInput.value = pedidoID;
          });
        });
      });

      document.addEventListener('DOMContentLoaded', function() {
        const editarPedidoButton = document.querySelectorAll('.btneditar');

        editarPedidoButton.forEach(function(button) {
          button.addEventListener('click', function() {
            const pedidoID = this.getAttribute('data-pedido-id');
            const Producto = this.getAttribute('data-pedido-producto');
            const Precio = this.getAttribute('data-pedido-precio');
            const Desc = this.getAttribute('data-pedido-desc');

            const itemIDInput = document.querySelector('#EditModal input[name="itemID"');
            const itemProducto = document.querySelector('#EditModal input[name="producto"]');
            const itemPrecio = document.querySelector('#EditModal input[name="precio"]');
            const itemDesc = document.querySelector('#EditModal input[name="descripcion"]');
            
            itemIDInput.value = pedidoID;
            itemProducto.value = Producto;
            itemPrecio.value = Precio;
            itemDesc.value = Desc;
          });
        });
      });

      document.addEventListener('DOMContentLoaded', function() {
        const eliminarMensajeBtn = document.querySelectorAll('.btneliminarmensaje');

        eliminarMensajeBtn.forEach(function(button) {
          button.addEventListener('click', function() {
            const msjID = this.getAttribute('data-mensaje-id');

            const msjIDInput = document.querySelector('#AdveMensModal input[name="msjID"]');
            msjIDInput.value = msjID;
          });
        });
      });
    </script>


<?php include "./scripts.php"; ?>