

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
      <h1>
        GESTIÓN DE CATEGORÍAS PRODUCTOS
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddCategoria">
              Agregar categoría
            </button>
        </div>
        <div class="box-body table">
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width:10px;">ID</th>
                <th>CATEGORÍA</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody>
            <?php
          $item = null;
          $valor = null;
          $categorias = ControladorCategoriasProducto::ctrMostrarCategoriasProducto($item, $valor);
          //var_dump($categorias);
          //echo "ok";
          $i = 1;
          foreach($categorias as $key => $categoria) {
                echo'
                    <tr>
                      <td>'.$categoria['id_categoria_producto'].'</td>
                      <td>
                        <p>'.$categoria['nombre_categoria_producto'].'</p>
                        ';
                  echo'</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarCategoria" id_categoria_inventario="'.$categoria['id_categoria_inventario'].'"
                          data-toggle="modal" data-target="#editarCategoria"> <i class="fa fa-pencil"></i> </button>
                          <button class="btn btn-danger btnEliminarCategoria" id_categoria_inventario="'.$categoria['id_categoria_inventario'].'"
                          > <i class="fa fa-times"></i> </button>
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
  // Agregar Categoria
 include("forms/crear_categoria.php");
     // Agregar Categoria
 include("forms/editar_categoria.php");

  $borrarCategoria = new ControladorCategoriasProducto();
  $borrarCategoria -> ctrBorrarCategoriaProducto();

  ?>
