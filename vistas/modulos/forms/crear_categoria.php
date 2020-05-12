<div class="modal fade" id="AddCategoria" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-darta">
          <div class="modal-header" style="background: #3c8dbc; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar categoria inventario</h4>
          </div>
          <div class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <strong>Nombre categoría</strong> </span>
                  <input type="text" class="form-control input-lg" name="nombre_categoria" required>
                </div>
              </div>
            </div>
          </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                <button type="submit"  class="btn btn-primary">Agregar categoria</button>
              </div>

        <?php

      //  $crearCategoria = new ControladorCategoriasInventario();
      //  $crearCategoria -> ctrCrearCategoriaInventario();

        ?>
      </form>
    </div>
  </div>
</div>
