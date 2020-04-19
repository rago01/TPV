  <script>
			function validar(){
				if (document.forms[0].nombres.value == ""){
					alert("NO PODEMOS CREAR EL USUARIO SIN UN NOMBRE");
					document.forms[0].nombres.focus();				// Ubicar el cursor
					return(false);
				}
				if (document.forms[0].clave1.value == document.forms[0].clave2.value ){
					if (document.forms[0].clave1.value != ""){
						document.forms[0].clave1.value = CryptoJS.SHA3(document.forms[0].clave1.value);
						document.forms[0].clave2.value = document.forms[0].clave1.value;
					}
				}else{
					alert("Error en confirmacion de la clave!");
					document.forms[0].clave1.value = "";
					document.forms[0].clave2.value = "";
					document.forms[0].clave1.focus();				// Ubicar el cursor
					return(false);
				}
			}
		</script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
      <h1>
        ADMINISTRAR USUARIOS
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddUser">
              Agregar usuario
            </button>
        </div>
        <div class="box-body table">
          <table class="table table-responsive table-striped dt-responsive ">
            <thead>
              <tr>
                <th style="width:10px;">ID</th>
                <th>USUARIO</th>
                <th>CONTACTO</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <?php
            $sql="SELECT id_user,id_perfil,nombres,apellidos,t_doc,doc,email,celular,direccion,estado_user FROM users";
            $consulta=Conexion::conectar()->prepare($sql);
            $consulta->execute();
            $i = 1;
            while ($usuario = $consulta->fetch()) {
                echo
                '<tbody>
                    <tr>
                      <td>'.$usuario['id_user'].'</td>
                      <td>
                        <p><strong>Nombre completo: </strong>'.$usuario['nombres'].' '.$usuario['apellidos'].'</p>
                        <p><strong>'.$usuario['t_doc'].' :</strong> '.$usuario['doc'].' </p>';
                        if ($usuario['id_perfil'] == '1') { $perfil = "Administrador";  }
                        if ($usuario['id_perfil'] == '2') { $perfil = "Cajero";  }
                        if ($usuario['id_perfil'] == '3') { $perfil = "Mesero";  }
                        if ($usuario['id_perfil'] == '4') { $perfil = "Supervisor"; }
                        echo '<p><strong>Tipo de usuario: </strong>'.$perfil.'</p>';
                  echo'</td>
                      <td>
                        <p><strong>Número de contacto : </strong>'.$usuario['celular'].' '.$usuario['apellidos'].'</p>
                        <p><strong>Dirección :</strong> '.$usuario['direccion'].' </p>
                        <p><strong>Email :</strong> '.$usuario['email'].' </p>
                      </td>
                      <td>';
                        if ($usuario['estado_user'] == 1) {

                        echo '<button class="btn btn-success btn-md " >Activo</button>';

                      }else {
                         echo '<button class="btn btn-danger btn-md " >Inactivo</button>';
                      }
                 echo'</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning"> <i class="fa fa-pencil"></i> </button>
                          <button class="btn btn-danger"> <i class="fa fa-times"></i> </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>';
          } ?>
          </table>
        </div>
        <div class="box-footer">
          Footer
        </div>
      </div>
    </section>
  </div>
  <div class="modal fade" id="AddUser" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-darta" onsubmit="return validar()">
        <div class="modal-header" style="background: #3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar usuarios</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"> <strong> Nombres</strong> </span>
                <input type="text" class="form-control input-lg" name="nombres" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Apellidos</strong> </span>
                <input type="text" class="form-control input-lg" name="apellidos" placeholder="" value="" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Tipo de identificación</strong> </span>
                <select class="form-control input-lg col-3" name="t_doc" required>
                  <option value=""></option>
                  <option value="CC">Cedula de Ciudadania</option>
                  <option value="CE">Cedula de Extranjeria</option>
                  <option value="TI">Tarjeta de Identidad</option>
                  <option value="CC">Registro Civil</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Identificación</strong> </span>
                <input type="number" class="form-control input-lg" name="doc" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Dirección</strong> </span>
                <input type="text" class="form-control input-lg" name="direccion" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Celular</strong> </span>
                <input type="text" class="form-control input-lg" name="celular" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Email</strong> </span>
                <input type="email" class="form-control input-lg" name="email" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"> <strong>Tipo de Usuario</strong> </span>
                <select class="form-control input-lg col-3" name="perfil" required>
                  <option value=""></option>
                  <?php
                  $sql="SELECT id_perfil, nombre_perfil FROM perfiles";
                  $consulta=Conexion::conectar()->prepare($sql);
                  $consulta->execute();
                  while ($perfil = $consulta->fetch()) {
                    echo'  <option value="'.$perfil['id_perfil'].'">'.$perfil['nombre_perfil'].'</option>';
                  }
                  ?>
                </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"> <strong>Clave</strong> </span>
              <input type="password" class="form-control input-lg" name="clave1" required>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"> <strong>Confirmar clave</strong> </span>
              <input type="password" class="form-control input-lg" name="clave2" required>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit"  class="btn btn-primary">Agregar usuario</button>
        </div>

        <?php

        $crearUsuario = new ControladorUsuarios();
        $crearUsuario -> ctrCrearUsuario();

        ?>

      </div>
     </form>
    </div>
  </div>
</div>
