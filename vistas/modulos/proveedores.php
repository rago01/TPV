<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
      <h1>
        GESTIÓN DE PROVEEDORES
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddProveedor">
              Agregar proveedor
            </button>
        </div>
        <div class="box-body table">
          <table class="table table-bordered table-striped dt-responsive ">
            <thead>
              <tr>
                <th width="10px">#</th>
                <th>PROVEEDOR</th>
                <th>CONTACTO DIRECTO</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $tabla = "proveedores";
              $item = null;
              $valor = null;

              $proveedores = ModeloProveedores::mdlMostrarProveedores($tabla, $item,$valor);

              foreach ($proveedores as $key => $proveedor) {

                echo '
                <tr>
                    <td>'.$proveedor["id_prov"].'</td>
                    <td >
                      <p>'.$proveedor["nombre"].'</p>
                      <p><strong>'.$proveedor["tipo_doc"].': </strong>'.$proveedor["doc"].'</p>
                      <p>'.$proveedor["email"].'</p>
                      <p>'.$proveedor["telefono"].'</p>
                      <p>'.$proveedor["direccion"].'</p>
                    </td>
                    <td><p>'.$proveedor["contacto"].'</p></td>
                    <td width="200px">
                      <div class="btn-group">
                        <button class="btn btn-warning"> <i class="fa fa-pencil"></i> </button>
                        <button class="btn btn-danger"> <i class="fa fa-times"></i> </button>
                      </div>
                    </td>
                </tr>
                      ';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
  <div class="modal fade" id="AddProveedor" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php include('forms/crear_proveedor.php'); ?>
    </div>
  </div>
</div>
