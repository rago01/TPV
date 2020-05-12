$(".tablaProductos").DataTable({

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
});

/*=============================================
SUBIENDO LA FOTO DEL PRODUCTO
=============================================*/
$(".tablaProductos").on("click", ".btnEditarProducto", function(){

	var id_producto = $(this).attr("id_producto");
	console.log("id_producto", id_producto)
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
				console.log(respuesta);
				$("#id_producto").val(respuesta['id_producto']);
				$("#editar_nombre_producto").val(respuesta['nombre_producto']);
				$("#editar_descripcion_producto").val(respuesta['descripcion_producto']);
				$("#editar_precio_venta").val(respuesta['precio_venta']);
				$("#imagenActual").val(respuesta['imagen']);

				if(respuesta["imagen"] != ""){

				$(".previsualizar").attr("src", respuesta["imagen"]);

			}
		}

	});

})

$(".nuevaImagen").change(function(){

	var imagen = this.files[0];
  // console.log(imagen);
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
  		$(".nuevaImagen").val("");
  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });
  	}else if(imagen["size"] > 2000000){

  		$(".nuevaImagen").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;
        console.log(rutaImagen);
  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})


/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablaProductos").on("click", ".btnEliminarProducto", function(){

	 var id_producto = $(this).attr("id_producto");

	 swal({
	 	title: '¿Está seguro de borrar el producto?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar producto!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=productos&id_producto="+id_producto;

	 	}

	 })

})
