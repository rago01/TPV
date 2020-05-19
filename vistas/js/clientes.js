/*=============================================
AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA
=============================================*/
$(".productosCliente tbody").on("click", "button.agregarProducto", function(){
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
		}

	});

})
