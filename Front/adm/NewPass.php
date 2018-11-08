 <?php 
   session_start();
   if ($_SESSION['nomina']==null) {
     header('Location:../../index.php');  
   }
   $nomina=$_SESSION['nomina'];
 ?>
<!DOCTYPE html>
<html>
<head>

  <!--meta tags-->
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Boostrap css-->
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
      <!-- UIkit CSS -->
    <link rel="stylesheet" href="../Css/uikit.min.css">
    <!--Icons css-->
    <link rel="stylesheet" type="text/css" href="../icon/css/all.css">
    <!--Css-->
    <link rel="stylesheet" type="text/css" href="../Css/stilos.css">
    <!-- font google-->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <title>New Password</title>
</head>
<body >
  <div class="Menu">
   <input type="checkBox" name="cheMenu" id="cheMenu">

        <nav class="uk-navbar-container" uk-navbar style="background-color: #3C8DBC; height: 50px;" >
            <div style="position: absolute;top: 5px; left: 10px;">
                
                
               <label class="Logo-Blanco">
                  <img src="../img/sinec-white.svg" width="130">
               </label>
                                       
            </div>
            <div style="position: absolute;top: 9px; right: 10px;">
               <a href="../construccion.php"><label class="Etiqueta-Menu">
                   <i class="fas fa-desktop"><b style="font-family: 'Raleway', sans-serif;"> It Crowd</b> </i>
               </label></a>                        
            </div>
        </nav>

    
</div>
 <div   style="background-color:#dcdcdc;position: absolute; width: 100%; height: 100%; "> </div>
 <div style="background-image:  ;position: absolute; width: 100%; height: 100%; "> </div>
  

<div class="uk-position-center " style="background-color: rgba(60, 141, 188, 0.4);  border-radius: 3%; position: static; max-height: 500px; max-width: 800px; top:300px; align-content: center;">
    <a id="icon-login"><i class="fas fa-lock fa-5x"></i></a>
<br>
    <div style="margin: 30px;">
      <form action="NewPass.php" method="POST" >
       <label  >New password:</label><br>
                  <input type="password" name="NewPass" placeholder="New Password" ><br> <br>
                  <input type="password" name="NewPass2" placeholder="Repeat" ><br><br>
                <button type="submit" class="btn btn-primary">Save Charge</button>&nbsp;&nbsp;&nbsp;

               <a href="../../index.php?msg=PassNew"> <button type="button"  class="btn btn-success">Keep</button> </a>           
         </form>
    </div>
   </div>

<?php 

$nomina=$_SESSION['nomina'];
require_once('../../Back/php/Conexion.php');

if($_POST['NewPass']!=null ) {
  if ($_POST['NewPass']==$_POST['NewPass2']) {
    try {
      $sql=("UPDATE `produccion`.`usuario` SET `Contrasena` = '".$_POST['NewPass']."' WHERE (`NumeroNomina` = '".$nomina."');
");

      $update=$conexion->query($sql);
      
     session_destroy();
     header('Location:../../index.php?msg=NewPass');
     } catch (Exception $e) {
      print'Error al actualizar la contraceña';
     }
   
  }
  else{
    header('Location:NewPass.php?msg=NoCoinsiden');
  }
 
}
?>

   

  <!--Boostrap js-->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../../Back/Js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- UIkit JS -->
   <script src="../../Back/Js/uikit.min.js"></script>
   <script src="../../Back/Js/uikit-icons.min.js"></script>
    <!--script para manejar notificaciones-->
    <script >
      var msg= getParameterByName('msg');
      switch(msg){   
            case 'NoCoinsiden':
               UIkit.notification({
               message: '<div class="alert alert-primary" role="alert"><b class="alert-link">NewPass</b></div>',
               status: 'primary',
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
