<div class="modal fade" id="EditProducto" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-darta">
          <div class="modal-header" style="background: #3c8dbc; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar producto</h4>
          </div>
          <div class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <strong>Nombre producto</strong> </span>
                  <input type="text" class="form-control input-lg" name="editar_nombre_producto" id="editar_nombre_producto" required>
                  <input type="hidden" id="id_producto" name="id_producto" value="">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <strong>Descripción</strong> </span>
                  <textarea  class="form-control input-lg" val="" name="editar_descripcion_producto" id="editar_descripcion_producto" rows="2">
                  </textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <strong>Seleccione categoría</strong> </span>
                  <select class="form-control input-lg" name="editar_categoria">
                        <option value=""></option>
                    <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorCategoriasProducto::ctrMostrarCategoriasProducto($item, $valor);
                      //var_dump($categorias);
                      foreach ($categorias as $key => $value) {

                        echo '<option value="'.$value["id_categoria_producto"].'">'.$value["nombre_categoria_producto"].'</option>';
                      }

                  ?>
                  </select>
                </div>
              </div>
                  <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"> <strong>Precio venta</strong> </span>
                        <input type="number" class="form-control input-lg" name="editar_precio_venta" id="editar_precio_venta" value="">
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="panel">SUBIR IMAGEN</div>
                      <input type="file" class="nuevaImagen" name="editarImagen">
                      <p class="help-block">Peso máximo de la imagen 2MB</p>
                      <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                      <input type="hidden" name="imagenActual" value="" id="imagenActual">
                  </div>
          </div>
        </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                <button type="submit"  class="btn btn-primary">Agregar producto</button>
              </div>

              <?php

              $editarProducto = new ControladorProductosVenta();
              $editarProducto -> ctrEditarProductoVenta();

              ?>
      </form>
    </div>
  </div>
</div>
