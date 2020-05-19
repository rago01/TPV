<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="active">
                <a href="inicio">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>
          <?php  //INICIA MENU DE ADMINISTRACION
          $perfil = $_SESSION['id_perfil'];

                   $sql="SELECT m.titulo,modulo,grupo FROM menu m LEFT JOIN perfiles_menus p ON p.id_menu=m.id_menu
                         WHERE p.id_perfil = $perfil AND grupo = 'administracion'";
                  $consulta=Conexion::conectar()->prepare($sql);
                  $consulta->execute();
                  //var_dump($consulta);
                //  echo $consulta;
                      while($perfil = $consulta->fetch()){
                          echo '<li>
                                    <a href="'.$perfil['modulo'].'">
                                        <i class="fa fa-cog"></i>
                                        <span>'.$perfil['titulo'].'</span>
                                    </a>
                                </li>
                              ';
                        }

                        $perfil = $_SESSION['id_perfil'];
                       $sql1="SELECT m.titulo,modulo,grupo FROM menu m LEFT JOIN perfiles_menus p ON p.id_menu=m.id_menu
                            WHERE p.id_perfil = $perfil AND grupo = 'ventas'";
                       $consulta1=Conexion::conectar()->prepare($sql1);
                       $consulta1->execute();
                       while($venta = $consulta1->fetch()){

                           echo '<li>
                                     <a href="'.$venta['modulo'].'">
                                         <i class="fa fa-money"></i>
                                         <span>'.$venta['titulo'].'</span>
                                     </a>
                                 </li>
                               ';
                         }

                         $perfil = $_SESSION['id_perfil'];
                          $sql2="SELECT m.titulo,modulo,grupo FROM menu m LEFT JOIN perfiles_menus p ON p.id_menu=m.id_menu
                               WHERE p.id_perfil = $perfil AND grupo = 'reportes'";
                          $consulta2=Conexion::conectar()->prepare($sql2);
                          $consulta2->execute();
                          while($reporte = $consulta2->fetch()){

                              echo '<li>
                                        <a href="'.$reporte['modulo'].'">
                                            <i class="fa fa-area-chart"></i>
                                            <span>'.$reporte['titulo'].'</span>
                                        </a>
                                    </li>
                                  ';
                            }
                            $perfil = $_SESSION['id_perfil'];
                            $sql3="SELECT m.titulo,modulo,grupo FROM menu m LEFT JOIN perfiles_menus p ON p.id_menu=m.id_menu
                                 WHERE p.id_perfil = $perfil AND grupo = 'clientes'";
                            $consulta3=Conexion::conectar()->prepare($sql3);
                            $consulta3->execute();
                            //echo $sql3;
                            while($cliente = $consulta3->fetch()){

                                echo '<li>
                                          <a href="'.$cliente['modulo'].'">
                                              <i class="fa fa-file-text-o"></i>
                                              <span>'.$cliente['titulo'].'</span>
                                          </a>
                                      </li>
                                    ';
                              }

                  ?>
              </ul>

    </section>
</aside>
