
<!--@html
    Codigo para generar la una barra de navegacion 
    Requiere de: $Icon  tiene el nombre del icon de awesome a utilizar
                 $Titulo  Tiene el nombre del usuario que inicio session
 -->
 <div class="Menu">
   <!--CheMenu es el input que funciona como activador del menu vertical-->
   
   <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
        <nav class="uk-navbar-container" uk-navbar style=" background-color: #3c8dbc; height: 50px;" >
            <div style="position: absolute;top: 9px; left: 10px;"> 
              <div class="d-none d-sm-block">
               <label  for="cheMenu" class="Etiqueta-Menu">
                   <i class="fas fa-bars" >
                      <b > MENU</b> 
                   </i>
               </label> 
             </div>     
             <!--menu para pantallas pequeñas-->
             <div class="d-block d-sm-none">
              <a href="../Data.php"for="cheMenu" class="Etiqueta-Menu">
             
                   <i class="fas fa-bars" >
                      <b > MENU</b> 
                   </i>
              </a>
             </div>                            
            </div>
            <div style="position: absolute;top: 9px; right: 40%;">
               <?php 
                 
                    if ($Titulo!='false') {
                ?>
               <label class="d-none d-sm-block">
                   <p class="Etiqueta-Menu"><i class="fas fa-user-tie"><b ><?php print $Titulo;?></b> </i></p>
               </label>         
                   <?php } ?>    
               <div uk-dropdown>
                  <ul class="uk-nav uk-dropdown-nav">
                      <li class="uk-active">
                         <a href="../../Back/php/seguridad/CSESSION.php"> <i class="fas fa-sign-out-alt"></i>Sign off</a>
                          <a href="../adm/NewPass.php">New Pass</a>
                      </li>
                  </ul>
               </div>                       
            </div>
             <div  class="d-block d-sm-none"style="position: absolute;top: 9px; right: 40%;">      
               <label>
                   <p class="Etiqueta-Menu"><i class="fas fa-user-tie"> </i></p>
               </label>         
               <div uk-dropdown>
                  <ul class="uk-nav uk-dropdown-nav">
                      <li class="uk-active">
                         <a href="../../Back/php/seguridad/CSESSION.php"> <i class="fas fa-sign-out-alt"></i>Sign off</a>
                          <a href="../adm/NewPass.php">New Pass</a>
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
  <div  class="d-none d-sm-block">   <input type="checkBox" name="cheMenu" id="cheMenu">
 <div class="ContenedorMenu" >

   <ul class="Lista">

            <a href="" class="menuLargo" style="color:#fff; position: absolute; right: 30px;" ><li> <i class="fas fa-times"></i></li ></a> <br><br>
            <a <?php print'href="'.$carpeta.'Open.php"';?> ><li class="menuCorto">  <i class="fas fa-clipboard-check fa-"></i><label class="menuLargo">  &nbsp;  &nbsp; Open Action</label></li ></a> <br>
            <!--<i class="fas fa-clipboard-check fa-"></i>-->
            <a <?php print 'href="'.$carpeta.'Time.php"';?>><li class="menuCorto"><i class="far fa-clock fa-"></i><label class="menuLargo">  &nbsp;  &nbsp; Time-Out</label></li ></a><br>
            <a <?php print 'href="'.$carpeta.'Msd/Msd.php"';?>><li class="menuCorto"><i class="fas fa-umbrella"></i><label class="menuLargo">  &nbsp;  &nbsp; MSD</label></li ></a><br>
           
   </ul> 
 </div></div>

</div>
