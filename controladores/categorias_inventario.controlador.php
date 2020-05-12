<?php

class ControladorCategoriasInventario{

  /*=============================================
						CREAR CATEGORIA
	=============================================*/

static public function ctrCrearCategoriaInventario(){
  if (isset($_POST['nombre_categoria'])) {
      if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_categoria"])){

        $tabla = "categorias_inventario";
        $datos = array("nombre_categoria_inventario" => $_POST['nombre_categoria'],
                       "estado" => "1");
        $respuesta = ModeloCategorias::mdlIngresarCategoriasInventario($tabla, $datos);
         var_dump($datos);
        if ($respuesta == "ok") {
          echo'<script>

    					swal({
    						  type: "success",
    						  title: "Se agrego la categoría con éxito!",
    						  showConfirmButton: true,
    						  confirmButtonText: "Cerrar"
    						  }).then(function(result){
    							if (result.value) {

    							window.location = "categorias_inventario";

    							}
    						})

    			  	</script>';
        }
      }else{
        echo'<script>

  					swal({
  						  type: "error",
  						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
  						  showConfirmButton: true,
  						  confirmButtonText: "Cerrar"
  						  }).then(function(result){
  							if (result.value) {

  							window.location = "categorias_inventario";

  							}
  						})

  			  	</script>';
      }
    }
  }
  /*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/


static public function ctrMostrarCategoriasInventario($item, $valor){

		$tabla = "categorias_inventario";
		$respuesta = ModeloCategorias::mdlMostrarCategoriasInventario($tabla, $item, $valor);
		return $respuesta;

	}

  /*=============================================
EDITAR CATEGORIA
=============================================*/

 public function ctrEditarCategoria(){

  if(isset($_POST["new_nombre_categoria"])){

    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["new_nombre_categoria"])){

      $tabla = "categorias_inventario";
      $datos = array("nombre_categoria_inventario"=>$_POST["new_nombre_categoria"],
                     "id_categoria_inventario"=>$_POST["id_categoria_inventario"]);

      $respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);
      var_dump($respuesta);
      if($respuesta == "ok"){

        echo'<script>

        swal({
            type: "success",
            title: "La categoría ha sido modificada correctamente",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result){
                if (result.value) {

                window.location = "categorias_inventario";

                }
              })

        </script>';

      }


    }else{

      echo'<script>

        swal({
            type: "error",
            title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result){
            if (result.value) {

            window.location = "categorias_inventario";

            }
          })

        </script>';

    }

  }

}

/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarCategoria(){

		if(isset($_GET["id_categoria_inventario"])){

			$tabla ="categorias_inventario";
			$datos = $_GET["id_categoria_inventario"];

			$respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categorias_inventario";

									}
								})

					</script>';
			}
		}

	}



}




?>
