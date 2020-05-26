<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header text-center">
          <h1>
             PEDIDOS PENDIENTES
          </h1>
  </section>
  <section class="content">
        <div class="box">
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
            $sql_ordenes="SELECT v.id_venta,c.nombres nombres_cliente,c.apellidos apellidos_cliente,v.hora_venta,v.fecha_venta,v.productos,v.total
                          FROM ventas v INNER JOIN clientes c on c.id_cliente=v.id_cliente
                          WHERE resp_venta in (20) AND metodo_pago ='PENDIENTE' AND estado_venta = '2' ORDER BY id_venta DESC";
                          $consulta_orden=Conexion::conectar()->prepare($sql_ordenes);
                          $consulta_orden->execute();
                          // var_dump($consulta_orden);
                            foreach ($consulta_orden as $key => $value) {

                            $productos = json_decode($value['productos'], true);

                                echo'<tr>
                                          <td>'.$value['id_venta'].'</td>
                                          <td width="200px">'.$value['nombres_cliente'].' '.$value['apellidos_cliente'].'</td>
                                          <td> <p>'.$value['fecha_venta'].'</p><p> '.$value['hora_venta'].'</p></td>
                                          <td>'.$value['total'].'</td>
                                          <td>
                                           <div class="btn-group">
                                                <button class="btn btn-warning btnEditarVenta" id_venta="'.$value["id_venta"].'">
                                              <i class="fa fa-pencil"></i></button>
                                              <button class="btn btn-danger btnEliminarVenta" id_venta="'.$value["id_venta"].'">
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
      </section>

</div>
