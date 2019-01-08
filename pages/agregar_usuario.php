<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Inicio</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/signin.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css">


  </head>

  <body class="text-center">
    <form class="form-signin"  method="post" action="../modulos/agregar_usuario.php">

      <h1 class="h3 mb-3 font-weight-normal">Crear Usuario</h1>
      <div class="form-group">
        <label for="inputEmail" class="sr-only">Usuario</label>
        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required autofocus> 
      </div>
      <div class="form-group">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="pass_1" class="form-control" placeholder="Contraseña" name="password" required>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="pass_2" class="form-control" placeholder="Contraseña" name="password2" required>
      </div>
      
      
      
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="1" name="chk_admin"> administrador
        </label>
        
      </div>
      <p style="color : red;" hidden>Usuario o password incorrectos!</p>
      <div><button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" id="crear">CREAR</button></div>
      <div class="mt-3 mb-3"><a href="index.php">Volver</a></div>

      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>

<script src="../vendor/jquery/jquery.min.js"></script>

  <script>
    $('#pass_1').keyup(function(){
      var _this = $('#pass_1');
      var pass_1 = $('#pass_1').val();
                      _this.attr('style', 'background:white');
      if(pass_1.charAt(0) == ' '){
      _this.attr('style', 'background:#FF4A4A');
      }
      
      if(_this.val() == ''){
      _this.attr('style', 'background:#FF4A4A');
      }
      });
      
      $('#pass_2').keyup(function(){
      var pass_1 = $('#pass_1').val();
      var pass_2 = $('#pass_2').val();
      var _this = $('#pass_2');
                      _this.attr('style', 'background:white');
      if(pass_1 != pass_2 && pass_2 != ''){
      _this.attr('style', 'background:#FF4A4A');
      $('#crear').prop('disabled',true); 
      }
      else{
        $('#crear').attr('disabled',false); 
      }
      });
  
  </script>
</html>
