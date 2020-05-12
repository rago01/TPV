<?php
require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos_venta.controlador.php";
require_once "../../../modelos/productos_venta.modelo.php";

class ImprimirFactura{

	public $id_venta;

	public function traerImpresionFactura(){

$itemVenta = "id_venta";
$valorVenta = $this->id_venta;

$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);
$total = $respuestaVenta['total'];


//TRAEMOS LA INFORMACIÓN DEL CLIENTE
$productos = json_decode($respuestaVenta["productos"], true);

$itemCliente = "id_cliente";
$valorCliente = $respuestaVenta["id_cliente"];

$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

$cliente = $respuestaCliente['nombres'].' '.$respuestaCliente['apellidos'];
//TRAEMOS LA INFORMACIÓN DEL VENDEDOR

$itemVendedor = "id_user";
$valorVendedor = $respuestaVenta["resp_venta"];

$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

$vendedor = $respuestaVendedor['nombres'].' '.$respuestaVendedor['apellidos'];



require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setFontSubsetting(true);

$pdf->AddPage();


$bloque1 = <<<EOF

<table style="font-size:8px; text-align:center">
	<tr>


		<td style="width:160px;">
			<div>
				Fecha: $respuestaVenta[fecha_venta]
				<br><br>
				Brayan Pizzas
				<br>
				NIT: 71.759.963-9
				<br>
				Dirección: Calle 44B 92-11
				<br>
				Teléfono: 300 786 52 49
				<br>
				FACTURA N.$valorVenta
				<br><br>
				Cliente: $cliente
				<br>
				Vendedor: $vendedor
				<br>
			</div>
		</td>
	</tr>
</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

foreach ($productos as $key => $item) {

$valorUnitario = number_format($item["precio"], 2);

$precioTotal = number_format($item["total"], 2);

$bloque2 = <<<EOF

<table style="font-size:9px;">
	<tr>
		<td style="width:160px; text-align:center">
		$item[nombre_producto]
		</td>
	</tr>
	<tr>
		<td style="width:160px; text-align:center">
		$ $valorUnitario Und * $item[cantidad]  = $ $precioTotal
		<br>
		</td>
	</tr>
</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

}

// ---------------------------------------------------------

$bloque3 = <<<EOF

<table style="font-size:8px; text-align:center">
	<tr>
		<td style="width:80px;">
			 TOTAL:
		</td>
		<td style="width:80px;">
			$ $total
		</td>
	</tr>
	<tr>
		<td style="width:160px;">
			<br>
			<br>
			Muchas gracias por su compra
		</td>
	</tr>
</table>



EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');
$pdf->Output('factura.pdf');

	}
}

$factura = new imprimirFactura();
$factura -> id_venta = $_GET["id_venta"];
$factura -> traerImpresionFactura();
?>
