<?php
session_start(); 
if ($_SESSION['activa']!='yes') {
	header('Location:../../login.php');
}
include_once('../../Back/php/Tablas/TablaTiempos.php');
include_once('../../Back/php/Conexion.php');
include_once('../../Back/php/Consulta/ConsultasTime.php');
include_once('../../Back/graficos/GraficasTime.php');
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
<div uk-grid="center" >
  <!--registro de tiempo muerto-->
 	<div class="bodysito1" style="width: 740px; min-width: 420px;   left: 10%; "  >
    <h1 align="center" >Registro</h1>
    <form uk-grid  style="padding-top: 15px; padding-left: 3px;" action="../../Back/php/Crear/NuevoTimeOut.php" method="GET">
      <div  style=" width: 360px; border-right:  solid; ">
      	<label>Proyecto: <i class="fas fa-microchip"></i> </label>
        <input class="formTime" type="Text" name="Proyecto" placeholder="Jabil" required><br>
        <label>Linea: <i class="fas fa-industry"></i> </label>
        <input  class="formTime" type="number" name="Linea" placeholder="Line 2"required><br>
        <label>Equipo / ID: <i class="fas fa-digital-tachograph"></i> </label>
        <input class="formTime" type="Text" name="Equipo" placeholder="DEK"required><br>
        <label>Area: <i class="fas fa-vector-square"></i> </label>
        <input class="formTime" type="Text" name="Area" placeholder="Procesos"required><br>
        <label>Turno:</label>
         <select class="formTime" name="turno" required  >
                 <datalist id="turno">
                  <option value="1"> Matutino </option> 
                  <option value="2"> Vespertino </option>
                  <option value="3"> Nocturno </option>
                </datalist>
                  
                </select>    <br>
        <label>Fecha: <i class="far fa-calendar-alt"></i> </label>
        <input class="formTime" type="date" name="Fecha" required value="<?php  date_default_timezone_set('America/Mexico_City'); print date('Y-m-d'); ?>"><br>
        <div style="border-style: solid; max-width: 325px;">
           <br>
           <label>Reporte:<i class="far fa-flag"></i> </label>
           <input class="formTime" type="time" name="Reporte" required value="<?php print date('H:i');?>" uk-tooltip="la hora se optiene al momento de guardar" disabled><br>
           <label>Iniciado: <i class="far fa-play-circle"></i> </label>
           <input class="formTime" type="time" name="inicio"  required value="<?php print date('H:i');?>"><br>
           <label>Terminado: <i class="far fa-stop-circle"></i></label>
           <input class="formTime" type="time" name="Fin" required value="<?php print date('H:i');?>"><br>
           <label>Tiempo-Fuera:  <i class="far fa-stop-circle"></i></label>
           <input class="formTime" type="time" name="Tiempo" required value="00:00" uk-tooltip="Se Calcula con las horas de iniciado y terminado" disabled><br>
        </div>
        <br>
        <label>Es intermitente <i class="fas fa-retweet"></i></label>
        <input class="formTime" style="left: 190px;" type="checkbox" value="1" name="intermitente"> 
        <input class="formTime" style="display: none;" type="checkbox" value="0" checked="" name="intermitente">
        <br>
        <label>Problema: <i class="fas fa-exclamation-triangle"></i></label><br>
        <textarea name="problema" rows="3" cols="38" placeholder="El Equipo se Apaga"required></textarea>
      </div>
        <div >
        <label>Causa y diagnostico: <i class="fas fa-file-signature"></i></label><br>
        <textarea name="Causa" rows="2" cols="38" placeholder="El Equipo dek se Apaga"required></textarea><br>
        <label>Accion correctiva: <i class="fas fa-wrench"></i></label><br>
        <textarea name="accion" rows="2" cols="38" placeholder="El Equipo dek se reinicia y se monitorea"required></textarea><br>
        <label>Comentario: <i class="far fa-comment-alt"></i></label><br>
        <textarea name="comentario" rows="2" cols="38" placeholder=""></textarea><br>
        <label>Refacciones utilizadas: <i class="fas fa-box-open"></i></label><br>
        <textarea name="partes" rows="2" cols="38" placeholder=""></textarea><br>
        <div style="position: relative; left: 80px;">
          <label>NO: #</label>
          <input type="number" name="numero" value="0" size="10">
        </div>
        
        <label for="responsable"><b>Responsable:</b></label>
        <br>  

                <select name="responsable" required >
                 <datalist id="responsable">
                   <!--se incrustan las opciones con el numero de nomina y nombre de los usuarios-->
                   <?php 
                   include('../../Back/php/Conexion.php');
                   include('../../Back/php/Consulta/Rapido.php');
                      $conUser=who($conexion);
                      foreach ($conUser as $key) {   
                         print '<option value="'.$key[0].'">'.$key[1].' '.$key[2].'- '.$key[0].'</option>';     
                      } 
                   ?>  
                </datalist>
                  
                </select>    
           <br> <br>
          <input type="text" name="usuario" value="<?php print ($_SESSION['nomina']);?>" style="display: none;">
          <input type="text" name="B" value="<?php if($_GET!=null){print $_GET['B'];}else{print "0";}?>" style="display: none;">
          <input type="text" name="id" value="<?php if($_GET!=null){print $_GET['id'];}?>" style="display: none;">
           <button style="position: relative; left: 200px; top: 3px;" type="submit" class="btn btn-primary" name=""><i class="fas fa-save"></i> Guardar</button>
           <br><br>
        </div>
      </form>
 	</div>
  <div style=""></div><!--espacio entre registro y graficas-->
  <!--graficas rapidas-->
  <div class="bodysito1" style=" width: 740px; min-height: 660px; left: 10%; " >
    <h2 align="center" >7 dias atras</h2>
  <div uk-grid>
    <script src="../../Back/Js/Chart/dist/Chart.min.js"></script>
    <!--grafica de linea suma de tiempos fuera por dias, 7 dias atras-->
    <div style="width: 380px; height:330px; margin-left: -30px;     ">
      <h5 align="center">Por dias</h5>
      <?php
          SemanaBaraHorizontal($conexion);  ?>
    </div>
    <!--grafica de pai que muestra el porcentaje de tiempo trabajado por semana -->
    <div style="width: 380px; height:330px; ">
      <h5 align="center">% de minutos trabajados</h5>
      <?php TiempoTrabajadoTiempoMuerto($conexion);  ?>
    </div>
    <!--grafica de barras que muestra la suma de tiempos caidos por turno -->
    <div style="width: 380px; height:330px;  margin-left: -30px ">
      <h5 align="center">Por turnos</h5>
      <?php  TiempoMuertoPorTurno($conexion);  ?>
    </div>
    <!--grafica que muestra la suma de tiempos caidos por linea-->
    <div style="width: 380px; height:330px; ">
      <h5 align="center">Por Lineas</h5>
      <?php  TiempoPorLinea($conexion);  ?>
    </div>
  </div>
  </div>
