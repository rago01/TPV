
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <a href="crear_venta"><button type="button" class="btn btn-primary">
            Agregar venta
          </button></a>
        </div>
        <!--<div class="col-lg-12 col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <p class="text-center h3"> CATEGORIAS DE NUESTROS PRODUCTOS</p>
            </div>
            <?php
            $item = null;
            $valor = null;
            $categorias = ControladorCategoriasProducto::ctrMostrarCategoriasProducto($item, $valor);
            //var_dump($categorias);
            //var_dump($categorias);
            ?>

            <div class="box-body">
              <div class="row">
                <div class="col-xs-12 col-lg-4 alert alert-danger">

                </div>
                <div class="col-xs-12 col-lg-4 alert alert-danger">

                </div>
                <div class="col-xs-12 col-lg-4 alert alert-danger">

                </div>
                <div class="col-xs-12 col-lg-4 alert alert-danger">

                </div>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </section>
  </div>

  <?php
// Crear PRODUCTOS
 $verCategoria = new ControladorCategoriasProducto();
 $verCategoria -> ctrMostrarCategoriasProducto();
   ?>
