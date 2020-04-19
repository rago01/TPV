

  <!-- =============================================== -->

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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddUser">
              Agregar usuario
            </button>
        </div>
        <div class="box-body table">
          <table class="table table-bordered table-striped dt-responsive">
            <thead>
              <tr>
                <th style="width:10px;">ID</th>
                <th>PRODUCTO</th>
                <th>DESCRIPCION</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <?php
           $sql="SELECT id_producto,nombre_producto,descripcion_producto,imagen,estado FROM productos_productos";
            $consulta=Conexion::conectar()->prepare($sql);
            $consulta->execute();
            $i = 1;
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
                <input type="text" class="form-control input-lg" name="nombres" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Apellidos</strong> </span>
                <input type="text" class="form-control input-lg" name="apellidos" placeholder="" value="" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Tipo de identificación</strong> </span>
                <select class="form-control input-lg col-3" name="" required>
                  <option value=""></option>
                  <option value="CC">Cedula de Ciudadania</option>
                  <option value="CE">Cedula de Extranjeria</option>
                  <option value="TI">Tarjeta de Identidad</option>
                  <option value="CC">Registro Civil</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Identificación</strong> </span>
                <input type="number" class="form-control input-lg" name="doc" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Dirección</strong> </span>
                <input type="text" class="form-control input-lg" name="doc" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Email</strong> </span>
                <input type="email" class="form-control input-lg" name="doc" required>
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
              <input type="password" class="form-control input-lg" name="clave1" required>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"> <strong>Confirmar clave</strong> </span>
              <input type="password" class="form-control input-lg" name="clave2" required>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="sumbit"  class="btn btn-primary">Agregar producto</button>
        </div>

        <?php

        $crearUsuario = new ControladorUsuarios();
        $crearUsuario -> ctrCrearUsuario();

        ?>

      </div>
     </form>
    </div>
  </div>
</div>
