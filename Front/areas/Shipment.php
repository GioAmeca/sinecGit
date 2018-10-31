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
	<title>DASHBOARD</title>
</head>
<body >
<?php 
     $Icon='fas fa-user-tie';
     $Titulo=' '.$_SESSION['nombre'].' '.$_SESSION['Apellido'];
     $carpeta='';
     include('../menu.php');
     include('../../Back/php/Conexion.php');
  ?>  





<!--Boostrap js-->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../../Back/Js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <!-- UIkit JS -->
   <script src="../../Back/Js/uikit.min.js"></script>
   <script src="../../Back/Js/uikit-icons.min.js"></script>
</body>
</html>