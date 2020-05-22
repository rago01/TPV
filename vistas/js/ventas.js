
if (localStorage.getItem("capturarRango") != null) {
    $("#daterange-btn span").html(localStorage.getItem("capturarRango"));
}else {
  $("#daterange-btn span").html('<i class="fa fa-calendar"></i> Rango de fecha');
}


$('.tablaVentas').DataTable( {
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );

/*=============================================
AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA
=============================================*/
$(".tablaVentas tbody").on("click", "button.agregarProducto", function(){
  var id_producto = $(this).attr("id_producto");
	//console.log("id_producto", id_producto);

	$(this).removeClass("btn-primary agregarProducto");
	$(this).addClass("btn-default");

  var datos = new FormData();
	datos.append("id_producto", id_producto);

	$.ajax({

		url:"ajax/productos_venta.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
				//console.log(respuesta);

        var nombre_producto = respuesta["nombre_producto"];
        var descripcion_producto = respuesta["descripcion_producto"];
        var precio_venta = respuesta["precio_venta"];

        $(".nuevoProducto").append(

      '<div class="row" style="padding:5px 15px">'+

			  '<!-- Descripción del producto -->'+
	          '<div class="col-xs-6" style="padding-right:0px">'+
	            '<div class="input-group">'+
	              '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" id_producto="'+id_producto+'"><i class="fa fa-times"></i></button></span>'+
	              '<input type="text" class="form-control nuevaDescripcionProducto" id_producto="'+id_producto+'" nombre_producto="'+nombre_producto+'" name="agregarProducto" value="'+nombre_producto+'" readonly required>'+
	            '</div>'+
	          '</div>'+

	          '<!-- Cantidad del producto -->'+

	          '<div class="col-xs-3">'+
	             '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" required>'+
	          '</div>' +

	          '<!-- Precio del producto -->'+

	          '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+
	            '<div class="input-group">'+
	              '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
	              '<input type="text" class="form-control nuevoPrecioProducto" precioReal="'+precio_venta+'" name="nuevoPrecioProducto" value="'+precio_venta+'" readonly required>'+
	            '</div>'+
	          '</div>'+
	        '</div>')
          // SUMAR TOTAL DE PRECIOS
         sumarTotalPrecios()
         listarProductos()
         // FORMATO AL PRECIO
         $(".nuevoPrecioProducto").number(true, 2);
         localStorage.removeItem("quitarProducto");
		}

	});

})
/*=============================================
CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA
=============================================*/
$(".tablaVentas").on("draw.dt", function(){

	if(localStorage.getItem("quitarProducto") != null){
		var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

		for(var i = 0; i < listaIdProductos.length; i++){

			$("button.recuperarBoton[id_producto='"+listaIdProductos[i]["id_producto"]+"']").removeClass('btn-default');
			$("button.recuperarBoton[id_producto='"+listaIdProductos[i]["id_producto"]+"']").addClass('btn-primary agregarProducto');

		}
	}
})

/*=============================================
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
=============================================*/
var idQuitarProducto = [];
localStorage.removeItem("quitarProducto");

