<div class="box">
  <div class="box-header with-border">
    <button type="button" class="btn btn-default pull-right" id="daterange-btn">
      <span>
        <i class="fa fa-calendar"></i>
        <?php
          if(isset($_GET["fechaInicial"])){
            echo $_GET["fechaInicial"]." - ".$_GET["fechaFinal"];
          }else{
            echo 'Rango de fecha';
          }
        ?>
      </span>
      <i class="fa fa-caret-down"></i>
   </button>
  </div>
    <div class="box-body">
     <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
      <thead>
        <tr>
          <th># FACTURA</th>
          <th>CLIENTE</th>
          <th>VENDEDOR</th>
          <th>FECHA Y HORA</th>
          <th>METODO PAGO</th>
          <th>TOTAL</th>
          <th>ACCIONES</th>
        </tr>
      </thead>
      <tbody>
      <?php
      if(isset($_GET["fechaInicial"])){

      $fechaInicial = $_GET["fechaInicial"];
      $fechaFinal = $_GET["fechaFinal"];

    }else{

      $fechaInicial = null;
      $fechaFinal = null;

    }

      $ventas = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);
      var_dump();
      foreach ($ventas as $key => $venta) {

          echo'<tr>
                    <td>'.$venta['id_venta'].'</td>
                    <td>'.$venta['nombres_cliente'].' '.$venta['apellidos_cliente'].'</td>
                    <td>'.$venta['nombres_usuario'].' '.$venta['apellidos_usuario'].'</td>
                    <td> <p>'.$venta['fecha_venta'].'</p><p> '.$venta['hora_venta'].'</p></td>
                    <td>'.$venta['metodo_pago'].'</td>
                    <td>'.$venta['total'].'</td>
                    <td>
                     <div class="btn-group">
                        <button class="btn btn-info btnImprimirFactura" id_venta="'.$venta["id_venta"].'">
                        <i class="fa fa-print"></i></button>
                          <button class="btn btn-warning btnEditarVenta" id_venta="'.$venta["id_venta"].'">
                        <i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btnEliminarVenta" id_venta="'.$venta["id_venta"].'">
                        <i class="fa fa-times"></i></button>
                      </div>
                    </td>
                 </tr>';
      }

        ?>


        </tbody>
      </table>

        <?php

        $eliminarVenta = new ControladorVentas();
        $eliminarVenta -> ctrEliminarVenta();

        ?>
    </div>
  </div>
