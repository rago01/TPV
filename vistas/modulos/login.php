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

  <div class="modal-dialog">
      	<div class="modal-content">
		<div class="modal-header text-center alert-danger" style="background: #3c8dbc; color:white;">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">INGRESO</h4>
		</div>
		<div class="modal-body">
		      <div class="login-box-body">
			 <p class="login-box-msg">Ingresar al sistema</p>
			 <form method="post">
			     <div class="form-group has-feedback">
			       <input type="number" class="form-control" placeholder="Documento" required name="user">
			       <span class="glyphicon glyphicon-user form-control-feedback"></span>
			     </div>
			     <div class="form-group has-feedback">
			       <input type="password" class="form-control" placeholder="Clave" name="clave1" required>
			       <span class="glyphicon glyphicon-lock form-control-feedback"></span>
			     </div>
			     <div class="row ">
			       <div class="col-xs-12 ">
				 <button type="submit" class="btn btn-danger btn-block btn-flat" style="border-radius: 15px">Ingresar</button>
			       </div>
			     </div>
			</form>
		      </div>
		  </div>
	   </div>
</div>
      <?php
        include ("forms/login_user.php");

            $login = new ControladorUsuarios();
            $login -> ctrIngresoUsuario();
        
       //  include ("forms/login_cliente.php");
         
       //   $clienteLogin = new ControladorClientes();
       //   $clienteLogin -> ctrIngresoCliente();
      ?>
