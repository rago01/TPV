/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarCategoria", function(){

	var id_categoria_inventario = $(this).attr("id_categoria_inventario");
  console.log ("id_categoria_inventario", id_categoria_inventario);
	var datos = new FormData();
	datos.append("id_categoria_inventario", id_categoria_inventario);

	$.ajax({
		  url: "ajax/categorias_inventario.ajax.php",
		  method: "POST",
      data: datos,
      cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#new_nombre_categoria").val(respuesta["nombre_categoria_inventario"]);
     		$("#id_categoria_inventario").val(respuesta["id_categoria_inventario"]);

     	}

	})


})
