<?php

class ControladorVentas{

  /*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function ctrMostrarVentas($item, $valor){

		$tabla = "ventas";
		$respuesta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);
		return $respuesta;

	}

/*=============================================
CREAR VENTA
=============================================*/

static public function ctrCrearVenta(){

	if(isset($_POST["nuevaVenta"])){
		//var_dump($_POST);
		/*=============================================
		ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
		=============================================*/
		$listaProductos = json_decode($_POST["listaProductos"], true);
		//var_dump($listaProductos);
		$totalProductosComprados = array();

					foreach ($listaProductos as $key => $value) {
						array_push($totalProductosComprados, $value["cantidad"]);

						//var_dump($value);
						   $tablaProductos = "productos_venta";

					     $item = "id_producto";
					     $valor = $value["id_producto"];

					     $traerProducto = ModeloProductosVenta::mdlMostrarProductosVenta($tablaProductos, $item, $valor);

							 var_dump($traerProducto);
							 $item1a = "ventas";
							 $valor1a = $value["cantidad"] + $traerProducto["ventas"];

					     $nuevasVentas = ModeloProductosVenta::mdlActualizarProductoVenta($tablaProductos, $item1a, $valor1a, $valor);
							 var_dump($nuevasVentas);
					}
			$tablaClientes = "clientes";
			$item = "id_cliente";
			$valor = $_POST["seleccionarCliente"];

			$traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $item, $valor);

			var_dump($traerCliente);
			$item1 = "compras";
  		$valor1 = array_sum($totalProductosComprados) + $traerCliente['compras'];

			$comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1, $valor1, $valor);
			//var_dump($comprasCliente);

			/*=============================================
			GUARDAR LA COMPRA
			=============================================*/
			date_default_timezone_set('America/Bogota');
			$tabla = "ventas";

			$datos = array(
							 "id_cliente"=>$_POST["seleccionarCliente"],
							 "resp_venta"=>$_POST["responsable_venta"],
						   "hora_venta"=>date("H:i:s"),
							 "fecha_venta"=>date("Y-m-d"),
						   "productos"=>$_POST["listaProductos"],
							 "metodo_pago"=>$_POST["listaMetodoPago"],
						   "total"=>$_POST["totalVenta"],
							 "estado_venta"=>"1"
						   );
							 var_dump($datos);
			$respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);
			var_dump($respuesta);
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

/*=============================================
CREAR ORDEN PARA CLIENTES
=============================================*/

