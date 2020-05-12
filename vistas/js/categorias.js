
/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarCategoria", function(){

	var id_categoria_producto = $(this).attr("id_categoria_producto");
  console.log ("id_categoria_producto", id_categoria_producto);
	var datos = new FormData();
	datos.append("id_categoria_producto", id_categoria_producto);

	$.ajax({
		  url: "ajax/categorias.ajax.php",
		  method: "POST",
      data: datos,
      cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){
				console.log(respuesta);
     		$("#new_nombre_categoria").val(respuesta["nombre_categoria_producto"]);
     		$("#id_categoria_producto").val(respuesta["id_categoria_producto"]);

     	}

	})


})
/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarCategoria", function(){

	 var id_categoria_producto = $(this).attr("id_categoria_producto");

	 swal({
	 	title: '¿Está seguro de borrar la categoría?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar categoría!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=categorias_producto&id_categoria_producto="+id_categoria_producto;

	 	}

	 })

})
