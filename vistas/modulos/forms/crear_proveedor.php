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
        <input type="text" class="form-control input-lg" name="nuevoProveedor" required>
      </div>
    </div>

    <div class="form-group col-xs-12">
      <div class="input-group">
        <span class="input-group-addon"> <strong>Tipo de identificación</strong> </span>
        <select class="form-control input-lg col-3" name="tipo_doc" required>
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
        <input type="email" class="form-control input-lg" name="email" required>
      </div>
    </div>

    <div class="form-group col-xs-12">
      <div class="input-group">
        <span class="input-group-addon"> <strong>Teléfono </strong> </span>
        <input type="number" class="form-control input-lg" name="telefono" required>
      </div>
    </div>

    <div class="form-group col-xs-12">
      <div class="input-group">
        <span class="input-group-addon"> <strong>Dirección</strong> </span>
        <input type="text" class="form-control input-lg" name="direccion" required>
      </div>
    </div>

      <div class="form-group col-xs-12">
        <span class="input-group-addon"> <strong>Contacto directo</strong> </span>
      </div>
      <div class="form-group col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"> <strong>Nombre</strong> </span>
          <input type="text" class="form-control input-lg " name="nom_contacto" required>
        </div>
      </div>

      <div class="form-group col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"> <strong>Teléfono</strong> </span>
          <input type="number" class="form-control input-lg " name="tel_contacto" required>
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
