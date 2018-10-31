<?php  
print '
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
               <label  for="cheMenu" class="Etiqueta-Menu">
                   <i class="fas fa-bars" >
                      <b > MENU</b> 
                   </i>
               </label>                                 
            </div>
            <div style="position: absolute;top: 9px; right: 40%;">
               <label >
                   <p class="Etiqueta-Menu"><i class="'.$Icon.'"><b >'.$Titulo.'</b> </i></p>
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
               <a href=""><label class="Etiqueta-Menu">
                   <i class="fas fa-desktop">
                       <b > It Crowd</b> 
                   </i>
               </label> </a>                       
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
'; ?>