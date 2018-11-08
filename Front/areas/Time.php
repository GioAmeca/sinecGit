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
 	<div class="bodysito"  style="width: 360px; height: 1200px;">
 	  <h2 align="center">Registry</h2>
 	 	<div>
          <form style="padding-left: 10px;">
           <div>
        	<label for="dia"> Date <i class="far fa-calendar-alt"></i> </label>
        	<input type="Date" name="dia">
        	<div style="border-style: solid; padding-left: 10px;padding-top: 10px; max-width:240px; position: relative; left:55px; ">
        	   <label  > Start <i class="far fa-clock"></i></label>
        	   <input type="time" name="Hora" value="00:00:00" step="2"><br>
        	   <label  > End &nbsp;<i class="fas fa-clock"></i> </label>
        	   <input type="time" name="Hora2" value="00:00:00" step="2"><br>
        	   <label   > Total <i class="fas fa-stopwatch"></i> </label>
        	   <input type="time" name="Total" value="00:00:00" step="2" required="">
            </div>
            
           </div>
           <div>
           	<br>
           	  <label>Line  &nbsp; &nbsp; <i class="fas fa-industry"></i></label>
           	  <input type="text" name="linea"><br>
           	  <label>Area  &nbsp; &nbsp; <i class="fas fa-vector-square"></i></label>
           	  <input type="text" name="area"><br>
           	  <label>Equipment  <i class="fas fa-digital-tachograph"></i></i></label>
           	  <input type="text" name="maquina"><br>
           	  <label >Workforce <i class="fas fa-users-cog"></i></label>
           	  <input type="text" name="afectados">
           </div>
           <div>
           	  <label>Cause &nbsp;<i class="fas fa-exclamation-circle"></i></label>
           	  <input type="text" name="causa"><br>	
           	  <label>Type &nbsp; &nbsp;<i class="fas fa-code"></i></label>
           	  <input type="text" name="tipo"><br>
           	  <label>Responsible&nbsp; &nbsp;<i class="fas fa-user-shield"></i></i></label>
           	  <input type="text" name="tipo"><br>
           </div>  
           <button  type="submit"> save</button>
          </form>
        </div>	
        <br> 	
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