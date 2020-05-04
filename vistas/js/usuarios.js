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

$(document).on("click", ".btnActivar", function(){

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


// ELIMINAR Usuario
/*
$(".btnEliminarUsuario").click(function(){

  var id_user = $(this).attr("id_user");


      swal({
        title: "¿Está seguro de borrar el usuario?",
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar usuario'
      }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

    }

  })
})*/


 ///REVISAR USUARIO REGISTRADO

 $("#nuevoDoc").change(function(){

    $(".alert").remove();

    var doc = $(this).val();

    var datos = new FormData();
    datos.append("validarDoc", doc);
    console.log(doc);

    $.ajax({
      url:"ajax/usuarios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){
            if (respuesta) {
              $("#nuevoDoc").parent().after('<div class="alert alert-warning">Este usuario ya existe en el sistema</div>')
              $("#nuevoDoc").val("");
            }
      }

    })

 })
