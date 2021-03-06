<!DOCTYPE html>
<html>
<head>

	<!--meta tags-->
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Boostrap css-->
    <link rel="stylesheet" type="text/css" href="Front/Css/bootstrap.min.css">
      <!-- UIkit CSS -->
    <link rel="stylesheet" href="Front/Css/uikit.min.css">
    <!--Icons css-->
    <link rel="stylesheet" type="text/css" href="Front/icon/css/all.css">
    <!--Css-->
    <link rel="stylesheet" type="text/css" href="Front/Css/stilos.css">
    <!-- font google-->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<title>Login</title>
</head>
<body >
 <div class="uk-animation-reverse uk-transform-origin-top-right" uk-scrollspy="cls: uk-animation-kenburns; repeat: true"  style="background-color:#dcdcdc;position: absolute; width: 100%; height: 100%; "> </div>
 <div style="background-image:  ;position: absolute; width: 100%; height: 100%; "> </div>
  
<div class="Menu">
   <input type="checkBox" name="cheMenu" id="cheMenu">

        <nav class="uk-navbar-container" uk-navbar style="background-color: #3C8DBC; height: 50px;" >
            <div style="position: absolute;top: 5px; left: 10px;">
                
                
               <label class="Logo-Blanco">
                  <img src="Front/img/sinec-white.svg" width="130">
               </label>
                                       
            </div>
            <div style="position: absolute;top: 9px; right: 10px;">
               <a href="construccion.php"><label class="Etiqueta-Menu">
                   <i class="fas fa-desktop"><b style="font-family: 'Raleway', sans-serif;"> It Crowd</b> </i>
               </label></a>                        
            </div>
        </nav>

    
</div>


<div class="uk-position-center " style="background-color: rgba(60, 141, 188, 0.4);  border-radius: 3%; position: static; max-height: 500px; max-width: 800px; top:300px; align-content: center;">
    <a id="icon-login"><i class="fas fa-users fa-5x"></i></a>

    <div style="margin: 30px;">
      <form action="Back/php/seguridad/VerificarUser.php" method="POST" >
                <label for="user" class="login-text">Usuario: <i class="fas fa-user-alt"></i></label><br>
      
                <input type="Text" name="user" id="user" placeholder="Nomina" size="32" autofocus required> <br>
                
                <label for="pass" class="login-text">Contraseña: <i class="fas fa-key"></i></label> <br>
               
                <input type="password" name="pass" id="pass" placeholder="Password" size="32" required><br><br>
                
                <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Entrar</button>&nbsp;&nbsp;&nbsp;

                <a href="//172.16.0.21" class="btn btn-light"><i class="fas fa-chevron-left"></i> Atras</a> &nbsp;&nbsp;
                <button type="button" href="#modal-Registro" class="btn btn-success" uk-toggle> <i class="fas fa-user-check"></i> Activate</button>            
         </form>
    </div>
   </div>
   
   

    <div id="modal-Registro" uk-modal >
    <div class="uk-modal-dialog"  >
        <a class="uk-modal-close-default"> <i class="far fa-times-circle fa-2x"></i></a>
        <div class="uk-modal-header" >
            <h2 class="uk-modal-title">Activa tu usuario <i class="fas fa-user-check" style="color:#18BD2B;"></i></h2>
        </div>
        <div class="uk-modal-body">
              
              <form action="Back/php/seguridad/activarUser.php" method="POST">  
                  <label for="Nomina" class="login-text">Nomina: <i class="far fa-address-card"></i></label>
                  <input type="Text" name="Nomina" id="Nomina" placeholder="Numero de nomina/usuario" style="position: absolute; left: 130px; " required><br>
                  <label for="Nombre" class="login-text" >Password: <i class="fas fa-key"></i></label>
                  <input type="Password" name="Password"   style="position: absolute; left: 130px; " required><br><label for="correo" class="login-text" >e-Mail: <i class="fas fa-at"></i></label>
                  <input type="mail" name="correo"  style="position: absolute; left: 130px; " required placeholder="gio@example.com" >
                 <!-- <input type="checkBox" id="NPassword" name="newpass" style="position: absolute; left: 110px;"> <br>
                  <div class="NewPass" >
                  <label  >New password:</label><br>
                  <input type="password" name="NewPass" placeholder="New Password"  style="position: absolute; left: 110px; "><br> 
                  <input type="password" name="NewPass2" placeholder="Repeat" style="position: absolute; left: 110px; "><br><br>
                  </div>
                -->
                  
<div class="uk-modal-footer uk-text-right">

            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="submit"><i class="far fa-save"></i> Save</button>
        </div>
              </form>
        </div>
        
    </div>
</div>
 <div style=" background-color: #3c8dbc; width: 100%; height: 80px; position: absolute;  bottom: 1px; " >
    <div class="uk-align-center" style=" color:#fff;  font-size: 10px; text-align: center;"  >
    <b>Created by <br> Geovanny Salazar Medina</b>
      <br>
      <a href="https://www.tecnm.mx/" class="pie"><img src="Front/img/TecNM.png" width="70"></a>
      <a href="http://www.tecmm.edu.mx/"class="pie"><img src="Front/img/TecMM.png" width="70"></a>
    </div> 
    </div>

  <!--Boostrap js-->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="Back/Js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- UIkit JS -->
   <script src="Back/Js/uikit.min.js"></script>
   <script src="Back/Js/uikit-icons.min.js"></script>
 <!--script para manejar notificaciones-->
    <script >
      var msg= getParameterByName('msg');
      switch(msg){
            case 'registrado':
               UIkit.notification({
               message: '<div class="alert alert-primary" role="alert"><b class="alert-link">Activated</b></div>',
               status: 'primary',
               pos: 'bottom-left',
               timeout: 5000
                }); 
            break;     
            case 'NewPass':
               UIkit.notification({
               message: '<div class="alert alert-primary" role="alert"><b class="alert-link">NewPass</b></div>',
               status: 'primary',
               pos: 'bottom-left',
               timeout: 5000
                }); 
            break;    
            case 'noregistrado':
                UIkit.notification({
                message: '<div class="alert alert-danger" role="alert"><b class="alert-link">Error when registering</b></div>',
                status: 'warning',
                pos: 'bottom-left',
                timeout: 5000
                });
            break;
            case 'datosMal':
                UIkit.notification({
                message: '<div class="alert alert-danger" role="alert"><b class="alert-link">User or password incorrect</b></div>',
                status: 'warning',
                pos: 'bottom-left',
                timeout: 5000
                });
            break;
            case 'yaRegitrado':
                UIkit.notification({
                message: '<div class="alert alert-warning" role="alert"><b class="alert-link">Existing user</b></div>',
                status: 'warning',
                pos: 'bottom-left',
                timeout: 5000
                });
            break;
            
      }
      
  
//funcion que ayuda a recoger el valor de las variables POST
    function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
</script>
</body>
</html>