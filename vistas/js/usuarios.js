 //EDITAR USUARIO

 $('.btnEditarUsuario').click(function(){

    var idUsuario = $(this).attr("idUsuario");
    console.log("idUsuario", idUsuario);

    var datosUser = new FormData();
    datosUser.append("idUsuario", idUsuario);

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
          $("#nombres").val(respuesta["nombres"]);
          $("#apellidos").val(respuesta["apellidos"]);
          $("#perfil").val(respuesta["perfil"]);
          $("#celular").val(respuesta["celular"]);
          $("#direccion").val(respuesta["direccion"]);
          $("#email").val(respuesta["email"]);
          $("#t_doc").val(respuesta["t_doc"]);
          $("#doc").val(respuesta["doc"]);
      }

    });
 })
