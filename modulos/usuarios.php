

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
      <h1>
        ADMINISTRAR USUARIOS
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddUser">
              Agregar usuario
            </button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped tablas">
            <thead>
              <tr>
                <th>#</th>
                <th>USUARIO</th>
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
  <div class="modal fade" id="AddUser" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form roole="form" method="post" enctype="multipart/form-darta">
        <div class="modal-header" style="background: #3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar usuarios</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"> <strong> Nombres</strong> </span>
                <input type="text" class="form-control input-lg" name="nombre" value="">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Apellidos</strong> </span>
                <input type="text" class="form-control input-lg" name="nombre" placeholder="" value="">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Tipo de documento</strong> </span>
                <select class="form-control input-lg col-3" name="" required>
                  <option value=""></option>
                  <option value="CC">CC</option>
                  <option value="CE">CE</option>
                  <option value="TI">TI</option>
                  <option value="CC">RC</option>
                </select>

                <span class="input-group-addon"> <strong>Identificación</strong> </span>
                <input type="number" class="form-control input-lg" name="" value="">
              </div>
            </div>


            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Tipo de Usuario</strong> </span>
                <select class="form-control input-lg col-3" name="" required>
                  <option value=""></option>
                  <?php
                  $sql="SELECT id_perfil, nombre_perfil FROM perfiles";
                  $consulta=Conexion::conectar()->prepare($sql);
                  $consulta->execute();
                  while ($perfil = $consulta->fetch()) {
                    echo'  <option value="'.$perfil['id_perfil'].'">'.$perfil['nombre_perfil'].'</option>';
                  }
                  ?>
                </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"> <strong>Clave</strong> </span>
              <input type="password" class="form-control input-lg" name="clave1" placeholder="" value="">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"> <strong>Confirmar clave</strong> </span>
              <input type="password" class="form-control input-lg" name="clave2" placeholder="" value="">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="sumbit"  class="btn btn-primary">Agregar usuario</button>
        </div>

      </div>
     </form>
    </div>
  </div>
</div>
