<!DOCTYPE html>
<html>
<head>
  <!--meta tags-->
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Boostrap css-->
    <link rel="stylesheet" type="text/css" href="Css/bootstrap.min.css">
      <!-- UIkit CSS -->
    <link rel="stylesheet" href="Css/uikit.min.css">
    <!--Icons css-->
    <link rel="stylesheet" type="text/css" href="icon/css/all.css">
    <!--Css-->
    <link rel="stylesheet" type="text/css" href="Css/stilos.css">
    <!-- font google-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"> 
  <title>Login</title>
</head>
<body >

<!--@html
    Codigo para generar la una barra de navegacion 
    Requiere de: $Icon  tiene el nombre del icon de awesome a utilizar
                 $Titulo  Tiene el nombre del usuario que inicio session
 -->
 <div class="Menu">
   <!--CheMenu es el input que funciona como activador del menu vertical-->
   <input type="checkBox" name="cheMenu" id="cheMenu">
   <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
        <nav class="uk-navbar-container" uk-navbar style=" background-color: #3c8dbc; height: 50px;" >
            <div style="position: absolute;top: 9px; left: 10px;"> 
               <label  for="cheMenu" id="Etiqueta-Menu">
                   <i class="fas fa-bars" >
                      <b style="font-family: 'Source Sans Pro', sans-serif;"> MENU</b> 
                   </i>
               </label>                                 
            </div>
            <div style="position: absolute;top: 9px; right: 40%;">
               <label >
                   <p id="Etiqueta-Menu"><i class="'.$Icon.'"><b >'.$Titulo.'</b> </i></p>
               </label>         
               <div uk-dropdown>
                  <ul class="uk-nav uk-dropdown-nav">
                      <li class="uk-active">
                         <a href="../../Back/php/CSESSION.php">Disable</a>
                      </li>
                  </ul>
               </div>                       
            </div>
            <div style="position: absolute;top: 9px; right: 10px;">
               <label id="Etiqueta-Menu">
                   <i class="fas fa-desktop">
                       <b style="font-family: 'Source Sans Pro', sans-serif;"> It Crowd</b> 
                   </i>
               </label>                        
            </div>
        </nav>
   </div>
 <!-- Contenedor del menu vertical tiene dos estados 
      un corto donde solo se muestra iconos y un largo 
      donde muestra iconos y texto
  -->
 <div class="ContenedorMenu" >
   <ul class="Lista">
            <a href="" class="menuLargo" style="color:#fff; position: absolute; right: 30px;" ><li> <i class="fas fa-times"></i></li ></a> <br><br>
            <a href="'.$carpeta.'Open.php"><li class="menuCorto">  <i class="fas fa-clipboard-check fa-"></i><label class="menuLargo">  &nbsp;  &nbsp; Open Action</label></li ></a> <br>
             <a href="'.$carpeta.'Shipment.php"><li class="menuCorto"><i class="fas fa-box-open fa-"></i><label class="menuLargo">  &nbsp;  &nbsp; Shipment</label></li ></a><br>
             <a href="'.$carpeta.'Out.php"><li class="menuCorto"><i class="fas fa-plane-departure fa-"></i><label class="menuLargo">  &nbsp;  &nbsp; Output</label></li ></a><br>
             <a href="'.$carpeta.'Time.php"><li class="menuCorto"><i class="far fa-clock fa-"></i><label class="menuLargo">  &nbsp;  &nbsp; Time-Out</label></li ></a><br>
             <a href="'.$carpeta.'SPI.php"><li class="menuCorto"><i class="fas fa-search fa-"></i><label class="menuLargo">  &nbsp;  &nbsp; Solder Paste <br> Inspection<br></label></li ></a><br>
             <a href="'.$carpeta.'AOI.php"><li class="menuCorto"><i class="far fa-eye fa-"></i><label class="menuLargo">  &nbsp;  &nbsp; Automatic Optical <br> Inspection</label></li ></a><br>
             <a href="'.$carpeta.'SMT.php"><li class="menuCorto"><i class="fas fa-search-location fa-"></i><label class="menuLargo">  &nbsp;  &nbsp; Surface Mounth <br>Tecnology</label></li ></a><br>
   </ul>
 </div>
</div>

<!--Boostrap js-->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../Back/Js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- UIkit JS -->
   <script src="../Back/Js/uikit.min.js"></script>
   <script src="../Back/Js/uikit-icons.min.js"></script>
</body>
</html>
































