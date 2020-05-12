<?php

class ControladorCategoriasProducto{

  /*=============================================
						CREAR CATEGORIA
	=============================================*/

static public function ctrCrearCategoriaProducto(){
  if (isset($_POST['nombre_categoria'])) {
      if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_categoria"])){

        $tabla = "categorias_productos";
        $datos = array("nombre_categoria_producto" => $_POST['nombre_categoria'],
                       "estado" => "1");
        $respuesta = ModeloCategoriasProducto::mdlIngresarCategoriasProducto($tabla, $datos);
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

    							window.location = "categorias_producto";

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

  							window.location = "categorias_producto";

  							}
  						})

  			  	</script>';
      }
    }
  }
  /*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/


static public function ctrMostrarCategoriasProducto($item, $valor){

		$tabla = "categorias_productos";
		$respuesta = ModeloCategoriasProducto::mdlMostrarCategoriasProducto($tabla, $item, $valor);
		return $respuesta;

	}

  /*=============================================
EDITAR CATEGORIA
=============================================*/

 public function ctrEditarCategoriaProducto(){

  if(isset($_POST["new_nombre_categoria"])){

    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["new_nombre_categoria"])){

      $tabla = "categorias_productos";
      $datos = array("nombre_categoria_producto"=>$_POST["new_nombre_categoria"],
                     "id_categoria_producto"=>$_POST["id_categoria_producto"]);

      $respuesta = ModeloCategoriasProducto::mdlEditarCategoriaProducto($tabla, $datos);
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

                window.location = "categorias_producto";

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

            window.location = "categorias_producto";

            }
          })

        </script>';

    }

  }

}

/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarCategoriaProducto(){

		if(isset($_GET["id_categoria_producto"])){

			$tabla ="categorias_productos";
			$datos = $_GET["id_categoria_producto"];

			$respuesta = ModeloCategoriasProducto::mdlBorrarCategoriaProducto($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categorias_producto";

									}
								})

					</script>';
			}
		}

	}



}




?>
