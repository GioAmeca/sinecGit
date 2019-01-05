<?php 
//funcion que genera una tabla con los datos generales de los tiempos caidos 
function TablaGeneral($setencia,$conexion){
    ?>
     
   <div>
   	<br>
   	<table class="table" style="position: relative; left: -40px; top: -20px; " >	
      <thead style="background-color: #dcdcdc; color: #000; a"  >
  		<tr >
  			<th  scope="col"><form action="#tabla" ><input type="text" style="display: none;" name="B" value="1"><input type="text" style="display: none;" name="id" value="<?php if ($_GET!=null) {print $_GET['id']; } ?>"><button class="btn btn-light" type="submit">#</button></form></th> 

  			<th scope="col"><form action="#tabla" ><input type="text" style="display: none;" name="B" value="2"><input type="text" style="display: none;" name="id" value="<?php if ($_GET!=null) {print $_GET['id']; } ?>"><button class="btn btn-light" type="submit">Proyecto</button></form></th>

  			<th scope="col"><form action="#tabla" ><input type="text" style="display: none;" name="B" value="3"><input type="text" style="display: none;" name="id" value="<?php if ($_GET!=null) {print $_GET['id']; } ?>"><button class="btn btn-light" type="submit">Linea</button></form></th>

  			<th scope="col"><form action="#tabla" ><input type="text" style="display: none;" name="B" value="4"><input type="text" style="display: none;" name="id" value="<?php if ($_GET!=null) {print $_GET['id']; } ?>"><button class="btn btn-light" type="submit">Equipo/ ID</button></form> </th>

  			<th scope="col"><form action="#tabla" ><input type="text" style="display: none;" name="B" value="5"><input type="text" style="display: none;" name="id" value="<?php if ($_GET!=null) {print $_GET['id']; } ?>"><button class="btn btn-light" type="submit">Turno</button></form></th>

  			<th scope="col"><form action="#tabla" ><input type="text" style="display: none;" name="B" value="6"><input type="text" style="display: none;" name="id" value="<?php if ($_GET!=null) {print $_GET['id']; } ?>"><button class="btn btn-light" type="submit">Fecha</button></form></th>

  			<th scope="col"><form action="#tabla" ><input type="text" style="display: none;" name="B" value="7"><input type="text" style="display: none;" name="id" value="<?php if ($_GET!=null) {print $_GET['id']; } ?>"><button class="btn btn-light" type="submit">Tiempo-Fuera</button></form></th>

        <th scope="col"><form action="#tabla" ><input type="text" style="display: none;" name="B" value="8"><input type="text" style="display: none;" name="id" value="<?php if ($_GET!=null) {print $_GET['id']; } ?>"><button class="btn btn-light" type="submit">Area</button></form></th>

  			<th scope="col"><form action="#tabla" ><input type="text" style="display: none;" name="B" value="9"><input type="text" style="display: none;" name="id" value="<?php if ($_GET!=null) {print $_GET['id']; } ?>"><button class="btn btn-light" type="submit">Problema</button></form></th>

  			<th scope="col"><form action="#tabla" ><input type="text" style="display: none;" name="B" value="10"><input type="text" style="display: none;" name="id" value="<?php if ($_GET!=null) {print $_GET['id']; } ?>"><button class="btn btn-light" type="submit">Aceptado</button></form> </th>	
       <!--<th scope="col"></th>-->
  		</tr>
  	</thead> 
    
  	<?php
        $B='0';
        if ($_GET!=null) {
          $B=$_GET['B'];
        }
       foreach ($setencia as $key) {
       	  print '<tr class="Filas">';
          	echo '<td >';
            echo ('
               <form action="#ancla1" method="GET">
      <input type="Text" name="id" style="display: none;" value="'.$key[0].'">
      <input type="Text" name="B" style="display: none;" value="'.$B.'">
      <button type="submit"  style="border: none; background: none; "><i class="far fa-eye"></i>'.$key[0].'</button>
    </form>
             ');
            echo "</td>";
            echo '<td >';
            echo $key[1];
            echo "</td>";
            echo '<td >';
            echo $key[2];
            echo "</td>";
            echo '<td >';
            echo $key[3];
            echo "</td>";
            echo '<td >';
            if ($key[5]==1) {
              $turno='Matutino';
            }
            if ($key[5]==2) {
              $turno='Vespertino';
            }
            if ($key[5]==3) {
              $turno='Nocturno';
            }
            echo $turno;
            echo "</td>";
            echo '<td >';
            echo $key[6];
            echo "</td>";
            echo '<td >';
            echo $key[10];
            echo "</td>";
            echo '<td >';
            echo $key[4];
            echo "</td>";
            echo '<td >';
            echo $key[12];
            echo "</td>";
            echo '<td >';
            if($_SESSION['nomina']== $key[20]and$key[21]==0){
                echo ('  <form action="../../Back/php/Modificar/AceptarTime.php" method="POST">
    <input type="text" name="id" style="display: none;" value="'.$key[0].'"><input type="text" name="B" style="display: none;" value="'.$key[0].'">
    <input type="text" name="res" style="display: none;" value="'.$key[20].'">
    <button type="Submit" class="btn btn-warning">Aceptar</button>
  </form>');
                }else{
                   if($key[21]==1){
                       echo ('<div class="alert alert-primary" role="alert">
                   Aceptado</div>');
                    }
                   if($key[21]==0){
                       echo ('<div class="alert alert-warning" role="alert">
                   Sin Aceptar</div>');
                    }
          }
            

            echo "</td>";

          
          	
          
        print '</tr>';  
       }
    ?>    
   	</table>
   </div>
	<?php
}
function TablaIndividual($setencia1,$conexion){
  if ($setencia1!=null) {
  
  foreach ($setencia1 as $key) {
   
  }
  ?>

  <form action="../../Back/php/Modificar/ModificarTiempo.php" id="3" method="POST"><h2 align="center" >Consulta del registro: <?php print $key[0]; ?></h2>
      <div uk-grid>

      <div>
        <label>ID: <?php print $key[0]; ?> </label>
        <input type="text" name="id" value="<?php print $key[0]; ?>" style="display:none;">
        <br>
        <label>Proyecto: <i class="fas fa-microchip"></i> </label>
        <input class="formTime" type="Text" name="Proyecto" value="<?php print $key[1]; ?>" required disabled ><br>
        <label>Linea: <i class="fas fa-industry"></i> </label>
        <input  class="formTime" type="number" name="Linea" value="<?php print $key[2]; ?>"required disabled><br>
        <label>Equipo / ID: <i class="fas fa-digital-tachograph"></i> </label>
        <input class="formTime" type="Text" name="Equipo" value="<?php print $key[3]; ?>"required disabled><br>
        <label>Area: <i class="fas fa-vector-square"></i> </label>
        <input class="formTime" type="Text" name="Area" value="<?php print $key[4]; ?>"required disabled><br>
        <label>Turno:</label>
         <select class="formTime" name="turno" required disabled >
                 <datalist id="turno">
                  <option value="1" <?php if ($key[5]==1) print 'selected';?> > Matutino </option> 
                  <option value="2" <?php if ($key[5]==2) print 'selected';?> > Vespertino </option>
                  <option value="3" <?php if ($key[5]==3) print 'selected';?> > Nocturno </option>
                </datalist>
                  
                </select>    <br>
        <label>Fecha: <i class="far fa-calendar-alt"></i> </label>
        <input class="formTime" type="date" name="Fecha" required value="<?php print $key[6]; ?>"><br>
        <div style="border-style: solid; max-width: 325px;">
           <br>
           <label>Reporte:<i class="far fa-flag"></i> </label>
           <input class="formTime" type="time" name="Reporte" required value="<?php print $key[7]; ?>" uk-tooltip="la hora se optiene al momento de guardar" disabled><br>
           <label>Iniciado: <i class="far fa-play-circle"></i> </label>
           <input class="formTime" type="time" name="inicio"  required value="<?php print $key[8]; ?>"><br>
           <label>Terminado: <i class="far fa-stop-circle"></i></label>
           <input class="formTime" type="time" name="Fin" required value="<?php print $key[9]; ?>"><br>
           <label>Tiempo-Fuera:  <i class="far fa-stop-circle"></i></label>
           <input class="formTime" type="time" name="Tiempo" required value="<?php print $key[10]; ?>" uk-tooltip="Se Calcula con las horas de iniciado y terminado" disabled><br>
      </div>
      <br>
      <label>Es intermitente <i class="fas fa-retweet"></i></label>
        <input class="formTime" style="left: 190px;" type="checkbox" name="intermitente" value="1" <?php if ($key[11]==1) print 'checked';?>><br>
         <input class="formTime" style="display: none;" type="checkbox" name="intermitente" value="0" <?php if ($key[11]==0) print 'checked';?> >
        <label>Problema: <i class="fas fa-exclamation-triangle"></i></label><br>
        <textarea name="problema" rows="3" cols="38" required><?php print $key[12]; ?></textarea>
      </div>

      <div> <br>
        <label>Causa y diagnostico: <i class="fas fa-file-signature"></i></label><br>
        <textarea name="Causa" rows="2" cols="38" placeholder="El Equipo dek se Apaga"required><?php print $key[13]; ?></textarea><br>
        <label>Accion correctiva: <i class="fas fa-wrench"></i></label><br>
        <textarea name="accion" rows="2" cols="38" placeholder="El Equipo dek se reinicia y se monitorea"required><?php print $key[14]; ?></textarea><br>
        <label>Comentario: <i class="far fa-comment-alt"></i></label><br>
        <textarea name="comentario" rows="2" cols="38" placeholder=""><?php print $key[15]; ?></textarea><br>
        <label>Refacciones utilizadas: <i class="fas fa-box-open"></i></label><br>
        <textarea name="partes" rows="2" cols="38" placeholder=""><?php print $key[16]; ?></textarea><br>
         <div style="position: relative; left: 80px;">
          <label>NO: #</label>
          <input type="number" name="numero" value="<?php print $key[17]; ?>"  size="10">
        </div>
          <label for="responsable"><b>Responsable:</b></label>
        <br>  
         <select name="responsable" required >
                 <datalist id="responsable">
                  <?php
                   $nomina=$key[20];

                  $conUser=who($conexion);
                   foreach ($conUser as $bb) {   
                         print '<option value="'.$bb[0];
                         if ($nomina==$bb[0]) {
                          print '"selected >'; 
                         }
                         else{print '">'; }
                         print $bb[1].' '.$bb[2].'- '.$bb[0].'</option>';   
                      
                      } 
                  ?>
                 </datalist>    
         </select>   
      </div>
      <div>
            <label>Reportante:</label>

            <input type="Text" name="reportente" disabled="" value="<?php whoCon($conexion,$key[18]);?>">
         <br>
          <label for="aceptado">Aceptado</label>
          <input type="Checkbox" disabled name="aceptado" <?php if ($key[21]=='1')print 'checked';?>> 
          <br><label> Fecha </label> <input style="position: relative; left: 21px;" type="date" name="" value="<?php print substr($key[22],0,10);?>"disabled>
          <br><label>Hora</label><input style="position: relative; left: 34px;" type="time" name="hora" value="<?php print substr($key[22],11);?>"disabled>
          <br><button type="submit" class="btn btn-lg btn-primary" ><i class="fas fa-save"></i> Editar</button>

          <br>
          <br>
           
                 <p class="alert alert-warning" width="10">Updated: <i class="fas fa-upload"></i> <?php print $key[23];?></p>
      </div>
    </div>
    </form>
  
    <div  style="position: relative; left: 80%; top: -50px;">
    
      <form action="../../Back/php/report/TimePdf.php" method="GET">
        <input type="text" name="id" value="<?php print $key[0]; ?>" style="display:none;">
        <input type="Text" name="reportente"  style="display:none;" value="<?php whoCon($conexion,$key[18]);?>">
        <input type="Text" style="display:none;" name="responsable"  value="<?php whoCon($conexion,$key[20]);?>">
        <button type="submit"  class="btn btn-success" ><i class="far fa-file"></i> Generar Reporte</button> 
      </form>
      
    </div>
  

<?php
}}

 ?>