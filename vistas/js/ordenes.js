/*=============================================
SELECCIONAR MÉTODO DE PAGO
=============================================*/

$("#nuevoMetodoEntrega").change(function(){

	var metodo = $(this).val();

  //console.log(cliente);
	if(metodo == "3"){
		$(this).parent().parent().parent().children(".cajasMetodoEntrega").html(
			 '<div class="col-xs-6">'+
			 	'<div class="input-group">'+
          '<label>Ingrese dirección de domicilio: </label>'+
			 		'<input type="text" class="form-control" id="nuevoValorEfectivo" name="direccion_envio" required>'+
			 	'</div>'+
			 '</div>')
	}else if (metodo == "2") {
    $(this).parent().parent().parent().children('.cajasMetodoEntrega').html('')
  }else{

		 $(this).parent().parent().parent().children('.cajasMetodoEntrega').html('')
	}

})
