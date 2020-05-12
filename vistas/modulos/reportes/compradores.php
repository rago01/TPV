<?php

$item = null;
$valor = null;

$ventas = ControladorVentas::ctrMostrarVentas($item, $valor);
$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
//var_dump($ventas);
$arrayClientes = array();
$arraylistaClientes = array();

foreach ($ventas as $key => $valueVentas) {

  foreach ($clientes as $key => $valueClientes) {
// var_dump($valueVentas);
      if($valueClientes["id_cliente"] == $valueVentas["id_cliente"]){
//echo "ok";
        #Capturamos los Clientes en un array
        array_push($arrayClientes, $valueClientes["nombres"]);

        #Capturamos las nombres y los valores netos en un mismo array
        $arraylistaClientes = array($valueClientes["nombres"] => $valueVentas["total"]);

        #Sumamos los netos de cada cliente
        foreach ($arraylistaClientes as $key => $value) {

          $sumaTotalClientes[$key] += $value;

        }

      }
  }

}

#Evitamos repetir nombre
$noRepetirNombres = array_unique($arrayClientes);

?>

<!--=====================================
VENDEDORES
======================================-->

<div class="box box-primary">

	<div class="box-header with-border">

    	<h3 class="box-title">Clientes</h3>

  	</div>

  	<div class="box-body">

		<div class="chart-responsive">

			<div class="chart" id="bar-chart2" style="height: 300px;"></div>

		</div>

  	</div>

</div>

<script>

//BAR CHART
var bar = new Morris.Bar({
  element: 'bar-chart2',
  resize: true,
  data: [
     <?php

    foreach($noRepetirNombres as $value){

      echo "{y: '".$value."', a: '".$sumaTotalClientes[$value]."'},";

    }

  ?>
  ],
  barColors: ['#f55'],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Compras'],
  preUnits: '$',
  hideHover: 'auto'
});


</script>
