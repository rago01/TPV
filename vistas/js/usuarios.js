 //EDITAR USUARIO

$(document).on("click", ".btnEditarUsuario", function(){

    var id_user = $(this).attr("id_user");
    console.log("id_user", id_user);

    var datosUser = new FormData();
    datosUser.append("id_user", id_user);

    $.ajax({
      url:"ajax/usuarios.ajax.php",
      method: "POST",
      data: datosUser,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){
          console.log(respuesta);
          $("#id_user").val(respuesta["id_user"]);
          $("#editNombres").val(respuesta["nombres"]);
          $("#editApellidos").val(respuesta["apellidos"]);
          $("#editPerfil").val(respuesta["perfil"]);
          $("#editCelular").val(respuesta["celular"]);
          $("#editDireccion").val(respuesta["direccion"]);
          $("#editEmail").val(respuesta["email"]);
          $("#editT_doc").val(respuesta["t_doc"]);
          $("#editDoc").val(respuesta["doc"]);
          $("#passwordActual").val(respuesta["clave"]);
      }

    });
 })


 ///ACTIVAR USUARIO

 $(".btnActivar").click(function(){

   var id_user = $(this).attr("id_user");
   var estado_user = $(this).attr("estado_user");

   var datos = new FormData();
   datos.append("activarId", id_user);
   datos.append("activarUsuario", estado_user);

   $.ajax({

     url:"ajax/usuarios.ajax.php",
     method: "POST",
     data: datos,
     cache: false,
     contentType: false,
     processData: false,
     success: function(respuesta){
        
       if (window.matchMedia("(max-width:767px)").matches) {
         swal({
           title: "El estado del usuario ha sido actualizado",
           type: "success",
           confirmButtonText: "Cerrar"
         }).then(function(result){
            if (result.value) {
              window.location = "usuarios";
            }
         });
       }
     }
   })

   if (estado_user == 0) {
     $(this).removeClass('btn-success');
     $(this).addClass('btn-danger');
     $(this).html('Inactivo');
     $(this).attr('estado_user', 1);
   }else {
     $(this).addClass('btn-success');
     $(this).removeClass('btn-danger');
     $(this).html('Activo');
     $(this).attr('estado_user', 0);
   }


 })
