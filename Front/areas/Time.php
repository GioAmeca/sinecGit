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
 	<title>Time Out</title>

 </head>
 <body>
 	<?php 
      //$Icon='fas fa-user-tie';
      $Titulo=' '.$_SESSION['nombre'].' '.$_SESSION['Apellido'];
      $carpeta='';
      include('../menu.php');
 	 ?>
 	<div class="bodysito1" style="width: 760px;" >
    <h1 align="center" >Registry</h1>
    <form uk-grid style="padding-top: 15px; padding-left: 15px;" action="../../Back/php/Crear/NuevoTimeOut.php" method="GET">
      <div style=" width: 400px; border-right:  solid;">
      	<label>Project: <i class="fas fa-microchip"></i> </label>
        <input class="formTime" type="Text" name="Proyecto" placeholder="Jabil" required><br>
        <label>Line: <i class="fas fa-industry"></i> </label>
        <input  class="formTime" type="Text" name="Linea" placeholder="Line 2"required><br>
        <label>Equipment / ID: <i class="fas fa-digital-tachograph"></i> </label>
        <input class="formTime" type="Text" name="Equipo" placeholder="DEK"required><br>
        <label>Area: <i class="fas fa-vector-square"></i> </label>
        <input class="formTime" type="Text" name="Area" placeholder="Procesos"required><br>
        <label>Innings:</label>
        <input class="formTime" type="text" name="turno" placeholder="2, Vespertino"required><br>
        <label>Date: <i class="far fa-calendar-alt"></i> </label>
        <input class="formTime" type="date" name="Fecha" required><br>
        <div style="border-style: solid; max-width: 325px;">
           <br>
           <label>Report:<i class="far fa-flag"></i> </label>
           <input class="formTime" type="time" name="Reporte" step="2" required><br>
           <label>Initiated: <i class="far fa-play-circle"></i> </label>
           <input class="formTime" type="time" name="inicio" step="2" required><br>
           <label>Finished: <i class="far fa-stop-circle"></i></label>
           <input class="formTime" type="time" name="Fin" step="2" required><br>
           <label>Time-Stop:  <i class="far fa-stop-circle"></i></label>
           <input class="formTime" type="time" name="Tiempo" step="2" required><br>
        </div>
        <br>
        <label>It is intermittent <i class="fas fa-retweet"></i></label>
        <input class="formTime" type="checkbox" name="intermitente" value="1"><br>
        <label>Issue: <i class="fas fa-exclamation-triangle"></i></label><br>
        <textarea name="problema" rows="3" cols="38" placeholder="El Equipo se Apaga"required></textarea>
        </div>
        <div>
        <label>Cause and diagnosis: <i class="fas fa-file-signature"></i></label><br>
        <textarea name="Causa" rows="2" cols="38" placeholder="El Equipo dek se Apaga"required></textarea><br>
        <label>Corrective action: <i class="fas fa-wrench"></i></label><br>
        <textarea name="accion" rows="2" cols="38" placeholder="El Equipo dek se reinicia y se monitorea"required></textarea><br>
        <label>Comment: <i class="far fa-comment-alt"></i></label><br>
        <textarea name="comentario" rows="2" cols="38" placeholder=""></textarea><br>
        <label>Used spares
: <i class="fas fa-box-open"></i></label><br>
        <textarea name="partes" rows="2" cols="38" placeholder=""></textarea><br>
        <div style="position: relative; left: 169px;">
          <label>NO: #</label>
          <input type="text" name="numero" size="10"></div><br>
          <input type="text" name="usuario" value="<?php print ($_SESSION['nomina']);?>" style="display: none;">
           <input type="submit" name="">
        </div>
      </form>

 	</div>

  <!--Boostrap js-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../../Back/Js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- UIkit JS -->
    <script src="../../Back/Js/uikit.min.js"></script>
    <script src="../../Back/Js/uikit-icons.min.js"></script>
 </body>
 </html>