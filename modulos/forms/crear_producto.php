<div class="modal fade" id="AddProducto" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-darta">
          <div class="modal-header" style="background: #3c8dbc; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar producto</h4>
          </div>
          <div class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <strong>Nombre producto</strong> </span>
                  <input type="text" class="form-control input-lg" name="producto" required>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <strong>Descripción</strong> </span>
                  <textarea  class="form-control input-lg" name="descripcion_producto" rows="2" cols=""></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <strong>Seleccione categoría</strong> </span>
                  <select class="form-control input-lg" name="categoria">
                      <option value=""></option>
                  </select>
                </div>
              </div>
          <!--<div class="form-group">
                 <div class="input-group">
                  <span class="input-group-addon"> <strong>Stock</strong> </span>
                  <input type="number" class="form-control input-lg" name="stock" value="">
                </div>
              <div class="form-group row">
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"> <strong>Precio compra</strong> </span>
                    <input type="number" class="form-control input-lg" name="precio_compra" value="">
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"> <strong>Precio venta</strong> </span>
                    <input type="number" class="form-control input-lg" name="precio_venta" value="">
                  </div>

                  <br>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="">
                          <input type="checkbox" name="" class="minimal porcentaje" value="">
                          Utilizar porcentaje
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-6" style="padding:0">
                    <div class="input-group">
                        <input type="number" name="" class="form-control input-lg nuevoPorcentaje" min="0" value="40">
                        <span class="input-group-addon"> <i class="fa fa-percent"></i> </span>
                    </div>
                  </div>
                </div>
              </div>-->
                  <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"> <strong>Precio venta</strong> </span>
                        <input type="number" class="form-control input-lg" name="stock" value="">
                      </div>
                  </div>
          </div>
        </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                <button type="submit"  class="btn btn-primary">Agregar categoria</button>
              </div>

        <?php

        $crearCategoria = new ControladorCategoriasInventario();
        $crearCategoria -> ctrCrearCategoriaInventario();

        ?>
      </form>
    </div>
  </div>
</div>
