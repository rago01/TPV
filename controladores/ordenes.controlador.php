<?php

class ControladorOrdenes{

  /*=============================================
	MOSTRAR ORDENES DEL CLIENTE
	=============================================*/
  static public function ctrMostrarOrdenes($item, $valor){

    $tabla = "ventas";
    $respuesta = ModeloOrdenes::mdlMostrarOrdenes($tabla, $item, $valor);
    return $respuesta;

  }

  /*=============================================
  CREAR ORDEN PARA CLIENTES
  =============================================*/

  static public function ctrCrearOrden(){

  	if(isset($_POST["nuevaVenta"])){
  		/*=============================================
  		SACAR INFORMACION DEL CLIENTE
  		=============================================*/
      $tablaClientes = "clientes";
			$item = "id_cliente";
			$valor = $_POST["responsable_orden"];
			$traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $item, $valor);

  		$listaProductos = json_decode($_POST["listaProductos"], true);
  	//	var_dump($listaProductos);
  		$totalProductosComprados = array();

  			/*=============================================
  			GUARDAR LA ORDEN EN LA TABLA DE ORDENES
  			=============================================*/

  			$tabla = "ventas";
        if ($_POST["infoMetodoEntrega"] == '1') {
          $metodoEntrega = 'Pago en caja';
        }
        if ($_POST["infoMetodoEntrega"] == '2') {
          $metodoEntrega = 'Domicilio-'.$traerCliente["direccion"];
        }
        if ($_POST["infoMetodoEntrega"] == '3') {
          $metodoEntrega = 'Domicilio-'.$_POST["direccion_envio"];
        }


  			$datos = array(
  							 "id_cliente"=>$_SESSION['id_cliente'],
  							 "resp_venta"=>"0",
  						   "hora_venta"=>date("H:i:s"),
  							 "fecha_venta"=>date("Y-m-d"),
  						   "productos"=>$_POST["listaProductos"],
  							 "metodo_pago"=>"PENDIENTE",
  						   "total"=>$_POST["totalVenta"],
                 "metodo_entrega"=>$metodoEntrega,
  							 "estado_venta"=>"2"
  						   );
  							 var_dump($datos);
  			$respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);
  			//var_dump($respuesta);
  			if($respuesta == "ok"){
  				echo'<script>

  				localStorage.removeItem("rango");

  				swal({
  						type: "success",
  						title: "Se ha realizado la venta con éxito!",
  						showConfirmButton: true,
  						confirmButtonText: "Cerrar"
  						}).then((result) => {
  								if (result.value) {
  								window.location = "crear_venta";
  								}
  							})
  				</script>';

  			}
  	}

  }
}
 ?>
