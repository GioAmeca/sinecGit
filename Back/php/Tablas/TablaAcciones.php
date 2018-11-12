<?php 

   if ($_SESSION['activa']!='yes') {
      header('Location:../../index.php');
   }
 $Con='0';

 if ($_GET!=null) {
   $Con=$_GET['Con'];
   
 }



//Funcion que ayuda a imprimir una tabla Html con la informacion recogida de la base de datos de Acciones, la informacion se procesa de la siguiente forma; #.- numero de id de la accion. Action.- la accion como tal. Open, Due Date y Closed.- se recoje la fecha en la que fue creada, se debe de cerrar y fecha que se cerro - respectivamente- con el formato AAAA-MM-DD este de modo se manda al metodo trataFecha() del documento fechas.php que imprime la fecha en formato DD-mes-AAAA. Remaining.- se calcula los dias restantes para que el limited se cumpla. Estatus.- este campo se utilizar para decidir de que color se pondra la fila segunn su estado. Comentario.- cualquier comentario del usuario
function tablaAcciones($setencia,$cone){
       global $Con;
           ?>

           <!--Cabecera de la tabla se utiliza boostrap-->
   
  <table  class="table">
  	<thead style="background-color: #dcdcdc; color: #000;" >
  		<tr >
  			<th  scope="col">#</th> 
  			<th scope="col">Action</th>
  			<th scope="col">Open</th>
  			<th scope="col">Owner</th>
  			<th scope="col">Remaining</th>
  			<th scope="col">Due Date</th>
  			<th scope="col">Closed</th>
        <th scope="col"></th>
  			<th scope="col">Commentary</th>
       <!--<th scope="col"></th>-->
  		</tr>
  	</thead>   
    <!--termina cabecera de tabla -->
 <div>
          <?php 
       

          //se recore la respuesta de la consulta con el form mejorado 
    foreach ($setencia as $key ) {

         echo '  <tr class="Filas">';
  	   for ($i=0; $i < 9; $i++) {
            switch ($i) {
              case '0':
               echo '<td  >';
               echo $key[$i];
               echo "</td>";
              break;
              case '1':
       /* estatus 1==abierta pero a tiempo
                  2==abierta pero fuera de tiempo
                  3==cerrarda a tiempo
                  4==cerrada fuera de tiempo 
                  solo se contara el estado 1,2,3 y 4 se tiene que llevar a un estudio 
                 */  
               if ($key[6]==1) {
                 echo '<td> <div class="alert alert-primary">';
               }
               if ($key[6]==2) {
                  echo '<td> <div class="alert alert-danger" role="alert">';
               }
               if ($key[6]==3) {
                 echo '<td> <div class="alert alert-success" role="alert">';
               }
               echo $key[$i];
               echo "</div></td>";
              break;
              case '2':
               echo '<td >';
               tratoFecha($key[$i]);
               echo "</td>";
              break;
              case '3':
              
               echo '<td >';
               // la consulta de de open action trae como responsable solo el numero de 
               whoCon($cone,$key[$i]);
               //print $key[$i];
               echo "</td>";
              break;
              case '4':
               echo '<td>';
               //se calcula el tiempo en dias que resta para que la accion caduque 
               $fecha1= date_create( date('Y-m-d'));//fecha de hoy
               $fecha2=date_create( $key[4]);// fecha que debe cerrar
               $interval=date_diff($fecha1, $fecha2);//se hace el calculo
               $aux=$interval->format('%R%a');//auxiliar que ayudara calcular si la accion esta vencida
                 
               // si el status es uno indica que aun no se cierra y que se puede imprimir el tiempo restante sino se imprime "Close" en vez de. 
               if ($key[6]==1) {
               echo $interval->format('%R%a days');

               if ($aux<=0) {
               // print 'gio el papa';
                caduco($cone,$key[0]);// funcion que cambia de estado la accion 
               } 
                 
               }
               if ($key[6]==2) {
                echo "Beaten ".$interval->format('%R%a days');
               }
               if ($key[6]==3) {
                 echo "Closed ";
               }
               echo "</td>";

              break;
              case '5':
               echo '<td >';
               tratoFecha($key[4]);
               echo "</td>";
              break;
              case '6':
               echo '<td >';
               if ($key[5]==null) {
                echo '<form action="../../Back/php/Modificar/cerrar.php" method="POST">
      <input type="text" name="id" value="'.$key[0].'"  style="display: none;">
      <input type="text" name="quienc" value="'.$key[8].'" style="display:none;">
      <input type="text" name="quien" value="'.$_SESSION['nomina'].'" style="display:none;">

      <button type="submit" class="btn btn-success">Close</button>
    </form> ';
               } 
               else{
                tratoFecha($key[5]);
               }
               echo "</td>";
              break;
              case '7':
                $id=$key[0];
              echo "<td>";
               $busqueda='0';
               echo '<form action="#ancla" method="GET" >
                 <input type="text" name="busqueda" value="'.$busqueda.'" style="display: none;">
                 <input type="text" name="Con" value="'.$Con.'" style="display: none;">
                 <input type="text" name="Ide" value="'.$id.'" style="display:none;">
                 <button type="submit" id="BEditar" style="border: none; background: none;"> <i class="fas fa-edit"></i>
                 </button></form> 
              ';

              echo "</td>";
                break;
              case '8':
               echo '<td >';
               print $key[7];
               echo "</td>";
              break;
             /* case '8':
              $id=$key[0];
              echo "<td>";
               echo '<form  method="GET" >
                 <input type="text" name="E" value="Editar" style="display: none;">
                 <input type="text" name="Ide" value="'.$id.'" style="display:none;">
                 <button type="submit" id="BEditar" style="border: none; background: none;"> <i class="fas fa-edit"></i>
                 </button></form> 
              ';

              echo "</td>";
              break;*/

              default:
                # code...
                break;
            }
  	    }
        echo "</tr>";
    }
 ?>

   </table>

 <?php
}

