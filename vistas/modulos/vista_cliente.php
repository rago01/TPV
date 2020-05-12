<?php
$tabla = "categorias_productos";
$item = null;
$valor = null;

echo '<div class="row">
          <div class="col-md-12">
            <div class="box box-solid">';
    $categorias = ModeloCategoriasProducto::mdlMostrarCategoriasProducto($tabla, $item, $valor);
foreach ($categorias as $key => $value) {
echo  '<div class="box-body col-xs-12 col-md-6 col-lg-4">
                <div class="box-group" id="accordion">
                  <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                  <div class="panel box box-warning">
                    <div class="box-header with-border">
                      <h4 class="box-title text-center">
                        <a data-toggle="collapse" data-parent="#accordion" class="text-dark" href="#_'.$value['id_categoria_producto'].'">
                            '.$value['nombre_categoria_producto'].'
                        </a>
                      </h4>
                    </div>';
                    $campo = "id_categoria";
                    $id_categoria = $value['id_categoria_producto'];

                    $productos = ControladorProductosVenta::ctrMostrarProductoVenta($campo, $id_categoria);
                      //echo $producto['id_categoria'];
                      echo'<div id="_'.$productos['id_categoria'].'" class="panel-collapse collapse i">
                                <div class="box-body">
                                    <label></label>
                                </div>
                              </div>
                            </div>
                </div>
            </div>';
}





?>
