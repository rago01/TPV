<!--<script>
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
</script>  -->
<div id="back"></div>
<div class="login-box">
  <div class="login-logo">
    <img src="vistas/img/plantilla/logo.png"  class="img-responsive" style="padding: 30px 100px 0px 100px ">
  </div>
  <div class="login-box-body" style="border-radius: 10px">
    <p class="login-box-msg h4">Seleccione el tipo de usuario</p>
    <div class="row">
      <div class="col-xs-6">
        <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#logClient">
          Cliente
        </button>
      </div>
        <div class="col-xs-6">
          <button type="button" class="btn btn-danger pull-left" data-toggle="modal" data-target="#loginUser">
            Colaborador
          </button>
        </div>
    </div>
  </div>
</div>
  <!-- /.login-logo -->
<!--  <div class="login-box-body">
    <p class="login-box-msg">Ingresar al sistema</p>
    <form method="post" onsubmit="return validar()">
      <div class="form-group has-feedback">
        <input type="number" class="form-control" placeholder="Usuario o Documento" required name="user">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Clave" name="clave1" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row ">
        <div class="col-xs-12 ">
          <button type="submit" class="btn btn-warning btn-block btn-flat">Ingresar</button>
        </div>
      </div> -->
      <?php
        include ("forms/login_user.php");
        include ("forms/login_cliente.php");

            $login = new ControladorUsuarios();
            $login -> ctrIngresoUsuario();
      ?>

<!-- /.login-box -->
