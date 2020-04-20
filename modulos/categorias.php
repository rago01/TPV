

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
      <h1>
        GESTIÓN DE CATEGORÍAS
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
          <table class="table table-bordered table-striped dt-responsive">
            <thead>
              <tr>
                <th style="width:10px;">ID</th>
                <th>NOMBRE CATEGORÍA</th>
                <th>DESCRIPCION</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <?php
           $sql="SELECT id_categoria,nombre_categoria,descripcion_categoria,imagen,estado FROM categorias_productos";
            $consulta=Conexion::conectar()->prepare($sql);
            $consulta->execute();
            $i = 1;
            while ($categoria = $consulta->fetch()) {
                echo
                '<tbody>
                    <tr>
                      <td>'.$categoria['id_categoria'].'</td>
                      <td>
                        <p>'.$categoria['nombre_categoria'].'</p>
                        <p> <img src="'.$categoria['imagen'].'" class="img-responsive"> </p>
                        ';
                  echo'</td>
                      <td>
                        <p>'.$categoria['descripcion_categoria'].'</p>
                      </td>
                      <td>';
                        if ($categoria['estado'] == 1) {

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

    </div>
  </div>
</div>
