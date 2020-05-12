<?php

error_reporting(0);

if(isset($_GET["fechaInicial"])){

    $fechaInicial = $_GET["fechaInicial"];
    $fechaFinal = $_GET["fechaFinal"];

}else{

$fechaInicial = null;
$fechaFinal = null;

}

$respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

$arrayFechas = array();
$arrayVentas = array();
$sumaPagosMes = array();

foreach ($respuesta as $key => $value) {

//var_dump($value);
	#Capturamos sólo el año y el mes
  //echo $value['fecha_venta'].'<br>';
	$fecha = substr($value["fecha_venta"],0,7);
  //echo $fecha.'<br>';
	#Introducir las fechas en arrayFechas
	array_push($arrayFechas, $fecha);

	#Capturamos las ventas
	$arrayVentas = array($fecha => $value["total"]);
  //var_dump($arrayVentas);
	#Sumamos los pagos que ocurrieron el mismo mes
	foreach ($arrayVentas as $key => $value) {
  //  var_dump($arrayVentas);
   	$sumaPagosMes[$key] += $value;
}

}


$noRepetirFechas = array_unique($arrayFechas);

//var_dump($noRepetirFechas);

?>

<!--=====================================
GRÁFICO DE VENTAS
======================================-->


<div class="box box-primary">
	<div class="box-header with-border text-center">
 		<i class="fa fa-line-chart"></i>
  		<h3 class="box-title">Gráfico de Ventas</h3>
	</div>

	<div class="box-body responsive border-radius-none nuevoGraficoVentas">
		<div class="chart" id="line-chart-ventas" style="height: 250px;"></div>
  </div>
</div>

<script>

 var line = new Morris.Line({
    element          : 'line-chart-ventas',
    resize           : true,
    data: [
      <?php
      if($noRepetirFechas != null){
        foreach($noRepetirFechas as $key){

          echo "{ y: '".$key."', ventas: ".$sumaPagosMes[$key]." },";
        }

        echo "{y: '".$key."', ventas: ".$sumaPagosMes[$key]." }";

      }else{
         echo "{ y: '0', ventas: '0' }";
      }
          ?>
        ],
        xkey: 'y',
        ykeys: ['ventas'],
        labels: ['ventas'],
        lineColors: ['#3c8dbc'],
        hideHover: 'auto'
      });

</script>