static public function ctrCrearOrden(){

	if(isset($_POST["nuevaVenta"])){
		/*=============================================
		ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
		=============================================*/
		$listaProductos = json_decode($_POST["listaProductos"], true);
	//	var_dump($listaProductos);
		$totalProductosComprados = array();
					//
					// foreach ($listaProductos as $key => $value) {
					// 	array_push($totalProductosComprados, $value["cantidad"]);
					//
					// 	//var_dump($value);
					// 	   $tablaProductos = "productos_venta";
					//
					//      $item = "id_producto";
					//      $valor = $value["id_producto"];
					//
					//      $traerProducto = ModeloProductosVenta::mdlMostrarProductosVenta($tablaProductos, $item, $valor);
					//
					// 		 //var_dump($traerProducto);
					// 		 $item1a = "ventas";
					// 		 $valor1a = $value["cantidad"] + $traerProducto["ventas"];
					//
					//      $nuevasVentas = ModeloProductosVenta::mdlActualizarProductoVenta($tablaProductos, $item1a, $valor1a, $valor);
					// 		 var_dump($nuevasVentas);
					// }
			// $tablaClientes = "clientes";
			// $item = "id_cliente";
			// $valor = $_POST["seleccionarCliente"];
			//
			// $traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $item, $valor);
			//
			// //var_dump($traerCliente);
			// $item1 = "compras";
  		// $valor1 = array_sum($totalProductosComprados) + $traerCliente['compras'];
			//
			// $comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1, $valor1, $valor);
			// //var_dump($comprasCliente);

			/*=============================================
			GUARDAR LA COMPRA
			=============================================*/

			$tabla = "ventas";

			$datos = array(
							 "id_cliente"=>$_SESSION['id_cliente'],
							 "resp_venta"=>"0",
						   "hora_venta"=>date("H:i:s"),
							 "fecha_venta"=>date("Y-m-d"),
						   "productos"=>$_POST["listaProductos"],
							 "metodo_pago"=>"PENDIENTE",
						   "total"=>$_POST["totalVenta"],
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
/*=============================================
EDITAR VENTA
=============================================*/

static public function ctrEditarVenta(){

	if(isset($_POST["editarVenta"])){
		/*=============================================
			FORMATEAR TABLA DE PRODUCTOS Y LA DE CLIENTES
			=============================================*/
		$tabla = "ventas";

		$item = "id_venta";
		$valor = $_POST['editarVenta'];
		$traerVenta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);


		//var_dump($traerVenta);
		/*=============================================
			REVISAR SI VIENE PRODUCTOS EDITADOS
			=============================================*/

			if($_POST["listaProductos"] == ""){
			  $listaProductos = $traerVenta["productos"];
				$cambioProducto = 0;
			}else{
		    $listaProductos = $_POST["listaProductos"];
				$cambioProducto = 1;
			}

			if ($cambioProducto == 1){

								$listaProductos = json_decode($traerVenta['productos'], true);
								$totalProductosComprados = array();
								//var_dump($listaProductos);

								foreach ($listaProductos as $key => $value) {
									/*=============================================
										FORMATEANDO LA TABLA DE PRODUCTOS PARA EL NUMERO DE VENTAS
									=============================================*/
									//var_dump($value);
									array_push($totalProductosComprados, $value["cantidad"]);
									$tablaProductos = "productos_venta";

									$item = "id_producto";
									$valor = $value["id_producto"];
									$traerProducto = ModeloProductosVenta::mdlMostrarProductosVenta($tablaProductos, $item, $valor);

									$item1a = "ventas";
									$valor1a = $traerProducto["ventas"] - $value["cantidad"];
									$nuevasVentas = ModeloProductosVenta::mdlActualizarProductoVenta($tablaProductos, $item1a, $valor1a, $valor);

							}
					    $tablaClientes = "clientes";
							$item = "id_cliente";
							$valor = $_POST["seleccionarCliente"];

							$traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $item, $valor);

							$item1 = "compras";
							$valor1 =$traerCliente['compras'] - array_sum($totalProductosComprados);

							$comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1, $valor1, $valor);
							/*=============================================
							ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
							=============================================*/
							$listaProductos_2 = json_decode($listaProductos, true);
							//var_dump($listaProductos_2);
							$totalProductosComprados_2 = array();

								foreach ($listaProductos_2 as $key => $value) {

													array_push($totalProductosComprados_2, $value["cantidad"]);

															$tablaProductos_2 = "productos_venta";

															$item_2 = "id_producto";
															$valor_2 = $value["id_producto"];

															$traerProducto_2 = ModeloProductosVenta::mdlMostrarProductosVenta($tablaProductos_2, $item_2, $valor_2);

															$item1a_2 = "ventas";
															$valor1a_2 = $value["cantidad"] + $traerProducto_2["ventas"];

															$nuevasVentas_2 = ModeloProductosVenta::mdlActualizarProductoVenta($tablaProductos_2, $item1a_2, $valor1a_2, $valor_2);

						}

								$tablaClientes_2 = "clientes";
								$item_2 = "id_cliente";
								$valor_2 = $_POST["seleccionarCliente"];

								$traerCliente_2 = ModeloClientes::mdlMostrarClientes($tablaClientes_2, $item_2, $valor_2);

								//var_dump($traerCliente);
								$item1a_2 = "compras";
					  		$valor1a_2 = array_sum($totalProductosComprados_2) + $traerCliente_2['compras'];

								$comprasCliente_2 = ModeloClientes::mdlActualizarCliente($tablaClientes_2, $item1a_2, $valor1a_2, $valor_2);


					}


	// 		/*=============================================
	// 		GUARDAR LA COMPRA
	// 		=============================================*/
		//$listaProductos $traerVenta['productos'];
			$tabla = "ventas";
			date_default_timezone_set('America/Bogota');
			$datos = array(
							 "id_venta"=> $_POST["editarVenta"],
							 "id_cliente"=>$_POST["seleccionarCliente"],
							 "resp_venta"=>$_POST["responsable_venta"],
						   "hora_venta"=>date("H:i:s"),
							 "fecha_venta"=>date("Y-m-d"),
						   "productos"=> $listaProductos,
							 "metodo_pago"=>$_POST["listaMetodoPago"],
						   "total"=>$_POST["totalVenta"],
							 "estado_venta"=>"1"
						   );
							// var_dump($datos);
		//	$respuesta = ModeloVentas::mdlEditarVenta($tabla, $datos);
			//var_dump($respuesta);
			if($respuesta == "ok"){
				echo'<script>

				localStorage.removeItem("rango");

				swal({
						type: "success",
						title: "La venta ha sido modificada con exito!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then((result) => {
								if (result.value) {
								window.location = "ventas";
								}
							})
				</script>';

			}
	 }

}

/*=============================================
ELIMINAR VENTA
=============================================*/