$(".formularioVenta").on("click", "button.quitarProducto", function(){
  //console.log("ok");
	$(this).parent().parent().parent().parent().remove();
  var id_producto = $(this).attr("id_producto");
	/*=============================================
	ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
	=============================================*/
	if(localStorage.getItem("quitarProducto") == null){
		idQuitarProducto = [];
	}else{
		idQuitarProducto.concat(localStorage.getItem("quitarProducto"))
	}
	idQuitarProducto.push({"id_producto":id_producto});
	localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));
	$("button.recuperarBoton[id_producto='"+id_producto+"']").removeClass('btn-default');
	$("button.recuperarBoton[id_producto='"+id_producto+"']").addClass('btn-primary agregarProducto');

	if($(".nuevoProducto").children().length == 0){
		$("#nuevoImpuestoVenta").val(0);
		$("#nuevoTotalVenta").val(0);
		$("#totalVenta").val(0);
		$("#nuevoTotalVenta").attr("total",0);
	}else{
		// SUMAR TOTAL DE PRECIOS
    	sumarTotalPrecios()
        // AGRUPAR PRODUCTOS EN FORMATO JSON
      listarProductos()

	}
})
/*=============================================
AGREGANDO PRODUCTOS DESDE EL BOTÓN PARA DISPOSITIVOS
=============================================*/
var numProducto = 0;
$(".btnAgregarProducto").click(function(){
	numProducto ++;
	var datos = new FormData();
	datos.append("traerProductos", "ok");
	$.ajax({
		url:"ajax/productos_venta.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
          //console.log(respuesta);
          var precio_venta = respuesta['precio_venta'];
          var id_producto = respuesta['id_producto'];
          $(".nuevoProducto").append(
        '<div class="row" style="padding:5px 15px">'+
          '<!-- Descripción del producto -->'+
              '<div class="col-xs-11" style="padding-right:0px">'+
                '<div class="input-group">'+
                  '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" id_producto><i class="fa fa-times"></i></button></span>'+
                  '<select class="form-control nuevaDescripcionProducto productoSeleccionado" id="'+numProducto+'" id_producto  required>'+
                  '<option>Seleccione el producto</option>'+
                  '</select>'+
                '</div>'+
              '</div>'+

              '<!-- Cantidad del producto -->'+
              '<div class="col-xs-5 ingresoCantidad">'+
  	             '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1"  required>'+
  	          '</div>'+

              '<!-- Precio del producto -->'+
              '<div class="col-xs-7 ingresoPrecio" style="padding-left:0px">'+
                '<div class="input-group">'+
                  '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
                  '<input type="text" class="form-control nuevoPrecioProducto " precioReal="" name="nuevoPrecioProducto" value=""  readonly required>'+
                '</div>'+
              '</div>'+
              '<hr>'+
            '</div>'
          );
	        // AGREGAR LOS PRODUCTOS AL SELECT

	         respuesta.forEach(funcionForEach);
	         function funcionForEach(item, index){
		         	$("#"+numProducto).append(
						          '<option id_producto="'+item.id_producto+'" value="'+item.nombre_producto+'">'+item.nombre_producto+'</option>'
		         	)
	         }
	         // SUMAR TOTAL DE PRECIOS
           sumarTotalPrecios();
           listarProductos()
           // FORMATO AL PRECIO
           $(".nuevoPrecioProducto").number(true, 2);
      	}
	})
})



/*=============================================
SELECCIONAR PRODUCTO
=============================================*/
$(".formularioVenta").on("change", "select.nuevaDescripcionProducto", function(){
  var nombreProducto = $(this).val();
  console.log("nombre producto", nombreProducto);
  var nuevoPrecioProducto = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
  var nuevaDescripcionProducto = $(this).parent().parent().parent().children().children().children(".nuevaDescripcionProducto");
  var nuevaCantidadProducto = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");
  var datos = new FormData();
  datos.append("nombreProducto", nombreProducto);

	  $.ajax({
     	url:"ajax/productos_venta.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
          console.log(respuesta);
      	    $(nuevoPrecioProducto).val(respuesta["precio_venta"]);
            $(nuevoPrecioProducto).attr("precioReal", respuesta["precio_venta"]);
  	      // AGRUPAR PRODUCTOS EN FORMATO JSON
          listarProductos();
          sumarTotalPrecios();
      	}
      })
})

/*=============================================
MODIFICAR LA CANTIDAD
=============================================*/
$(".formularioVenta").on("change", "input.nuevaCantidadProducto", function(){
	 var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
	 var precioFinal = $(this).val() * precio.attr("precioReal");
   //console.log("precio", precio.val());
   precio.val(precioFinal);
	// SUMAR TOTAL DE PRECIOS
	sumarTotalPrecios()
  // AGRUPAR PRODUCTOS EN FORMATO JSON
  listarProductos()

})


/*=============================================
SUMAR TODOS LOS PRECIOS
=============================================*/
function sumarTotalPrecios(){

  	var precioItem = $(".nuevoPrecioProducto");
  	var arraySumaPrecio = [];

  	for(var i = 0; i < precioItem.length; i++){
  		 arraySumaPrecio.push(Number($(precioItem[i]).val()));
  	}

	function sumaArrayPrecios(total, numero){
		return total + numero;
	}

	var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);
  $("#nuevoTotalVenta").attr("total",sumaTotalPrecio);
	$("#nuevoTotalVenta").val(sumaTotalPrecio);
  $("#totalVenta").val(sumaTotalPrecio);
}

