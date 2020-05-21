
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header text-center">
            <h1>
               MIS PEDIDOS
            </h1>
    </section>
    <section class="content">
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
                <th>ORDEN #</th>
                <th>CLIENTE</th>
                <th>FECHA Y HORA<br>DEL PEDIDO</th>
                <th>TOTAL PEDIDO</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody class="text-uppercase text-info">
            <?php
            if(isset($_GET["fechaInicial"])){

            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];

          }else{

            $fechaInicial = null;
            $fechaFinal = null;

          }
            $cliente = $_SESSION['id_cliente'];
            $sql_ordenes="SELECT v.id_venta,c.nombres nombres_cliente,c.apellidos apellidos_cliente,v.hora_venta,v.fecha_venta,v.productos,v.total
                          FROM ventas v INNER JOIN clientes c on c.id_cliente=v.id_cliente
                          WHERE v.id_cliente = '$cliente' AND resp_venta in (0) AND metodo_pago ='PENDIENTE' AND estado_venta = '2'";
                          $consulta_orden=Conexion::conectar()->prepare($sql_ordenes);
                          $consulta_orden->execute();
                          echo $sql_ordenes;
                          foreach ($consulta_orden as $key => $value) {

                          $productos = json_decode($value['productos'], true);

                              echo'<tr>
                                        <td>'.$value['id_venta'].'</td>
                                        <td width="200px">'.$value['nombres_cliente'].' '.$value['apellidos_cliente'].'</td>
                                        <td> <p>'.$value['fecha_venta'].'</p><p> '.$value['hora_venta'].'</p></td>
                                        <td>'.$value['total'].'</td>
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

            // $ventas = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);
            // var_dump();
            // foreach ($ventas as $key => $venta) {
            //
            //     echo'<tr>
            //               <td>'.$venta['id_venta'].'</td>
            //               <td>'.$venta['nombres_cliente'].' '.$venta['apellidos_cliente'].'</td>
            //               <td>'.$venta['nombres_usuario'].' '.$venta['apellidos_usuario'].'</td>
            //               <td> <p>'.$venta['fecha_venta'].'</p><p> '.$venta['hora_venta'].'</p></td>
            //               <td>'.$venta['metodo_pago'].'</td>
            //               <td>'.$venta['total'].'</td>
            //               <td>
            //                <div class="btn-group">
            //                   <button class="btn btn-info btnImprimirFactura" id_venta="'.$venta["id_venta"].'">
            //                   <i class="fa fa-print"></i></button>
            //                     <button class="btn btn-warning btnEditarVenta" id_venta="'.$venta["id_venta"].'">
            //                   <i class="fa fa-pencil"></i></button>
            //                   <button class="btn btn-danger btnEliminarVenta" id_venta="'.$venta["id_venta"].'">
            //                   <i class="fa fa-times"></i></button>
            //                 </div>
            //               </td>
            //            </tr>';
            // }

              ?>


              </tbody>
            </table>

              <?php

              $eliminarVenta = new ControladorVentas();
              $eliminarVenta -> ctrEliminarVenta();

              ?>
          </div>
        </div>
    </section>
  </div>