static public function ctrEliminarVenta(){

	if(isset($_GET["id_venta"])){

		$tabla = "ventas";

		$item = "id_venta";
		$valor = $_GET["id_venta"];

		$traerVenta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);

		/*=============================================
		FORMATEAR TABLA DE PRODUCTOS Y LA DE CLIENTES
		=============================================*/

		$productos =  json_decode($traerVenta["productos"], true);

		$totalProductosComprados = array();

		foreach ($productos as $key => $value) {

			array_push($totalProductosComprados, $value["cantidad"]);

			$tablaProductos = "productos_venta";

			$item = "id_producto";
			$valor = $value["id_producto"];

			$traerProducto = ModeloProductosVenta::mdlMostrarProductosVenta($tablaProductos, $item, $valor);

			$item1a = "ventas";
			$valor1a = $traerProducto["ventas"] - $value["cantidad"];

			$nuevasVentas = ModeloProductosVenta::mdlActualizarProductoVenta($tablaProductos, $item1a, $valor1a, $valor);
		}

		$tablaClientes = "clientes";

		$itemCliente = "id_cliente";
		$valorCliente = $traerVenta["id_cliente"];

		$traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $itemCliente, $valorCliente);

		$item1a = "compras";
	  $valor1a = $traerCliente["compras"] - array_sum($totalProductosComprados);

		$comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1a, $valor1a, $valorCliente);

		/*=============================================
		ELIMINAR VENTA
		=============================================*/

		$respuesta = ModeloVentas::mdlEliminarVenta($tabla, $_GET["id_venta"]);
		var_dump($comprasCliente);
		if($respuesta == "ok"){

			echo'<script>

			swal({
					type: "success",
					title: "La venta ha sido borrada correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					}).then((result) => {
							if (result.value) {

							window.location = "ventas";

							}
						})

			</script>';

		}
	}

}

/*=============================================
RANGO FECHAS
=============================================*/

static public function ctrRangoFechasVentas($fechaInicial, $fechaFinal){

	$tabla = "ventas";

	$respuesta = ModeloVentas::mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal);

	return $respuesta;

}

/*=============================================
	DESCARGAR EXCEL
	=============================================*/

	public function ctrDescargarReporte(){

		if(isset($_GET["reporte"])){
			$tabla = "ventas";

			if(isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])){

				$ventas = ModeloVentas::mdlRangoFechasVentas($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"]);

			}else{

				$item = null;
				$valor = null;

				$ventas = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);

			}


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/
			//
			// $Name = $_GET["reporte"].'.xls';
			//
			// header('Expires: 0');
			// header('Cache-control: private');
			// header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			// header("Cache-Control: cache, must-revalidate");
			// header('Content-Description: File Transfer');
			// header('Last-Modified: '.date('Y-m-d'));
			// header("Pragma: public");
			// header('Content-Disposition:; filename="'.$Name.'"');
			// header("Content-Transfer-Encoding: binary");

			echo utf8_decode("<table border='0'>

					<tr>
					<td style='font-weight:bold; border:1px solid #eee;'>#FACTURA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>VENDEDOR</td>
					<td style='font-weight:bold; border:1px solid #eee;'>CANTIDAD</td>
					<td style='font-weight:bold; border:1px solid #eee;'>PRODUCTOS</td>
					<td style='font-weight:bold; border:1px solid #eee;'>TOTAL</td>
					<td style='font-weight:bold; border:1px solid #eee;'>METODO DE PAGO</td
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>
					</tr>");
					var_dump($ventas);
			foreach ($ventas as $row => $item){
				 $item['resp_venta'];
				$cliente = ControladorClientes::ctrMostrarClientes("id_cliente", $item["id_cliente"]);
				$vendedor = ControladorUsuarios::ctrMostrarUsuarios("id_user", $item["resp_venta"]);
				//var_dump($vendedor);
			 echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$item["id_venta"]."</td>
			 			<td style='border:1px solid #eee;'>".$cliente["nombres"]."</td>
			 			<td style='border:1px solid #eee;'>".$vendedor["nombres"]."</td>
			 			<td style='border:1px solid #eee;'>");

			 	$productos =  json_decode($item["productos"], true);

			 	foreach ($productos as $key => $valueProductos) {

			 			echo utf8_decode($valueProductos["cantidad"]."<br>");
			 		}

			 	echo utf8_decode("</td><td style='border:1px solid #eee;'>");

		 		foreach ($productos as $key => $valueProductos) {

		 			echo utf8_decode($valueProductos["nombre_producto"]."<br>");

		 		}

		 		echo utf8_decode("</td>
					<td style='border:1px solid #eee;'>$ ".$item["total"]."</td>
					<td style='border:1px solid #eee;'>".$item["metodo_pago"]."</td>
					<td style='border:1px solid #eee;'>".$item["fecha_venta"]."</td>
		 			</tr>");


			}


			echo "</table>";

		}

	}

	/*=============================================
	SUMA TOTAL VENTAS
	=============================================*/

	public function ctrSumaTotalVentas(){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlSumaTotalVentas($tabla);

		return $respuesta;

	}



}




?>
