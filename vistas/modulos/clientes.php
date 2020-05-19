
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
      <h1>
        ADMINISTRAR CLIENTES
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddCliente">
              Agregar Cliente
            </button>
        </div>
        <div class="box-body table">
          <table class="table table-responsive table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width:10px;">ID</th>
                <th>CLIENTE</th>
                <th>PRODUCTOS COMPRADOS</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $item = null;
            $valor = null;

            $usuarios = ControladorClientes::ctrMostrarClientes($item, $valor);
            /*
            Otra forma de llamar los ddatos para las consultas directas
            $sql="SELECT id_user,id_perfil,nombres,apellidos,t_doc,doc,email,celular,direccion,estado_user FROM users";
            $consulta=Conexion::conectar()->prepare($sql);
            $consulta->execute(); */
            $i = 1;
          foreach ($usuarios as $key => $usuario) {
                echo'
                    <tr>
                      <td>'.$usuario['id_cliente'].'</td>
                      <td>
                        <p ><strong>Nombre completo: </strong>'.$usuario['nombres'].' '.$usuario['apellidos'].'</p>';
                  echo'</td>
                      <td>
                      <p class="h2"><strong class="text-info">'.$usuario['compras'].'</strong></p>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarUsuario" id_user="'.$usuario['id_user'].'"
                          data-toggle="modal" data-target="#EditCliente"> <i class="fa fa-pencil"></i> </button>';
                        //<button class="btn btn-danger btnEliminarUsuario" id_user="'.$usuario['id_user'].'"> <i class="fa fa-times"></i> </button>
                      echo '</div>
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

          <?php
          //INCLUIR FORMULARIO PARA CREACION
          include('forms/crear_cliente.php');
          //INCLUIR FORMULARIO PARA EDICION
          include('forms/editar_cliente.php.php');
          ?>