</div>
<br>
<!--tabla de tiempos muertos-->

<div uk-grid>

<div class="bodysito" style="width: 1645px; height: 400px; left: 10%; "> 
  <a id="tabla"></a>
  <?php 
$setencia=ConsultaTiempos($conexion);
TablaGeneral($setencia,$conexion); ?> 
</div>

 
<div class="bodysito" style="width: 1645px; left: 10%; top: 22px; ">
    <form action="../../Back/php/report/TimeAll.php" method="GET">
      De <input type="Date" name="from"> a
      <input type="Date" name="to">
      <select  name="turno" required  >
                 <datalist id="turno">
                  <option value="1"> Matutino </option> 
                  <option value="2"> Vespertino </option>
                  <option value="3"> Nocturno </option>
                  <option value="4" selected=""> Todos</option>
                </datalist>
                  
                </select> 

      <button type="submit" class="btn btn-success" > <i class="far fa-file"></i> Generar</button>
    </form>
  </div>
</div> 
<div style="height:10px;" ></div> <!--espacion entre tabla y resusltado individual-->

<!--Muestra la informacion de un registro en especifico-->

  <div class="bodysito1" style="   ">
    <a id="ancla1"></a>
    <?php
       $B='0';
       
      $setencia1=ConsultaTiempoIndividual($conexion);
      TablaIndividual($setencia1,$conexion);
    
    ?>
    
  </div>
  

     <div style="height:50px;" ></div>
 <!--Boostrap js-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../../Back/Js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- UIkit JS -->
    <script src="../../Back/Js/uikit.min.js"></script>
    <script src="../../Back/Js/uikit-icons.min.js"></script>
 </body>
   <script >
      var msg= getParameterByName('msg');
      switch(msg){
            case 'TimeSave':
               UIkit.notification({
               message: '<div class="alert alert-primary" role="alert"><b class="alert-link">Requisicion Guardada</b></div>',
               status: 'primary',
               pos: 'bottom-left',
               timeout: 5000
                }); 
            break;
            case 'TimeSaveError':
                UIkit.notification({
                message: '<div class="alert alert-danger" role="alert"><b class="alert-link">Error al guardar</b></div>',
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
 </html>