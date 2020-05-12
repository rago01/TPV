
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
      <h1>
        GESTIÓN DE PRODUCTOS
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddProducto">
              Agregar producto
            </button>
        </div>
        <div class="box-body table">
          <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
            <thead>
              <tr>
                <th style="width:10px;">ID</th>
                <th>NOMBRE PRODUCTO</th>
                <th style="width:250px;">DESCRIPCION</th>
                <th>IMAGEN</th>
                <th>CATEGORIA</th>
                <th>VENDIDOS</th>
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
                      <td>'.$producto['id_producto'].'</td>
                      <td><p>'.$producto['nombre_producto'].'</p></td>
                      <td><p>'.$producto['descripcion_producto'].'</p> </td>
                      <td><p> <img src="'.$producto['imagen'].'" class="img-responsive"> </p>';
                 echo'</td>
                      <td><p>'.$producto['categoria'].'</p></td>
                      <td><p>'.$producto['ventas'].'</p></td>
                      <td><p> $'.$producto['precio_venta'].'</p></td>
                      <td>
                        <div class="btn-group">
                          <div class="btn-group">
                          <button class="btn btn-warning btnEditarProducto" id_producto="'.$producto['id_producto'].'"
                          data-toggle="modal" data-target="#EditProducto">
                          <i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btnEliminarProducto" id_producto="'.$producto['id_producto'].'">
                          <i class="fa fa-times"></i> </button>
                        </div>
                      </td>
                    </tr>
                  ';
          } ?>
        </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

  <?php
// Crear PRODUCTOS
  include("forms/crear_producto.php");
  include("forms/editar_producto.php");

  $borrarProducto = new ControladorProductosVenta();
  $borrarProducto -> ctrBorrarCategoria();
   ?>
