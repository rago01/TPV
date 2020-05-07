
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
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width:10px;">ID</th>
                <th>IMAGEN</th>
                <th>DESCRIPCION</th>
                <th>CATEGORIA</th>
                <th>STOCK</th>
                <th>PRECIO DE COMPRA</th>
                <th>PRECIO DE VENTA</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <?php

            while ($producto = $consulta->fetch()) {
                echo
                '<tbody>
                    <tr>
                      <td>'.$producto['id_producto'].'</td>
                      <td>
                        <p>'.$producto['nombre_producto'].'</p>
                        <p> <img src="'.$producto['imagen'].'" class="img-responsive"> </p>
                        ';
                  echo'</td>
                      <td>
                        <p>'.$producto['descripcion_producto'].'</p>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning"> <i class="fa fa-pencil"></i> </button>
                          <button class="btn btn-danger"> <i class="fa fa-times"></i> </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>';
          } ?>
          </table>
        </div>
      </div>
    </section>
  </div>

  <?php
// Crear PRODUCTOS
include("forms/crear_producto.php");

   ?>
