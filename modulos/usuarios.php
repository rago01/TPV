
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
            <tbody>
            <?php
            $item = null;
            $valor = null;

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

            /*$sql="SELECT id_user,id_perfil,nombres,apellidos,t_doc,doc,email,celular,direccion,estado_user FROM users";
            $consulta=Conexion::conectar()->prepare($sql);
            $consulta->execute(); */
            $i = 1;
          foreach ($usuarios as $key => $usuario) {
                echo'
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
                        <p><strong>Número de contacto : </strong>'.$usuario['celular'].'</p>
                        <p><strong>Dirección :</strong> '.$usuario['direccion'].' </p>
                        <p><strong>Email :</strong> '.$usuario['email'].' </p>
                      </td>
                      <td>';
                        if ($usuario['estado_user'] == 1) {

                        echo '<button class="btn btn-success btn-md btnActivar" id_user="'.$usuario['id_user'].'" estado_user="0">Activo</button>';

                      }else {
                         echo '<button class="btn btn-danger btn-md btnActivar" id_user="'.$usuario['id_user'].'" estado_user="1">Inactivo</button>';
                      }
                 echo'</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarUsuario" id_user="'.$usuario['id_user'].'"
                          data-toggle="modal" data-target="#EditUser"> <i class="fa fa-pencil"></i> </button>
                          <button class="btn btn-danger btnEliminarUsuario" id_user="'.$usuario['id_user'].'"> <i class="fa fa-times"></i> </button>
                        </div>
                      </td>
                    </tr>
                  ';
          } ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

          <?php //INCLUIR FORMULARIO PARA CREACION
          include('forms/crear_usuario.php');
          ?>


          <?php //INCLUIR FORMULARIO PARA EDICION
          include('forms/editar_usuario.php');
          ?>
