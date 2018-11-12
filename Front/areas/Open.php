 <?php 
   session_start();
   if ($_SESSION['activa']!='yes') {
      header('Location:../../index.php');
   }
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
	<title>Open Accion</title>
</head>
<body >
  <?php 
     $Icon='fas fa-user-tie';
     $Titulo=' '.$_SESSION['nombre'].' '.$_SESSION['Apellido'];
     $carpeta='';
     include('../menu.php');
     include('../../Back/php/Conexion.php');
     include ('../../Back/php/Consulta/Consultas.php');
     include('../../Back/php/Tablas/TablaAcciones.php');
     include ('../../Back/php/fechas.php');
     include('../../Back/php/Consulta/Rapido.php');

  ?>
  <div class="bodysito" >	
     <nav class="uk-navbar-container" uk-navbar  style="padding-top: 5px; padding-left: 5px; padding-right: 5px; padding-bottom: 5px;">
       <div class="uk-navbar-left" uk-scrollspy="cls: uk-animation-slide-left;  repeat: true">
       
         <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i> New Action</button> 
         
           <form> &nbsp;
             <input type="text"  name="Con" value="4" style="display: none;">
             <input type="text" name="Ide"  style="display: none;">
             <input type="Text" placeholder="Something" name="busqueda" required>
             <button type="submit"  class="btn btn-primary" ><i class="fas fa-search"></i> Search </button>
           </form>
           &nbsp; or
          <form> &nbsp;
             <input type="text"  name="Con" value="5" style="display: none;">
             <input type="text" name="Ide"  style="display: none;">
               <select name="busqueda" required >
                 <datalist id="busqueda">
                   <!--se incrustan las opciones con el numero de nomina y nombre de los usuarios-->
                   <?php 
                      $conUser=who($conexion);
                      foreach ($conUser as $key) {   
                         print '<option value="'.$key[0].'">'.$key[1].' '.$key[2].'- '.$key[0].'</option>';     
                      } 
                   ?>  
                </datalist>
                  
                </select>
             <button type="submit"  class="btn btn-primary" ><i class="fas fa-search"></i> Search </button>
           </form>

       </div>
 
       <div class="uk-navbar-right" uk-scrollspy="cls: uk-animation-slide-right;" >
         <form>
           <button type="submit" class="btn btn-outline-secondary">All</button>&nbsp;
         </form> 
         <form>
           <input type="text" name="Con" value="1" style="display: none;">
           <input type="text" name="Ide"  style="display: none;">
           <button type="submit" class="btn btn-outline-primary">Open</button>&nbsp;
         </form> 
         <form>
           <input type="text" value="2" name="Con" style="display: none;">
           <input type="text" name="Ide"  style="display: none;">
           <button t type="submit" class="btn btn-outline-danger">Beaten</button> &nbsp;
         </form>
         <form>
    	     <input type="text" name="Con" value="3" style="display: none;">
    	     <input type="text" name="Ide"  style="display: none;">
           <button type="submit" class="btn btn-outline-success">Closed</button>
         </form>
       </div>
     </nav>
  </div>
  <br>

