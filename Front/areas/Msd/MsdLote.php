<!DOCTYPE html>
<html>
<head>


	  <!--meta tags-->
    <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Boostrap css-->
    <link rel="stylesheet" type="text/css" href="../../Css/bootstrap.min.css">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="../../Css/uikit.min.css">
    <!--Icons css-->
    <link rel="stylesheet" type="text/css" href="../../icon/css/all.css">
    <!--Css-->
    <link rel="stylesheet" type="text/css" href="../../Css/stilos.css">
    <!-- font google-->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<title>MSD</title>
</head>
<body >
  <?php 
      $Icon='fas fa-user-tie';
     $Titulo='false';
     $carpeta='../';
     include('../../menu.php');
     include('../../../Back/php/Conexion.php');
     include ('../../../Back/php/Consulta/ConsultaMsd.php');
     include('../../../Back/php/Tablas/TablaMSD.php');
     include('../../../Back/php/Consulta/Rapido.php');
  ?>
        
      <div class="bodysito">
        <?php 
           $lotes=Consultalotes($conexion);
           lotes($lotes);
         ?>
      </div>



    <!--Boostrap js-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../../../Back/Js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- UIkit JS -->
    <script src="../../../Back/Js/uikit.min.js"></script>
    <script src="../../../Back/Js/uikit-icons.min.js"></script>
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