/*=============================================
FORMATO AL PRECIO FINAL
=============================================*/
$("#nuevoTotalVenta").number(true, 2);

/*=============================================
SELECCIONAR MÉTODO DE PAGO
=============================================*/

$("#nuevoMetodoPago").change(function(){

	var metodo = $(this).val();

	if(metodo == "EFECTIVO"){
		$(this).parent().parent().removeClass("col-xs-6");
		$(this).parent().parent().addClass("col-xs-4");
		$(this).parent().parent().parent().children(".cajasMetodoPago").html(

			 '<div class="col-xs-4">'+
			 	'<div class="input-group">'+
			 		'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
			 		'<input type="text" class="form-control" id="nuevoValorEfectivo" placeholder="000000" required>'+
			 	'</div>'+
			 '</div>'+

			 '<div class="col-xs-4" id="capturarCambioEfectivo" style="padding-left:0px">'+
			 	'<div class="input-group">'+
			 		'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
			 		'<input type="text" class="form-control" id="nuevoCambioEfectivo" placeholder="000000" readonly required>'+
			 	'</div>'+
			 '</div>'

		 )
		// Agregar formato al precio
		$('#nuevoValorEfectivo').number( true, 2);
    $('#nuevoCambioEfectivo').number( true, 2);
  	// Listar método en la entrada
  	listarMetodos()

	}else{

		$(this).parent().parent().removeClass('col-xs-4');
		$(this).parent().parent().addClass('col-xs-6');
		 $(this).parent().parent().parent().children('.cajasMetodoPago').html(

		 	        '<div class="col-xs-6" style="padding-left:0px">'+
                '<div class="input-group">'+
                  '<input type="text"  class="form-control" id="nuevoCodigoTransaccion" placeholder="Código transacción"  required>'+
                  '<span class="input-group-addon"><i class="fa fa-lock"></i></span>'+
                '</div>'+
              '</div>')
	}

})

/*=============================================
CAMBIO EN EFECTIVO
=============================================*/
$(".formularioVenta").on("change", "input#nuevoValorEfectivo", function(){

	var efectivo = $(this).val();
	var cambio =  Number(efectivo) - Number($('#nuevoTotalVenta').val());

	var nuevoCambioEfectivo = $(this).parent().parent().parent().children('#capturarCambioEfectivo').children().children('#nuevoCambioEfectivo');
	nuevoCambioEfectivo.val(cambio);

})

/*=============================================
CAMBIO TRANSACCIÓN
=============================================*/
$(".formularioVenta").on("change", "input#nuevoCodigoTransaccion", function(){
	// Listar método en la entrada
     listarMetodos()
})


/*=============================================
LISTAR TODOS LOS PRODUCTOS
=============================================*/
function listarProductos(){
	var listaProductos = [];
	var descripcion = $(".nuevaDescripcionProducto");
	var cantidad = $(".nuevaCantidadProducto");
	var precio = $(".nuevoPrecioProducto");
	for(var i = 0; i < descripcion.length; i++){

		listaProductos.push({
                "id_producto" : $(descripcion[i]).attr("id_producto"),
                "nombre_producto" : $(descripcion[i]).attr("nombre_producto"),
							  "descripcion_producto" : $(descripcion[i]).val(),
							  "cantidad" : $(cantidad[i]).val(),
							  "precio" : $(precio[i]).attr("precioReal"),
							  "total" : $(precio[i]).val()})

	}
//  console.log("listaProductos", JSON.stringify(listaProductos));
	$("#listaProductos").val(JSON.stringify(listaProductos));
}


/*=============================================
LISTAR MÉTODO DE PAGO
=============================================*/
function listarMetodos(){
	var listaMetodos = "";
	if($("#nuevoMetodoPago").val() == "EFECTIVO"){
		$("#listaMetodoPago").val("EFECTIVO");
	}else{
		$("#listaMetodoPago").val($("#nuevoMetodoPago").val()+"-"+$("#nuevoCodigoTransaccion").val());
	}
}