<!--tabla de las acciones-->
  <div class="bodysito"  uk-scrollspy="cls: uk-animation-fade;">
     <?php 
     
       $setencia=ConsultasAcciones($conexion);
       tablaAcciones($setencia,$conexion);
     ?>
  </div>
  <br>
  <!--consulta para generar reporte-->
  <div class="bodysito"  >
    <nav class="uk-navbar-container" uk-navbar >
      <div class="uk-navbar-right">
    <form action="../../Back/php/report/openactionExel.php" method="GET">
      <label> By Open Date; From</label>
      <input type="Date" name="From" required>
      <label>To</label>
      <input type="Date" name="To" required>
      <button type="submit" class="btn btn-info" ><i class="far fa-calendar-check"></i> Report</button>
    </form> &nbsp;&nbsp;
      </div>
    </nav>
  </div> <br>
  <!--datos de la accion a modificar-->
  <div class="bodysito">
    
 	     <?php
 	       $setencia1=ConsultaUnAccion($conexion);
         SeleccionarAccion($setencia1,$conexion);
 	     ?> 
       
       <p id="ancla"></p>
  </div>

  <!-- Modal de registro nueva Actividad-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Action</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="" style="padding-left: 30px;" >
             <label><b>Open Date: </b><?php print $hoy;?> Now </label> <br>
             <label><b>Who Open it: </b> <?php Print $_SESSION['nombre'].' '.$_SESSION['Apellido']; ?> </label>
             <br>
             <form action="../../Back/php/Crear/NuevaAccion.php" method="POST" >
                <input type="text" name="quienA" value="<?php print $_SESSION['nomina']; ?>" style="display: none;">
                 <label for="Accion"><b>Action:</b></label>
                 <input type="text" name="Accion" autofocus size="34" required><br>
                <label for="responsable"><b>Owner:</b></label>  
                <select name="responsable" required >
                 <datalist id="responsable">
                   <!--se incrustan las opciones con el numero de nomina y nombre de los usuarios-->
                   <?php 
                      $conUser=who($conexion);
                      foreach ($conUser as $key) {   
                         print '<option value="'.$key[0].'">'.$key[1].' '.$key[2].'- '.$key[0].'</option>';     
                      } 
                   ?>  
                </datalist>
                  
                </select>    
                <br>
                 <label><b>Due Date:</b></label>
                 <input type="Date" name="Due" required><br>
                <label for="quienc"><b>Who should close?:</b></label>
               <select name="quienc" required>
                <datalist >
                   <!--se incrustan las opciones con el numero de nomina y nombre de los usuarios-->
                   <?php 
                      $conUser=who($conexion);
                      foreach ($conUser as $key) {   
                         print '<option value="'.$key[0].'">'.$key[1].' '.$key[2].'- '.$key[0].'</option>';     
                      } 
                   ?>  
                </datalist>
              </select>
                <br>
                <label for="Comentario" ><b>Commentary:</b></label><br>
                <textarea name="Comentario" style="width: 332px; height: 100px;" ></textarea><br><br>        
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <br>
             </form>
          </div><br><br>

        </div>      
      </div>
    </div>
  </div>        
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
            case 'bien':
               UIkit.notification({
               message: '<div class="alert alert-primary" role="alert"><b class="alert-link">Action Save</b></div>',
               status: 'primary',
               pos: 'bottom-left',
               timeout: 5000
                }); 
            break;
            case 'bienClose':
               UIkit.notification({
               message: '<div class="alert alert-success" role="alert"><b class="alert-link">Closed Action </b></div>',
               status: 'primary',
               pos: 'bottom-left',
               timeout: 5000
                }); 
            break;
            case 'bienModificado':
               UIkit.notification({
               message: '<div class="alert alert-primary" role="alert"><b class="alert-link">Save Change</b></div>',
               status: 'primary',
               pos: 'bottom-left',
               timeout: 5000
                }); 
            break;
            case 'mal':
                UIkit.notification({
                message: '<div class="alert alert-danger" role="alert"><b class="alert-link">Error</b></div>',
                status: 'warning',
                pos: 'bottom-left',
                timeout: 5000
                });
            break;
            case 'malClose':
                UIkit.notification({
                message: '<div class="alert alert-warning" role="alert"><b class="alert-link">Unauthorized User</b></div>',
                status: 'warning',
                pos: 'top-center',
                timeout: 5000
                });
            break;
            case 'malModificado':
                UIkit.notification({
                message: '<div class="alert alert-warning" role="alert"><b class="alert-link">Failed to change</b></div>',
                status: 'warning',
                pos: 'bottom-center',
                timeout: 5000
                });
            break;
           case 'Notify':
               UIkit.notification({
               message: '<div class="alert alert-success" role="alert"><b class="alert-link"> Sent Notify </b></div>',
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