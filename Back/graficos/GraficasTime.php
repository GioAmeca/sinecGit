<?php 
    //grafica horizontal de tiempos muertos por dias de la semana 
   function SemanaBaraHorizontal($conexion){
  	    // codigo que optiene la fecha de hoy y 7 dias atras en formato Y-m-d
       date_default_timezone_set('America/Mexico_City');
  	    $sql=("SELECT sum(minute(minutos))+(sum(second(minutos))/60)+(sum(hour(minutos))*60), Fecha FROM produccion.tiempomuertos where Fecha='".date('Y-m-d')."' 
         union SELECT sum(minute(minutos))+(sum(second(minutos))/60)+(sum(hour(minutos))*60), Fecha FROM produccion.tiempomuertos where Fecha='".date('Y-m-d',strtotime('-1 day'))."'
         union SELECT sum(minute(minutos))+(sum(second(minutos))/60)+(sum(hour(minutos))*60), Fecha FROM produccion.tiempomuertos where Fecha='".date('Y-m-d',strtotime('-2 day'))."' 
         union SELECT sum(minute(minutos))+(sum(second(minutos))/60)+(sum(hour(minutos))*60), Fecha FROM produccion.tiempomuertos where Fecha='".date('Y-m-d',strtotime('-3 day'))."'
         union SELECT sum(minute(minutos))+(sum(second(minutos))/60)+(sum(hour(minutos))*60), Fecha FROM produccion.tiempomuertos where Fecha='".date('Y-m-d',strtotime('-4 day'))."' 
         union SELECT sum(minute(minutos))+(sum(second(minutos))/60)+(sum(hour(minutos))*60), Fecha FROM produccion.tiempomuertos where Fecha='".date('Y-m-d',strtotime('-5 day'))."'
         union SELECT sum(minute(minutos))+(sum(second(minutos))/60)+(sum(hour(minutos))*60), Fecha FROM produccion.tiempomuertos where Fecha='".date('Y-m-d',strtotime('-6 day'))."';");
       //print $sql;
  	    $tiempos="";
  	    try {
  		    $setenciaTime=$conexion->query($sql);
          foreach ($setenciaTime as $key) {     	
        		 $tiempos=$tiempos.$key[0].",";
          }
          // print $tiempos;
  	    } catch (Exception $e) {
  		    print 'consulta mal ejecutada'.$e;
  	    }
    // codigo que optiene la fecha de hoy y 7 dias atras en formato MMM-d 
    $dias='';
  	 for ($a=0; $a <7 ; $a++) { 
  		     $dias=$dias.'"'.date('M-d',strtotime('-'.$a.' day')).'",';
  	   }
    ?>
    <canvas id="grafico1"></canvas>
        <script>
            var ctx = document.getElementById("grafico1");
            var myChart = new Chart(ctx, {
                type: 'horizontalBar',
                data: {
                   labels: [<?php print $dias; ?>],
                   datasets: [{
                      label: 'Minutes Out/ week',
                      data: [<?php print $tiempos ?>],
                      backgroundColor: [
                         'rgba(255, 99, 132, 0.2)',
                         'rgba(54, 162, 235, 0.2)',
                         'rgba(255, 206, 86, 0.2)',
                         'rgba(75, 192, 192, 0.2)',
                         'rgba(153, 102, 255, 0.2)',
                         'rgba(255, 159, 64, 0.2)',
                         'rgba(28, 159, 64, 0.2)'
                       ],
                      borderColor: [
                         'rgba(255,99,132,1)',
                         'rgba(54, 162, 235, 1)',
                         'rgba(255, 206, 86, 1)',
                         'rgba(75, 192, 192, 1)',
                         'rgba(153, 102, 255, 1)',
                         'rgba(255, 159, 64, 1)',
                         'rgba(28, 159, 64, 1)'
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
         <h5 align="center">7 days ago</h5>
         <?php
   }//cierra funcion SemanaBaraHorizontal()

   //grafica de pastel tiempo trabajado, tiempo muertos
   function TiempoTrabajadoTiempoMuerto($conexion){
   	 
       try {
       	$sql=("");
       } catch (Exception $e) {
       	print 'Consulta para llenar grafica erronia'.$e;
       }
       ?>
           <canvas id="grafico2" ></canvas>
           <script type="text/javascript">
        	       var ctx = document.getElementById("grafico2");
                var myPieChart = new Chart(ctx,{
                    type: 'pie',
                    data: {labels: ['Tiempo Worked','Time Out'],
                         datasets: [{
                            data: [10, 90],
                            backgroundColor:['rgba(33,203,19,.5)','rgba(232,58,3,.5)'],
                            borderColor:['rgba(33,203,19,1)','rgba(232,58,3,1)']  
                          }],                    
                     }, 
                     
                });
           </script>
           <h5 align="center">This week</h5>
       <?php
   } //cierra funcion TiempoTrabajadoTiempoMuerto()
?>
