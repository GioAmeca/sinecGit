<?php

    

    function TablaGeneral($pedidos,$conexion){
       ?>
       <div style=" max-height: 300px; "  >
         <table  class="table" >

               <tr>
               	<th scope="col" style="text-align: center;">
               		Pedido
               	</th>
               	<th scope="col" style="text-align: center;">
               		Parte
               	</th>
                <th scope="col" style="text-align: center;">
                  Lote Viejo
                </th>
               	<th scope="col" style="text-align: center;">
               		Pidio
               	</th>
               	<th scope="col" style="text-align: center;">
               		Proyecto
               	</th>
               	<th scope="col" style="text-align: center;">
               		Hora
               	</th>
                <th scope="col" style="text-align: center;">
                  Estado
                </th>

               </tr>

            <?php
              foreach ($pedidos as $key) {
                     ?>
                       <tr >
                         <td style="text-align: center;">
                           <?php print $key[0]; //id?>
                         </td>
                         <td style="text-align: center;">
                           <?php print $key[1]; //parte?>
                         </td>
                         <td style="text-align: center;">
                           <?php print $key[7]; //LoteViejo?>
                         </td>
                         <td style="text-align: center;">
                           <?php whoCon($conexion,$key[2]); //Pedio?>
                         </td>
                         <td style="text-align: center;">
                           <?php print $key[5]; //proyecto ?>
                         </td>
                         <td style="text-align: center;">
                           <?php print $key[3]; //hora ?>
                         </td>
                                                 
                         <td style="text-align: center;">
                           <?php  switch ($key[6]) {
                             case '1':
                               print ('  <form action="#surti">
           <input type="text" name="id" value="'.$key[0].'" style="display: none;" >
           <input type="text" name="Con" value="" style="display: none;" >
           <input type="text" name="Estado" value="1" style="display: none;" >
            <input type="text" name="por" value="" style="display: none;" >
            <button type="submit" class="btn btn-success" >Surtir</button>
         </form>');
                               break;
                               case '2':
                               print ('  <form action="#surti">
           <input type="text" name="id" value="'.$key[0].'" style="display: none;" >
           <input type="text" name="Con" value="" style="display: none;" >
           <input type="text" name="Estado" value="2" style="display: none;" >
           <input type="text" name="por" value="" style="display: none;" >
            <button type="submit"  class="btn btn-light" ><i class="far fa-eye"></i> Surtido</button>
         </form>');
                               break;
                               case '3':
                               print ('  <form action="#surti">
           <input type="text" name="id" value="'.$key[0].'" style="display: none;" >
           <input type="text" name="Con" value="" style="display: none;" >
           <input type="text" name="Estado" value="3" style="display: none;" >
           <input type="text" name="por" value="" style="display: none;" >
            <button type="submit"  class="btn btn-danger" ><i class="far fa-eye"></i> Corto</button>
         </form>');
                               break;
                             case '4':
                               print ('  <form action="#surti">
           <input type="text" name="id" value="'.$key[0].'" style="display: none;" >
           <input type="text" name="Con" value="" style="display: none;" >
           <input type="text" name="Estado" value="4" style="display: none;" >
           <input type="text" name="por" value="" style="display: none;" >
            <button type="submit"  class="btn btn-warning" ><i class="far fa-eye"></i> Cancelado</button>
         </form>');
                               break;
                           } 
                                   
                                  
                                 
                                  //surtido?>
                         </td>
                       </tr>
                     <?php
              }
             ?>

         </table></div>

       <?php
    }
    function TablaSurtir($conexion,$pedido){
    foreach ($pedido as $key ) { }
      ?>

         <h2 align="center">Pedido</h2>
         <div class="uk-grid-medium" uk-grid>

           <div>
             <label for="id">Id: </label>
              <input type="text" name="id" disabled="" value="<?php print $key[0]; ?>">
              <br>
             <label for="Parte">Parte: </label>
              <input type="text" name="Parte" disabled="" value="<?php print $key[1]; ?>">
              <br>
              <label for="Parte">Lote Agotado: </label>
              <input type="text" name="Parte" disabled="" value="<?php  print $key[7];?>">
              <br>
              <label for="Parte">Linea: </label>
              <input type="text" name="Parte" disabled="" value="<?php print $key[4]; ?>">
              <br>
               <label for="Parte">Proyecto </label>
              <input type="text" name="Parte" disabled="" value="<?php print $key[5]; ?>">
              <br>
              <label for="Parte">Pidio: </label>
              <input type="text" name="Parte" disabled="" value="<?php whoCon($conexion,$key[2]); ?>">
              <br>
              <label for="Parte">Fecha y Hora  </label>
              <input type="text" name="Parte" disabled="" value="<?php print $key[3]; ?>">
           </div>
           <div>
            <form action="../../../Back/php/seguridad/VerificarUserA.php" method="POST">
             <label for="lote">Lote Surtido: </label>
              <input type="text" name="lote" required=""><br>
               <label for="cantidad">Cantidad: </label>
              <input type="number" name="cantidad" required=""><br>
              <label for="pass">Credencial: </label>
              <input type="password" name="pass"  required=""><br>
               <input type="text" name="id" value="<?php print $key[0]; ?>" style="display: none;">
              <input type="text" name="hacer" value="surtir" style="display: none;">
              <input type="text" name="parte"  value="<?php print $key[1]; ?>"style="display:none;">
              <button type="submit"  style="display:none;" ></button>
            </form>
           </div>
           <div>
             <div>
               <a class="uk-button uk-button-default" href="#modal-cancelar" uk-toggle>Cancelar</a>
               <div id="modal-cancelar" class="uk-flex-top" uk-modal>
                 <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                   <button class="uk-modal-close-default" type="button" uk-close></button>  
                     <form action="../../../Back/php/seguridad/VerificarUserA.php" method="POST">
                        <label for="pass">Credencial: </label>
                        <input type="password" name="pass"  required=""><br>
                        <input type="text" name="id" value="<?php print $key[0]; ?>" style="display: none;">
                        <input type="text" name="hacer" value="Cancelar" style="display: none;">
                        <button type="submit"  style="display:none;" ></button>
                     </form>
                </div>
               </div>
             </div>
             <div>
               <a class="uk-button uk-button-default" href="#modal-center" uk-toggle>Corto</a>
              <div id="modal-center" class="uk-flex-top" uk-modal>
                  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical"> 
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <form action="../../../Back/php/seguridad/VerificarUserA.php" method="POST">
                      <label for="pass">Credencial: </label>
                      <input type="password" name="pass"  required=""><br>
                      <input type="text" name="id" value="<?php print $key[0]; ?>" style="display: none;">
                      <input type="text" name="hacer" value="Corto" style="display: none;">
                      <button type="submit"  style="display:none;" ></button>
                    </form>
                 </div>
              </div>
             </div>
           </div>
         </div>
        
      <?php
    }

   function TablaSurtido($conexion,$pedido){
    foreach ($pedido as $key ) {}
      if ($_GET['Estado']==3) {
        print '<h2 align="center"> <a class="alert alert-danger" role="alert">Pedido Corto</a> </h2>';
      }
      if ($_GET['Estado']==4) {
        print '<h2 align="center"> <a class="alert alert-warning" role="alert">Pedido Cancelalo</a> </h2>';
      }
      ?>
         <div  >
          <h2 align="center"> Surtido</h2>
         <div uk-grid>
             
           <div >
             <label  for="id">Id: </label>
              <input  type="text" name="id" disabled="" value="<?php print $key[0]; ?>">
              <br>
             <label for="Parte">Parte: </label>
              <input type="text" name="Parte" disabled="" value="<?php print $key[1]; ?>">
              <br>
              <label for="Parte">Lote Agotado: </label>
              <input type="text" name="Parte" disabled="" value="<?php  print $key[7];?>">
              <br>
              <label for="Parte">Linea: </label>
              <input type="text" name="Parte" disabled="" value="<?php print $key[4]; ?>">
               <br>
              <label for="Parte">Proyecto </label>
              <input type="text" name="Parte" disabled="" value="<?php print $key[5]; ?>"><br>
              <label for="Parte">Pidio: </label>
              <input type="text" name="Parte" disabled="" value="<?php whoCon($conexion,$key[2]); ?>">
              <br>
              <label for="Parte">Fecha y Hora  </label>
              <input type="text" name="Parte" disabled="" value="<?php print $key[3]; ?>">
              
           </div>
           <div >
             
              
             <label for="lote">Lote Surtido: </label>
              <input type="text" name="lote" value="<?php print $key[10]; ?>" disabled><br>
               <label for="cantidad">Cantidad: </label>
              <input type="number" name="cantidad" disabled value="<?php print $key[8]; ?>"><br>
              <label for="Parte">Surtio: </label>
              <input type="text" name="Parte" disabled="" value="<?php whoCon($conexion,$key[9]); ?>">
              <br>
              <label for="Parte">Fecha de Surtido: </label>
              <input type="text" name="Parte" disabled="" value="<?php  print $key[11]; ?>">
             
              <br>
           </div>

         </div>
          </div>
        
      <?php
  }

  function lotes ($lotes){/*
    $clase2=525840;//minutos en un año
    $clase2a=40320;//minutos en 4 semanas
    $clase3=10080;//168 horas
    $clase4=4320;//72 horas
    $clase5=2880;//48 horas
    $clase5a=1440;//24 horas*/
    date_default_timezone_set('America/Mexico_City');
    $hoy=date('Y-m-d H:i:s');
   ?>
        <div>
          <table class="table" >
            <thead>
              <tr>
                <th>Lote</th>
                <th>Nivel MSD</th>
                <th>Abierto</th>
                <th>Cerrado</th>           
                <th>Tiempo Abierto</th>
                 
                <th>Estado</th>
                <th>Parte</th>
                <th>Descripcion</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($lotes as $key) {
                ?>
                  <tr>
                    <td><?php print $key[0];//lote ?></td>
                    <td><?php print $key[1];//nivel ?></td>
                    <td><?php print $key[3];//abierto ?></td>
                    <td><?php print $key[4];//cerrado ?></td>

                    <td><?php  
                    $datetime1 = new DateTime($key[3]);//defino fecha 1
                    $datetime2 = new DateTime($hoy);   //define fecha 2
                    $interval = $datetime1->diff($datetime2);
                    //print($interval->format('%Y/%M/%D/ %H:%I:%S- -'));
                    $Ms=($interval->format('%M'));
                    $D=($interval->format('%D'));
                    $H=($interval->format('%H'));
                    $M=($interval->format('%I'));
                    $S=($interval->format('%S'));//se determina el intervalo
                    
                    //se suma el intervalo con el tiempo ya abierto
                    $suma=$key[5];
                    $suma +=$Ms*43200;
                    $suma +=$D*1440;
                    $suma +=$H*60;
                    $suma +=$M;
                    $suma +=$S/60;
                    $suma=round($suma,2);
                   // print $suma;
                    $mes= round($suma/43200,0);//calcular el equivalentes a un mes
                    $dias=round($suma/1440,0)%30;//calcular el equivalentes a dias
                    $horas=round($suma/60,0)%24;//calcular equivalente a horas
                    $minutos=round($suma%60,0);
                    $segundos=($suma*60)%60;
                     print $mes.'M '.$dias.'D '.$horas.':'.$minutos.':'.$segundos;
                           
                     switch ($key[1]) {
                        case '1':
                          print ('<div class="progress">
  <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div>');
                          break;
                          case '2':
                              $porciento=round(($suma*100)/525840,0);
                              if ($porciento<=50) {
                                $alerta='success';
                              }
                              if ($porciento>=51 and $porciento<=75) {
                                $alerta='warning';
                              }
                              if ($porciento>=76 ) {
                                $alerta='danger';
                              }
                          print ('<div class="progress">
  <div class="progress-bar progress-bar-striped bg-'.$alerta.' progress-bar-animated" role="progressbar" style="width: '.$porciento.'%" aria-valuenow="'.$porciento.'" aria-valuemin="0" aria-valuemax="100"></div>
</div>');
                          break;
                          case '2A':
                              $porciento=round(($suma*100)/40320,0);
                              if ($porciento<=50) {
                                $alerta='success';
                              }
                              if ($porciento>=51 and $porciento<=75) {
                                $alerta='warning';
                              }
                              if ($porciento>=76 ) {
                                $alerta='danger';
                              }
                          print ('<div class="progress">
  <div class="progress-bar progress-bar-striped bg-'.$alerta.' progress-bar-animated" role="progressbar" style="width: '.$porciento.'%" aria-valuenow="'.$porciento.'" aria-valuemin="0" aria-valuemax="100"></div>
</div>');
                          break;
                          case '3':
                              $porciento=round(($suma*100)/10080,0);
                              if ($porciento<=50) {
                                $alerta='success';
                              }
                              if ($porciento>=51 and $porciento<=75) {
                                $alerta='warning';
                              }
                              if ($porciento>=76 ) {
                                $alerta='danger';
                              }
                          print ('<div class="progress">
  <div class="progress-bar progress-bar-striped bg-'.$alerta.' progress-bar-animated" role="progressbar" style="width: '.$porciento.'%" aria-valuenow="'.$porciento.'" aria-valuemin="0" aria-valuemax="100"></div>
</div>');
                          break;
                          case '4':
                              $porciento=round(($suma*100)/4320,0);
                              if ($porciento<=50) {
                                $alerta='success';
                              }
                              if ($porciento>=51 and $porciento<=75) {
                                $alerta='warning';
                              }
                              if ($porciento>=76 ) {
                                $alerta='danger';
                              }
                          print ('<div class="progress">
  <div class="progress-bar progress-bar-striped bg-'.$alerta.' progress-bar-animated" role="progressbar" style="width: '.$porciento.'%" aria-valuenow="'.$porciento.'" aria-valuemin="0" aria-valuemax="100"></div>
</div>');
                          break;
                          case '5':
                              $porciento=round(($suma*100)/2880,0);
                              if ($porciento<=50) {
                                $alerta='success';
                              }
                              if ($porciento>=51 and $porciento<=75) {
                                $alerta='warning';
                              }
                              if ($porciento>=76 ) {
                                $alerta='danger';
                              }
                          print ('<div class="progress">
  <div class="progress-bar progress-bar-striped bg-'.$alerta.' progress-bar-animated" role="progressbar" style="width: '.$porciento.'%" aria-valuenow="'.$porciento.'" aria-valuemin="0" aria-valuemax="100"></div>
</div>');
                          break;
                          case '5A':
                              $porciento=round(($suma*100)/1440,0);
                              if ($porciento<=50) {
                                $alerta='success';
                              }
                              if ($porciento>=51 and $porciento<=75) {
                                $alerta='warning';
                              }
                              if ($porciento>=76 ) {
                                $alerta='danger';
                              }
                          print ('<div class="progress">
  <div class="progress-bar progress-bar-striped bg-'.$alerta.' progress-bar-animated" role="progressbar" style="width: '.$porciento.'%" aria-valuenow="'.$porciento.'" aria-valuemin="0" aria-valuemax="100"></div>
</div>');
                          break;
                          case '6':
                          print ('<div class="progress">
  <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div>');
                          break;
                        
                        default:
                          # code...
                          break;
                      }    
                     ?></td>
                    
                   

                    <td><?php print $key[6];//Estado ?></td>
                    <td><?php print $key[7];//parte ?></td>
                    <td><?php print $key[2];//descripcion ?></td>
                    <td>
                     <a href="">Cerrar</a>
                     <a href="">Eliminar</a>
                     <a href="">Reset</a>
                    </td>
                  </tr>
                <?php
              }

               ?>
            </tbody>
          </table>
        </div>
   <?php     

  }

 ?>
