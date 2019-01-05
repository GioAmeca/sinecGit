<?php 
    //grafica horizontal de tiempos muertos por dias de la semana, 7 dias atras contando domingo 
   function SemanaBaraHorizontal($conexion){
  	    // codigo que optiene la fecha de hoy y 7 dias atras en formato Y-m-d
       //print date('Y-m-d');
       date_default_timezone_set('America/Mexico_City');
  	    $sql=("SELECT ROUND (sum(minute(minutos))+(sum(second(minutos))/60)+(sum(hour(minutos))*60)), Fecha FROM produccion.tiempomuertos where Fecha='".date('Y-m-d',strtotime('-6 day'))."' 
         union SELECT ROUND (sum(minute(minutos))+(sum(second(minutos))/60)+(sum(hour(minutos))*60)), Fecha FROM produccion.tiempomuertos where Fecha='".date('Y-m-d',strtotime('-5 day'))."'
         union SELECT ROUND (sum(minute(minutos))+(sum(second(minutos))/60)+(sum(hour(minutos))*60)), Fecha FROM produccion.tiempomuertos where Fecha='".date('Y-m-d',strtotime('-4 day'))."' 
         union SELECT ROUND (sum(minute(minutos))+(sum(second(minutos))/60)+(sum(hour(minutos))*60)), Fecha FROM produccion.tiempomuertos where Fecha='".date('Y-m-d',strtotime('-3 day'))."'
         union SELECT ROUND (sum(minute(minutos))+(sum(second(minutos))/60)+(sum(hour(minutos))*60)), Fecha FROM produccion.tiempomuertos where Fecha='".date('Y-m-d',strtotime('-2 day'))."' 
         union SELECT ROUND (sum(minute(minutos))+(sum(second(minutos))/60)+(sum(hour(minutos))*60)), Fecha FROM produccion.tiempomuertos where Fecha='".date('Y-m-d',strtotime('-1 day'))."'
         union SELECT ROUND (sum(minute(minutos))+(sum(second(minutos))/60)+(sum(hour(minutos))*60)), Fecha FROM produccion.tiempomuertos where Fecha='".date('Y-m-d')."';");
       
     //  print $sql;
  	    $tiempos="";
  	    try {
  		    $setenciaTime=$conexion->query($sql);
          foreach ($setenciaTime as $key) {     	
        		 $tiempos=$tiempos.$key[0].",";
          }
         // print "                d".$tiempos;
  	    } catch (Exception $e) {
  		    print 'consulta mal ejecutada'.$e;
  	    }
        // codigo que optiene la fecha de hoy y 7 dias atras en formato MMM-d 
       $dias='';
  	      for ($a=6; $a >=0 ; $a--) { 
  		     $dias=$dias.'"'.date('M-d',strtotime('-'.$a.' day')).'",';
  	      }
       // print $dias;
    ?>
    <canvas id="grafico1"></canvas>
        <script>
            var ctx = document.getElementById("grafico1");
            var myChart = new Chart(ctx, {
                type: 'line',

                data: {
                   labels: [<?php print $dias; ?>],
                   datasets: [{
                      label: 'Minutos  fuera/ semana',
                      data: [<?php print $tiempos; ?>0],
                      backgroundColor: [
                         'rgba(40, 116, 166,.5)'
                       ],
                       borderColor:['rgba(40, 116, 166,1)'],
                      pointRadius:['5','5','5','5','5','5','5'],
                   }]
                },
                options: {
                    scales: {
                         yAxes: [{
                            ticks: {
                               beginAtZero:true
                            }
                         }]
                     }
                }
            });
         </script>
         
         <?php
   }//cierra funcion SemanaBaraHorizontal()

   //grafica de pastel tiempo trabajado, tiempo muertos
   function TiempoTrabajadoTiempoMuerto($conexion){
    	date_default_timezone_set('America/Mexico_City');
   	  $dia=date('N');
   	  if (	$dia==7) {//si es 7 es domingo y no se labora y se le resta un dia para que la stencia sea de sabado a lunes
   	   	$dia--;
   	  }
   	 	$sql=("SELECT round(sum(minute(Minutos))+(sum(second(Minutos))/60)+(sum(hour(Minutos))*60)) FROM produccion.tiempomuertos where Fecha between '".date('Y-m-d',strtotime('-6 day'))."' and '".date('Y-m-d')."';");
   	 	//print $sql;
       try {
         $tiempomuerto=$conexion->query($sql);
          foreach ($tiempomuerto as $key ) {
               $tiempomuertos=$key[0];
          }
         
         print "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tiempo muerto: ".floor($tiempomuertos/60)." horas ".round(($tiempomuertos%60)). " minutos";
         
          $tiempotrabajado=round(((8640-$tiempomuertos)*100)/8640,2);
          $tiempomuertos=round(100-$tiempotrabajado,2);

       } catch (Exception $e) {
       	print 'Consulta para llenar grafica erronea'.$e;
       }
       ?>   

           <canvas id="grafico2" ></canvas>
           <script type="text/javascript">
        	       var ctx = document.getElementById("grafico2");
                var myPieChart = new Chart(ctx,{
                    type: 'pie',
                    data: {labels: ['Tiempo trabajado','Tiempo fuera'],
                         datasets: [{
                            data: [<?php print $tiempotrabajado.",".$tiempomuertos;?>],
                            backgroundColor:['rgba(33,203,19,.5)','rgba(232,58,3,.5)'],
                            borderColor:['rgba(33,203,19,1)','rgba(232,58,3,1)']  
                          }],                    
                     }, 
                     
                });
           </script>
           <h5 align="center"> <?php print $tiempotrabajado;?>% Tiempo trabajado en esta semana</h5>
         <?php
   } //cierra funcion TiempoTrabajadoTiempoMuerto()

   //grafica que trae tiempos muertos acomulados en la semana por turno 
   function TiempoMuertoPorTurno($conexion){
     //codigo que trae la suma de los tiempos muertos dividiendo por turnos 
     $sql=("SELECT round(sum(minute(Minutos))+(sum(second(Minutos))/60)+(sum(hour(Minutos))*60)) FROM produccion.tiempomuertos where Turno=1 and Fecha between '".date('Y-m-d',strtotime('-6 day'))."' and '".date('Y-m-d')."' union
      select round(sum(minute(Minutos))+(sum(second(Minutos))/60)+(sum(hour(Minutos))*60)) FROM produccion.tiempomuertos where Turno=2 and Fecha between '".date('Y-m-d',strtotime('-6 day'))."' and '".date('Y-m-d')."' union
      select round(sum(minute(Minutos))+(sum(second(Minutos))/60)+(sum(hour(Minutos))*60)) FROM produccion.tiempomuertos where Turno=3 and Fecha between '".date('Y-m-d',strtotime('-6 day'))."' and '".date('Y-m-d')."'");
     //print $sql;
     try {
       $contLinea=$conexion->query($sql);
       $tiempo="";
       foreach ($contLinea as $key) {
         $tiempo=$tiempo.$key[0].",";
       }
      //print $tiempo;
     } catch (Exception $e) {
        print "error al hacer la consulta";
     }
          ?>
           <canvas id="grafico3" ></canvas>
           <script type="text/javascript">
                 var ctx = document.getElementById("grafico3");
                  var myPieChart = new Chart(ctx,{
                    type: 'doughnut',
                    data: {labels: ['Matutino','Vespertino','Nocturno'],
                         datasets: [{
                            data: [<?php print($tiempo);?>],
                            backgroundColor:['rgba(199,0,57,.5)','rgba(255,195,0,.5)','rgba(88,24,69,.5)'],
                                borderColor:['rgba(199,0,57,1)','rgba(255,195,0,1)','rgba(88,24,69,1)']  
                          }],                    
                     }, 
                     
                });
           </script>
          
         <?php

   }//cierra funcion TiempoMuertoPorturno

   //funcion que muestra tiempos los lineas exixtentes
   function TiempoPorLinea($conexion){
      $sql=("SELECT distinct Linea FROM produccion.tiempomuertos where Fecha between '".date('Y-m-d',strtotime('-6 day'))."' and '".date('Y-m-d')."';");
     // print $sql;
      try {
        $linea=$conexion->query($sql);
        $lineas="";
        $tiempos="";
        foreach ($linea as $key) {
             $sql="SELECT round(sum(minute(Minutos))+(sum(second(Minutos))/60)+(sum(hour(Minutos))*60)) FROM produccion.tiempomuertos where linea=".$key[0]." and Fecha between '".date('Y-m-d',strtotime('-6 day'))."' and '".date('Y-m-d')."'";
             $tiempo=$conexion->query($sql);   
             foreach ($tiempo as $keys ) {
               $tiempos=$tiempos.$keys[0].",";
             }
            $lineas=$lineas."'linea ".$key[0]."', ";
        }
        //print $tiempos;
    //  print $lineas;
      } catch (Exception $e) {
        print("Error al consultar ");
      }
      //setencia para traer los tiempos muertos por linea en una semana 
      try {
        $sql=("");
      } catch (Exception $e) {
        
      }
    ?>
      <canvas id="grafico4"></canvas>
      <script type="text/javascript">
        var ctx= document.getElementById("grafico4");
        var grafico=new Chart(ctx,{
          type:'bar',
          data:{
            labels:[<?php print $lineas; ?>],
            datasets:[{
              label:'Tiempos muertos por linea',
              data:[<?php print $tiempos; ?>],backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
        });

      </script>
    <?php
   }//cierra funcion TiempoMuertoPorLine
?>
