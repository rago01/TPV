<div class="modal fade" id="loginUser" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-darta" >
          <div class="modal-header text-center alert-danger" style="background: #3c8dbc; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">INGRESO USUARIO</h4>
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
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          </div>
      </form>
    </div>
  </div>
</div>
</div>
