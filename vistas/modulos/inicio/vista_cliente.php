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
                //var_dump($_SESSION);
                ?>
              <!-- ENTRADA PARA EL CAJERO-->
                <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon"> <i class="fa fa-user"></i> Cliente: </span>
                      <input type="text" class="form-control" name="cliente" id="cliente" value="<?php echo $_SESSION['nombres'].' '.$_SESSION['apellidos'] ?>" readonly>
                      <input type="hidden" name="responsable_orden" value="<?php echo $_SESSION['id_cliente'] ?>">
                  </div>
                </div>
                <!--CODIGO VENTA-->
                <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon"> <i class="fa fa-exclamation"></i> Orden #: </span>
                      <?php

                      $item = null;
                      $valor =  null;

                      $ventas = ControladorOrdenes::ctrMostrarOrdenes($item, $valor);
                      //var_dump($ventas);
                      if (!$ventas) {
                        echo '<input type="text" class="form-control" name="nuevaVenta" id="nuevaVenta" value="1" readonly>';
                      }else {
                        foreach ($ventas as $key => $value) {
                          //var_dump($ventas);
                        }

                        $codigo = $value['id_venta'] + 1;

                        echo '<input type="text" class="form-control" name="nuevaVenta" id="nuevaVenta" value="'.$codigo.'" readonly>';
                      }

                      ?>

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
                                      <input type="text" class="form-control input-lg" id="nuevoTotalVenta" total=""  name="nuevoTotalVenta" placeholder="0000" readonly>
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
                  <div class="col-xs-5" style="padding-right:0px">
                    <div class="input-group">
                      <label>Información para entrega</label>
                      <select name="infoMetodoEntrega" id="nuevoMetodoEntrega" class="form-control">
                          <option value="1">Pagar en la caja</option>
                          <option value="2">Entrega en mi domicilio</option>
                          <option value="3">Entrega en otro domicilio</option>
                      </select>
                    </div>
                  </div>
                  <div class="cajasMetodoEntrega">

                  </div>

                  <input type="hidden" name="listaMetodoEntrega" id="listaMetodoEntrega" value="">

                </div>
                  <br>
              </div>
      </div>
      <div class="box-footer">
          <button type="submit" class="btn btn-primary pull-right" >Guardar venta</button>
      </div>
    </form>
    <?php
         $guardarOrden = new ControladorOrdenes();
         $guardarOrden -> ctrCrearOrden();
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
                <th>PRODUCTO</th>
                <th>PRECIO VENTA</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody>
            <?php

            $item = null;
            $valor = null;
            $orden = "id_producto";
            $productos = ControladorProductosVenta::ctrMostrarProductoVenta($item, $valor, $orden);
            //var_dump($productos);
          foreach($productos as $key => $producto) {
                echo
                '<tr class="text-uppercase">
                      <td style="width:250px"><p><strong>'.$producto['nombre_producto'].'</strong></p><p>'.$producto['descripcion_producto'].'</p>
                      <p> <img style="width:100px" src="'.$producto['imagen'].'" class="img-responsive"> </p></td>

                      <td><p> $'.$producto['precio_venta'].'</p></td>
                      <td style="width:200px">
                        <div class="btn-group text-center">
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
