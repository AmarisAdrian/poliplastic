<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Poliplastics S.A.S. </title>
  <meta name="description" content="Ensacar-carga-masiva">
  <meta name="author" content="Startup - https://www.mutoestudio.com/">
  <meta charset="utf-8" />
  <meta name="robots" content="noindex">
  <meta name="googlebot" content="noindex">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <link rel="icon" type="image/png" href="./asset/img/favicon.ico" />
  <meta name="msapplication-TileColor" content="#ffffff">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="./asset/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="./asset/css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>  
  <link href="./asset/css/signin.css" rel="stylesheet">                                              
  <script src="https://kit.fontawesome.com/16d736b7fa.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body class="adminbody" id="adminbody">
  <?php 
   if(isset($_SESSION['noDocumento'])&&($_SESSION['tiempo'])){
    $inactivo = 3500;
    $vida_session = time() - $_SESSION['tiempo'];
    $Usuario = UsuarioModel::GetByDocumento($_SESSION['noDocumento']);
    if($vida_session > $inactivo)
    { 
      Core::redir_log("./?action=destroysession");              
      exit();
    } 
    Module::LoadTypeLayout($Usuario->idTipoUsuario);  
  }else{?>
<div class="body body-login text-center">
   <div class="container">
   <form class="form-signin" accept-charset="UTF-8" id="frmlogin" name="frmlogin" role="form" method="POST" action="./?action=processlogin">
      <img class="mb-4" src="./asset/img/logo-login.png" alt="" width="300" height="150">
      <h1 class="h3 mb-3 font-weight-normal text-center"><b>Login</b></h1>
      <label for="inputUsuario" class="sr-only">Usuario</label>
      <input type="number" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recordarme
        </label>
      </div>
      <input class="btn btn-lg btn-primary btn-block" id="btnenviar" class="btnenviar" type="submit" value="Iniciar sesion">
      <br />
      <div id="MensajeError">
     </div>
    </form>
    </div>
  </div>
 <?php } ?>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="./asset/js/function.js"></script>
<script src="./asset/js/sweetalert2.min.js"></script>
  <script src="./asset/js/bootstrap.min.js"></script>
  <script src="./asset/js/datatable.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.js"></script>

</body>
</html>
