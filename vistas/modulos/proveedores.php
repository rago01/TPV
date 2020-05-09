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
          <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
              <tr>
                <th style="width:10px;">#</th>
                <th>PROVEEDOR</th>
                <th>CONTACTO</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>user </td>
                <td>data</td>
                <td>active</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"> <i class="fa fa-pencil"></i> </button>
                    <button class="btn btn-danger"> <i class="fa fa-times"></i> </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="box-footer">
          Footer
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
