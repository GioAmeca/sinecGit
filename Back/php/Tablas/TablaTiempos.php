<?php 
//funcion que genera una tabla con los datos generales de los tiempos caidos 
function TablaGeneral($setencia){
    ?>
     
   <div>
   	<br>
   	<table class="table" style="position: relative; left: -40px; top: -20px; " >	
      <thead style="background-color: #dcdcdc; color: #000; a"  >
  		<tr >
  			<th  scope="col">#</th> 
  			<th scope="col">Project</th>
  			<th scope="col">Line</th>
  			<th scope="col">Equipment/ID</th>
  			<th scope="col">Area</th>
  			<th scope="col">Innings</th>
  			<th scope="col">Date</th>
  			<th scope="col">Report</th>
  			<th scope="col">Initiated</th>
  			<th scope="col">Finished</th>
  			<th scope="col">Time-Stop</th>
            <th scope="col">Intermittent</th>
  			<th scope="col">Issue</th>
  			<th scope="col">Reporter</th>
  			<th scope="col">Accepted</th>
  			<th scope="col">Answerable</th>	
       <!--<th scope="col"></th>-->
  		</tr>
  	</thead> 
  	<?php
       foreach ($setencia as $key) {
       	  print '<tr class="Filas">';
          for ($i=0; $i < 16; $i++) { 
          	
          	switch ($i) {
          		case '0':
          			echo '<td >';
                    echo $key[$i];
                    echo "</td>";
          			break;
          		case '1':
          			echo '<td >';
                    echo $key[$i];
                    echo "</td>";
          			break;
          		case '2':
          			echo '<td >';
                    echo $key[$i];
                    echo "</td>";
          			break;
          		case '3':
          			echo '<td >';
                    echo $key[$i];
                    echo "</td>";
          			break;
          		case '4':
          			echo '<td >';
                    echo $key[$i];
                    echo "</td>";
          			break;
          		case '5':
          			echo '<td >';
                    echo $key[$i];
                    echo "</td>";
          			break;
          		case '6':
          			echo '<td >';
                    echo $key[$i];
                    echo "</td>";
          			break;
          		case '7':
          			echo '<td >';
                    echo $key[$i];
                    echo "</td>";
          			break;
          		case '8':
          			echo '<td >';
                    echo $key[$i];
                    echo "</td>";
          			break;
          		case '9':
          			echo '<td >';
                    echo $key[$i];
                    echo "</td>";
          			break;
          		case '10':
          			echo '<td >';
                    echo $key[$i];
                    echo "</td>";
          			break;
          		case '11':
          			echo '<td >';
                    echo $key[$i];
                    echo "</td>";
          			break;
          		case '12':
          			echo '<td >';
                    echo $key[$i];
                    echo "</td>";
          			break;
          		case '13':
          			echo '<td >';
                    echo $key[$i];
                    echo "</td>";
          			break;
          		case '14':
          			echo '<td >';
                    echo $key[$i];
                    echo "</td>";
          			break;
          		case '15':
          			echo '<td >';
                    echo $key[$i];
                    echo "</td>";
          			break;
          		default:
          			# code...
          			break;
          	}
          }
        print '</tr>';  
       }
    ?>    
   	</table>
   </div>

	<?php

}

 ?>