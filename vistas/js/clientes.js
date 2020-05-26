  ///REVISAR CLIENTE REGISTRADO
  $("#newCelular").change(function(){

 		$(".alert").remove();

 		var celular = $(this).val();

 		var datos = new FormData();
 		datos.append("validarCelular", celular);
 		console.log(celular);

 		$.ajax({
 			url:"ajax/clientes.ajax.php",
 			method: "POST",
 			data: datos,
 			cache: false,
 			contentType: false,
 			processData: false,
 			dataType: "json",
 			success: function(respuesta){
 						if (respuesta) {
 							$("#newCelular").parent().after('<div class="alert alert-warning">Este cliente ya está registrado</div>')
 							$("#newCelular").val("");
 						}
 			}

 		})

  })
