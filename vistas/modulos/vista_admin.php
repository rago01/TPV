<div class="row">
    <?php
    if($perfil == "1"){
      
    include "inicio/cajas-superiores.php";
    }
    ?>
</div>

     <div class="row">
        <div class="col-lg-12">
          <?php
          if($perfil == "1"){
           include "reportes/grafico-ventas.php";
          }
          ?>
        </div>

        <div class="col-lg-6">
          <?php
          if($_SESSION["id_perfil"] =="1"){
           include "reportes/productos-mas-vendidos.php";
         }
          ?>
        </div>

         <div class="col-lg-6">
          <?php
          if($_SESSION["id_perfil"] =="1"){
           include "inicio/productos-recientes.php";
         }
          ?>
        </div>
     </div>
