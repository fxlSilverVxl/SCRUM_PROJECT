<?php
  require_once "./clases/conexion.php";
  require_once "./clases/crud.php";
  $crud = new Crud();
  $datos = $crud->mostrarPedidos();
?>

<?php include "./header.php";?>
    <div class="container my-4">
        <div class="row">
            <div class="col-sm-7 col-md-8 col-lg-8 col-xl-8 text-center">
                <h2>Pedidos  Enviados</h2>
                <div class="scrollable">
                    <table class="table table-bordered table-striped">
                        <thead>
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
                        <?php //print_r($datos);
                        ?>
                        <?php
                            foreach($datos as $item) {
                        ?>
                            <tr>
                                <td> <?php echo $item->producto?> </td>
                                <td> <?php echo $item->precio?> </td>
                                <td> <?php echo $item->descripcion?> </td>
                                <th> <?php echo $item->fecha?></th>
                                <th>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditModal" style="background-color: #403e3d; margin-top: 10px; border-color: #403e3d">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>
                                </th>
                                <th style="width: 111px">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target='#AdvertenciaModal' style="background-color: #ff0202; margin-top: 10px; border-color: #ff0202">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </button>
                                </th>
                            </tr>
                        <?php }?>
                      </tbody>
                    </table>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4" style="padding-left: 230px;" >
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal" style="background-color: #DD540A; width: 350px; margin-top: 10px; margin-left: -215px; border-color: #DD540A">Nuevo Pedido</button>
                <h6>Buzón de mensaje</h6>
                <div class="scrollable">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> Ya no hay coca </td>
                                <td>
                                    <button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#AdveMensModal" style="background-color: #ff0202; margin-top: 10px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 

            <div class="modal fade" id="miModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle" style="padding-left: 120px">Nueva orden Lunch-Line</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" arial-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="./procesos/insertar.php" method="post">
                                <div class="form-group">
                                    <label for="producto">Producto</label>
                                    <input type="text" class="form-control" id="producto" name="producto" aria-describedby="emailHelp" placeholder="Inserta el producto a comprar" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio a pagar" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Detalles del producto">
                                  </div>
                                  <button type="submit" class="btn btn-primary" style="background-color: #4f7115; margin-left: 380px; margin-top: 20px;">Ordenar</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="EditModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle" style="padding-left: 150px">Modificar Pedido</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" arial-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="./procesos/insertar.php" method="post">
                                <div class="form-group">
                                    <label for="producto">Producto</label>
                                    <input type="text" class="form-control" id="producto" name="producto" aria-describedby="emailHelp" placeholder="Inserta el producto a comprar" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="precio" style="margin-top:10px">Precio</label>
                                    <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio a pagar" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="descripcion" style="margin-top:10px">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Detalles del producto">
                                  </div>
                                  <button type="submit" class="btn btn-primary" style="background-color: #4f7115; margin-left: 380px; margin-top: 20px; width:83px; border-color:#4f7115">¡Listo!</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="AdvertenciaModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered text-center">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: red">
                            <h3 class="modal-title" id="modalTitle" style="color: white; padding-left: 145px">¡Advertencia!</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" arial-label="Close"></button>
                        </div>
                        <div style="margin-top: 25px">
                            <h5> El pedido será eliminado</h5>
                            <h5> ¿Desea Continuar?</h5>
                        </div>
                        <div class="modal-body">
                            <button type="submit" class="btn btn-primary" style="background-color: #4f7115; margin-left: 0px; margin-top: 10px; width:83px; border-color: #4f7115">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="AdveMensModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered text-center">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: red">
                            <h3 class="modal-title" id="modalTitle" style="color: white; padding-left: 145px">¡Advertencia!</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" arial-label="Close"></button>
                        </div>
                        <div style="margin-top: 25px">
                            <h5> El mensaje será eliminado </h5>
                            <h5> ¿Desea Continuar?</h5>
                        </div>
                        <div class="modal-body">
                            <button type="submit" class="btn btn-primary" style="background-color: #4f7115; margin-left: 0px; margin-top: 10px; width:83px; border-color: #4f7115">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php include "./scripts.php"; ?>