

  <!-- =============================================== -->

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
        <form roole="form" method="post" enctype="multipart/form-darta">
        <div class="modal-header" style="background: #3c8dbc; color:white;">
        <button type="button" class="close" data-dilgiss="modal">&times;</button>
          <h4 class="modal-title text-center">Agregar proveedor</h4>
        </div>

        <div class="modal-body ">
          <div class="box-body">
            <div class="form-group col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"> <strong> Nombre ó Razón social</strong> </span>
                <input type="text" class="form-control input-lg" name="nombres" required>
              </div>
            </div>

            <div class="form-group col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Tipo de identificación</strong> </span>
                <select class="form-control input-lg col-3" name="" required>
                  <option value=""></option>
                  <option value="NIT">Nit</option>
                  <option value="CC">Cedula de Ciudadania</option>
                  <option value="CE">Cedula de Extranjeria</option>
                  <option value="TI">Tarjeta de Identidad</option>
                  <option value="CC">Registro Civil</option>
                </select>
              </div>
            </div>
            <div class="form-group col-xs-12">
              <div class="input-group">
                   <span class="input-group-addon"> <strong>Identificación</strong> </span>
                <input type="number" class="form-control input-lg" name="doc" required>
              </div>
            </div>

            <div class="form-group col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Email</strong> </span>
                <input type="email" class="form-control input-lg" name="doc" required>
              </div>
            </div>

            <div class="form-group col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Teléfono </strong> </span>
                <input type="telefono" class="form-control input-lg" name="doc" required>
              </div>
            </div>

            <div class="form-group col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Direccion</strong> </span>
                <input type="text" class="form-control input-lg" name="direccion" required>
              </div>
            </div>

            <div class="form-group col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Sitio web</strong> </span>
                <input type="email" class="form-control input-lg " name="website" required>
              </div>
            </div>

              <div class="form-group col-xs-12">
                <span class="input-group-addon"> <strong>Contacto directo</strong> </span>
              </div>
              <div class="form-group col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon"> <strong>Nombre</strong> </span>
                  <input type="email" class="form-control input-lg " name="nom_contacto" required>
                </div>
              </div>

              <div class="form-group col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon"> <strong>Teléfono</strong> </span>
                  <input type="email" class="form-control input-lg " name="tel_contacto" required>
                </div>
              </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dilgiss="modal">Salir</button>
          <button type="sumbit"  class="btn btn-primary">Agregar proveedor</button>
        </div>

        <?php

        $crearProveedor = new ControladorProveedores();
        $crearProveedor -> ctrCrearProveedor();

        ?>

      </div>
     </form>
    </div>
  </div>
</div>
