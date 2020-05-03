<div class="modal fade" id="EditUser" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-darta" >
          <div class="modal-header" style="background: #3c8dbc; color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Editar usuario</h4>
          </div>

<div class="modal-body">
      <div class="box-body">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"> <strong> Nombres</strong> </span>
            <input type="text" class="form-control input-lg" id="editNombres" name="newNombres" value="" required>
            <input type="hidden" name="id_user" value="" id="id_user">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"> <strong>Apellidos</strong> </span>
            <input type="text" class="form-control input-lg" id="editApellidos" name="newApellidos" value="" required>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"> <strong>Tipo de identificación</strong> </span>
            <select class="form-control input-lg col-3" name="newT_doc" id="editT_doc" required>
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
            <input type="number" class="form-control input-lg" name="newDoc" id="editDoc" value="" required>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"> <strong>Dirección</strong> </span>
            <input type="text" class="form-control input-lg" name="newDireccion" value="" id="editDireccion" required>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"> <strong>Celular</strong> </span>
            <input type="text" class="form-control input-lg" name="newCelular" value="" id="editCelular" required>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"> <strong>Email</strong> </span>
            <input type="email" class="form-control input-lg" name="newEmail" value="" id="editEmail" required>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"> <strong>Tipo de Usuario</strong> </span>
            <select class="form-control input-lg col-3" name="newPerfil" id="perfil" required>
              <option value="" ></option>
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
          <input type="password" class="form-control input-lg" name="clave1" >
          <input type="hidden" name="passwordActual" id="passwordActual" value="">
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"> <strong>Confirmar clave</strong> </span>
          <input type="password" class="form-control input-lg" name="clave2" >
        </div>
      </div>
    </div>
  </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
      <button type="submit"  class="btn btn-primary">Editar usuario</button>

    </div>

          <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();

          ?>
      </form>
    </div>
  </div>
</div>
