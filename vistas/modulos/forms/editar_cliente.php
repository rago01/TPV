<div class="modal fade" id="EditCliente" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-darta" onsubmit="return validar()">
          <div class="modal-header" style="background: #3c8dbc; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar cliente</h4>
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
              <span class="input-group-addon"> <strong>Dirección</strong> </span>
              <input type="text" class="form-control input-lg" name="direccion" required>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"> <strong>Celular</strong> </span>
              <input type="text" class="form-control input-lg" name="celular" placeholder="Con este número ingresará al sistema"required>
              <input type="hidden" name="modulo_admin" value="1">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"> <strong>Email</strong> </span>
              <input type="email" class="form-control input-lg" name="email" required>
            </div>
          </div>
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit"  class="btn btn-primary">Registrar</button>
      </div>

        <?php

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrEditarCliente();

        ?>
      </form>
    </div>
  </div>
</div>