/*=============================================
BOTON EDITAR VENTA
=============================================*/
$(".tablas").on("click", ".btnEditarVenta", function(){

	var id_venta = $(this).attr("id_venta");

	window.location = "index.php?ruta=editar_venta&id_venta="+id_venta;


})

/*=============================================
FUNCIÓN PARA DESACTIVAR LOS BOTONES AGREGAR CUANDO EL PRODUCTO YA HABÍA SIDO SELECCIONADO EN LA CARPETA
=============================================*/

function quitarAgregarProducto(){

	//Capturamos todos los id de productos que fueron elegidos en la venta
	var idProductos = $(".quitarProducto");
	//Capturamos todos los botones de agregar que aparecen en la tabla
	var botonesTabla = $(".tablaVentas tbody button.agregarProducto");

	//Recorremos en un ciclo para obtener los diferentes idProductos que fueron agregados a la venta
	for(var i = 0; i < idProductos.length; i++){

		//Capturamos los Id de los productos agregados a la venta
		var boton = $(idProductos[i]).attr("id_producto");
    //console.log(boton);
		//Hacemos un recorrido por la tabla que aparece para desactivar los botones de agregar
		for(var j = 0; j < botonesTabla.length; j ++){

			if($(botonesTabla[j]).attr("id_producto") == boton){

				$(botonesTabla[j]).removeClass("btn-primary agregarProducto");
				$(botonesTabla[j]).addClass("btn-default");

			}
		}

	}

}


/*=============================================
CADA VEZ QUE CARGUE LA TABLA CUANDO NAVEGAMOS EN ELLA EJECUTAR LA FUNCIÓN:
=============================================*/

$('.tablaVentas').on( 'draw.dt', function(){

	quitarAgregarProducto();

})

/*=============================================
BORRAR VENTA
=============================================*/
$(".tablas").on("click", ".btnEliminarVenta", function(){

  var id_venta = $(this).attr("id_venta");

  swal({
        title: '¿Está seguro de borrar la venta?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar venta!'
      }).then(function(result){
        if (result.value) {

            window.location = "index.php?ruta=ventas&id_venta="+id_venta;
        }

  })

})

/*=============================================
IMPRIMIR FACTURA
=============================================*/

$(".tablas").on("click", ".btnImprimirFactura", function(){

	var id_venta = $(this).attr("id_venta");

	window.open("extensiones/tcpdf/pdf/factura.php?id_venta="+id_venta, "_blank");

})

$('#daterange-btn').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');
  //  console.log(fechaInicial);

    var fechaFinal = end.format('YYYY-MM-DD');
//console.log(fechaFinal);
    var capturarRango = $("#daterange-btn span").html();

    //console.log(capturarRango);
   	localStorage.setItem("capturarRango", capturarRango);

   	window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

	localStorage.removeItem("capturarRango");
	localStorage.clear();
	window.location = "ventas";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function(){

	var textoHoy = $(this).attr("data-range-key");

	if(textoHoy == "Hoy"){

		var d = new Date();

		var dia = d.getDate();
		var mes = d.getMonth()+1;
		var año = d.getFullYear();

		if(mes < 10){

			var fechaInicial = año+"-0"+mes+"-"+dia;
			var fechaFinal = año+"-0"+mes+"-"+dia;

		}else if(dia < 10){

			var fechaInicial = año+"-"+mes+"-0"+dia;
			var fechaFinal = año+"-"+mes+"-0"+dia;

		}else if(mes < 10 && dia < 10){

			var fechaInicial = año+"-0"+mes+"-0"+dia;
			var fechaFinal = año+"-0"+mes+"-0"+dia;

		}else{

			var fechaInicial = año+"-"+mes+"-"+dia;
	    	var fechaFinal = año+"-"+mes+"-"+dia;

		}

		dia = ("0"+dia).slice(-2);
		mes = ("0"+mes).slice(-2);

		var fechaInicial = año+"-"+mes+"-"+dia;
		var fechaFinal = año+"-"+mes+"-"+dia;

    	localStorage.setItem("capturarRango", "Hoy");

    	window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

	}

})

/*=============================================
ABRIR ARCHIVO XML EN NUEVA PESTAÑA
=============================================*/

$(".abrirXML").click(function(){

	var archivo = $(this).attr("archivo");
	window.open(archivo, "_blank");


})