//funcion que presenta la informacion de la accion que se modificara 
function SeleccionarAccion($setencia1,$cone){
  $nomina=$_SESSION['nomina'];
  global $Con;
if ($setencia1!=null) {
  print '<h2 style="position:relative; left: 45%; ">Change</h2>';
    foreach ($setencia1 as $key) {
             print  '<div class="container"><div class="row"> <div class="col" style="max-width: 350px;>';
             print '<label class="Editable" ><b>Id:</b/> '.$key[0].'</label> <br>';
             print '<label class="Editable" > <b> Action:</b/> '.$key[1].'</label> <br>';
             print '<label class="Editable" > <b> Who Open it: </b/>';
             whoCon($cone,$key[9]);
             print'</label> <br>';
             print '<label class="Editable" ><b>Open:</b/>&nbsp;</label>';
             tratoFecha($key[2]);
             print '<br><label class="Editable" > <b> Who should close?:</b/> ';
             whoCon($cone,$key[8]);
             print '</label> <br>';
             print '<label class="Editable" ><b>Closed:</b>&nbsp;</label>';
             tratoFecha($key[5]);
             // se rescatan los participantes de la accion para dar permiso de editar la accion
             $UOpen=$key[9];
             $UClose=$key[8];
             $UOwner=$key[3];
            print '</div>';
            print '<div class="col" style="max-width: 320px;" >
                <form action="../../Back/php/Modificar/ModificarAction.php">
                <input type="text" name="Con" value="'.$Con.'" style="display: none;">
                 <input type="text" name="Ide" value="'.$key[0].'" style="display:none;">
                 <label class="Editable" for="responsable">Owner:</label>
                <select name="responsable" required >
                <datalist >
                   <!--se incrustan las opciones con el numero de nomina y nombre de los usuarios-->';
            $conUser=who($cone);
            foreach ($conUser as $kes) {   
               print '<option value="'.$kes[0].'"';
               if ($key[3]==$kes[0] ){
                  print'selected';
               }
               print'>'.$kes[1].' '.$kes[2].'- '.$kes[0].'</option>';     
            } 
            print ' </datalist>
                    </select>
                    <label class="Editable" for="Due">Due Date:</label>
                    <input class="Editables" type="Date" name="Due" value="'.$key[4].'"><br>
                    <label class="Editable" for="comentario">Commentary:</label>
                    <textarea class="Editables" name="comentario"  style="width: 300px; height: 100px;" >'.$key[7].'</textarea>';
            if ($nomina==$UClose or $nomina==$UOpen or $nomina==$UOwner or $nomina=='Admin') {
                print'<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>'; 
             } 
            else{
              print '<a href="Open.php?Con='.$Con.'&Ide='.$_GET['Ide'].'&msg=malClose#ancla" class="btn btn-primary" style="text-decoration: line-through;"><i class="fas fa-save"></i> Save</a>';
            }
            print '</form>
                   <br>
                   </div> ';
            print '<div class="col" style="" >
                  <form action="../../Back/php/Mail/mailAdd.php" method="POST" >
                 <input type="text" name="Con" value="'.$Con.'" style="display: none;">
                 <input type="text" name="Ide" value="'.$key[0].'" style="display:none;">
                  <label class="Editable" for="notify">Notify:</label>
                  <select name="notify">
                  <datalist >
                 <!--se incrustan las opciones con el numero de nomina y nombre de los usuarios-->';
            $conUser=who($cone);
            foreach ($conUser as $kes) {   
               print '<option value="'.$kes[0].'"';
               if ($key[3]==$kes[0] ){
                  print'selected';
               }
               print'>'.$kes[1].' '.$kes[2].'- '.$kes[0].'</option>';     
            } 
            print '</datalist>
                   </select>';  

            print '&nbsp;<button type="submit" class="btn btn-primary"> Notify</button>';     
            print '<br><br><br><br><br><br><br><br>
                    </form><p class="alert alert-warning" width="10">Updated: '.$key[10].'</p>
                  </div> </div></div>';
     }
  } 
}
?>


