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
  <button type="sumbit"  class="btn btn-primary">Agregar usuario</button>
</div>

<?php

$crearUsuario = new ControladorUsuarios();
$crearUsuario -> ctrCrearUsuario();

?>

</div>
</form>
