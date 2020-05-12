
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
        <div class="col-lg-6 col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border"></div>
                <form class="formularioVenta"  method="post">
                  <div class="box-body">
                    <div class="box">
                      <?php
                      $item = "id_venta";
                      $valor = $_GET['id_venta'];

                      $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                       $idCajero = "id_user";
                       $cajero = $ventas['resp_venta'];

                      $cajeros = ControladorUsuarios::ctrMostrarUsuarios($idCajero,$cajero);

                      $idCliente = "id_cliente";
                      $cliente = $ventas["id_cliente"];

                      $clientes = ControladorClientes::ctrMostrarClientes($idCliente, $cliente);


                      //var_dump($consulta);
                      ?>
                    <!-- ENTRADA PARA EL CAJERO-->
                      <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                            <input type="text" class="form-control" name="cajero" id="cajero" value="<?php echo $cajeros["nombres"].' '.$cajeros["apellidos"]?>" readonly>
                            <input type="hidden" name="responsable_venta" value="<?php echo $cajeros['id_user'] ?>">
                        </div>
                      </div>
                      <!--CODIGO VENTA-->
                      <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-key"></i> </span>
                            <input type="text" class="form-control" name="editarVenta" id="nuevaVenta" value="<?php echo $ventas["id_venta"] ?>" readonly>
                        </div>
                      </div>
                      <!--entrada cliente-->
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-users"></i></span>
                          <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>
                              <option value="<?php echo $clientes['id_cliente'] ?>"><?php echo $clientes["nombres"].' '.$clientes["apellidos"]; ?></option>

                                  <?php
                                      $item = null;
                                      $valor = null;
                                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);
                                       foreach ($categorias as $key => $value) {
                                         echo '<option value="'.$value["id_cliente"].'">'.$value["nombres"].' '.$value["apellidos"].'</option>';
                                       }

                                  ?>
                           </select>
                          <span class="input-group-addon">
                            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#AddCliente" data-dismiss="modal">
                              Agregar cliente
                            </button>
                          </span>
                        </div>
                      </div>
                      <!--entrada productos-->
                      <div class="form-group row nuevoProducto">
                        <?php

                        $listaProducto = json_decode($ventas["productos"], true);
                        foreach($listaProducto as $key => $productos_venta) {
                        //  echo $productos_venta;
                          $item = "id_producto";
                          $valor = $productos_venta["id_producto"];
                        $orden = "ventas";
                        $respuesta = ControladorProductosVenta::ctrMostrarProductoVenta($item, $valor, $orden);

                   echo '<div class="row" style="padding:5px 15px">
                             <div class="col-xs-6" style="padding-right:0px">
                               <div class="input-group">
                                 <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" id_producto="'.$productos_venta['id_producto'].'"><i class="fa fa-times"></i></button></span>
                                 <input type="text" class="form-control nuevaDescripcionProducto" id_producto="'.$productos_venta['id_producto'].'" name="agregarProducto" value="'.$productos_venta['descripcion_producto'].'" readonly required>
                               </div>
                             </div>

                         <div class="col-xs-3">
                           <input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="'.$productos_venta['cantidad'].'" required>
                         </div>

                         <div class="col-xs-3 ingresoPrecio" style="padding-left:0px">
                           <div class="input-group">
                             <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                             <input type="text" class="form-control nuevoPrecioProducto" precioReal="'.$respuesta['precio_venta'].'" name="nuevoPrecioProducto" value="'.$productos_venta['total'].'" readonly required>
                           </div>
                         </div>
                       </div>';
                        }
                         ?>
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
                                            <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" value="<?php echo $ventas["total"] ?>" readonly>
                                            <input type="hidden" name="totalVenta" id="totalVenta" value="<?php echo $ventas["total"] ?>">

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
                              <option value="TD">Tarjeta Debito</option>
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
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" >Guardar venta</button>
            </div>
          </form>
          <?php

         $editarVenta = new ControladorVentas();
         $editarVenta -> ctrEditarVenta();

        ?>
          </div>
        </div>
        <!-- Tabla de productos _________________-->
        <div class="col-lg-6 hidden-md hidden-sm hidden-xs">
          <div class="box box-warning">
              <div class="box-header with-border">

              </div>
              <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaVentas">
                  <thead>
                    <tr>
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
include("forms/crear_cliente.php");

?>
