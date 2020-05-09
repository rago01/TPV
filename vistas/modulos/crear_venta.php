
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
      <h1>
        GESTIÓN DE VENTAS
      </h1>
    </section>

    <section class="content">
      <div class="row">
        <!-- Formulario__________________________________________-->
        <div class="col-lg-5 col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border"></div>
                <form class="formularioVenta"  method="post">
                  <div class="box-body">
                    <div class="box">
                    <!-- ENTRADA PARA EL CAJERO-->
                      <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                            <input type="text" class="form-control" name="cajero" id="cajero" value="<?php echo $_SESSION['nombres'].' '.$_SESSION['apellidos'] ?>" readonly>
                            <input type="hidden" name="responsable_venta" value="<?php echo $_SESSION['id_user'] ?>">
                        </div>
                      </div>
                      <!--CODIGO VENTA-->
                      <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-key"></i> </span>

                            <?php
                            $item = null;
                            $valor = null;
                            $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                            if (!$ventas) {
                              echo '<input type="text" class="form-control" name="venta" id="venta" value="10001" readonly>';
                            }else {
                              foreach ($ventas as $key => $value) {
                                // code...
                              }

                              $codigo = $value['id_venta'] + 1;

                              echo '<input type="text" class="form-control" name="venta" id="venta" value="'.$codigo.'" readonly>';
                            }

                            ?>

                        </div>
                      </div>
                      <!--entrada cliente-->
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-users"></i></span>
                          <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>
                              <option value="">Seleccionar cliente</option>

                                  <?php
                                    //  $item = null;
                                      $valor = null;
                                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);
                                       foreach ($categorias as $key => $value) {
                                         echo '<option value="'.$value["id_user"].'">'.$value["nombres"].'</option>';
                                       }

                                  ?>
                           </select>
                          <span class="input-group-addon">
                            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#AddUser" data-dismiss="modal">
                              Agregar cliente
                            </button>
                          </span>
                        </div>
                      </div>
                      <!--entrada productos-->
                      <div class="form-group row nuevoProducto">

                      </div>
                      <input type="hidden" id="listaProductos" name="listaProductos">
                      <!--=====================================
                      BOTÓN PARA AGREGAR PRODUCTO
                      ======================================-->
                      <button type="button" class="btn btn-default hidden-lg btnAgregarProducto">Agregar producto</button>
                      <hr>
                      <!--=====================================
                      TOTOAL
                      ======================================-->
                      <div class="row">
                          <div class="col-xs-12 pull-right">
                            <table class="table">
                                <thead >
                                  <tr>
                                    <th>TOTAL</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                        <div class="input-group">
                                          <span class="input-group-addon"> <i class="ion ion-social-usd"></i> </span>
                                            <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="0000" readonly>
                                            <input type="hidden" name="totalVenta" id="totalVenta">

                                        </div>
                                    </td>
                                  </tr>
                                </tbody>
                            </table>
                          </div>
                      </div>
                      <hr>
                      <!--=====================================
                      METODO PAGO
                      ======================================-->


                      <div class="form-group row">
                        <div class="col-xs-6" style="padding-right:0px">
                          <div class="input-group">
                            <select class="form-control"  id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                              <option value="">Metodo de pago</option>
                              <option value="EFECTIVO">Efectivo</option>
                              <option value="TB">Tarjeta Debito</option>
                              <option value="NEQUI">Nequi</option>
                              <option value="DP">Daviplata</option>
                            </select>
                          </div>
                        </div>
                        <div class="cajasMetodoPago"></div>

                        <input type="hidden" name="listaMetodoPago" id="listaMetodoPago" value="">

                      </div>
                        <br>
                    </div>
                </form>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" >Guardar cambios</button>
            </div>
          </div>
        </div>
        <!-- Tabla de productos _________________-->
        <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
          <div class="box box-warning">
              <div class="box-header with-border">

              </div>
              <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaVentas">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>NOMBRE PRODUCTO</th>
                      <th>DESCRIPCION</th>
                      <th>IMAGEN</th>
                      <th>PRECIO VENTA</th>
                      <th>ACCIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                  $item = null;
                  $valor = null;

                  $productos = ControladorProductosVenta::ctrMostrarProductoVenta($item, $valor);
                  //var_dump($productos);
                foreach($productos as $key => $producto) {
                      echo
                      '<tr class="text-uppercase">
                            <td>'.$producto['id_producto'].'</td>
                            <td><p>'.$producto['nombre_producto'].'</p></td>
                            <td><p>'.$producto['descripcion_producto'].'</p> </td>
                            <td><p> <img src="'.$producto['imagen'].'" class="img-responsive"> </p>';
                       echo'</td>
                            <td><p> $'.$producto['precio_venta'].'</p></td>
                            <td>
                              <div class="btn-group">
                                <button type="button" class="btn btn-primary agregarProducto recuperarBoton" id_producto="'.$producto['id_producto'].'">Agregar</button>
                              </div>
                            </td>
                          </tr>
                        ';
                } ?>
              </tbody>
                </table>
              </div>
          </div>
        </div>

      </div>
    </section>
  </div>
<?php
include("forms/crear_usuario.php")

?>
