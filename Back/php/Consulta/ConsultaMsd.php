<?php 
 //consulta que trae los datos generales de los pedidos generados      
  function ConsultaPedidos($cone){
      try {
        $sql=("SELECT * FROM produccion.peticion order by idPeticion desc;");
        $pedidos=$cone->query($sql);
      } catch (Exception $e) {
        print "Error al hacer la consulta".$e;
      }
      if ($_GET!=null) {
      	if ($_GET['Con']==0) {
      		 try {
        $sql=("SELECT * FROM produccion.peticion where Pieza like '%".$_GET['por']."%' or LoteViejo like '%".$_GET['por']."%' or Cantidad like '%".$_GET['por']."%' or linea like '%".$_GET['por']."%' or proyecto like '%".$_GET['por']."%' or LoteNuevo like '%".$_GET['por']."%' order by idPeticion desc;");
        $pedidos=$cone->query($sql);
      } catch (Exception $e) {
        print "Error al hacer la consulta".$e;
      }
      	}
      	if ($_GET['Con']==1) {
      		 try {
        $sql=("SELECT * FROM produccion.peticion order by idPeticion desc;");
        $pedidos=$cone->query($sql);
      } catch (Exception $e) {
        print "Error al hacer la consulta".$e;
      }
      	}
      	if ($_GET['Con']==2) {
      		 try {
        $sql=("SELECT * FROM produccion.peticion where Estado='2' order by idPeticion desc;");
        $pedidos=$cone->query($sql);
      } catch (Exception $e) {
        print "Error al hacer la consulta".$e;
      }
      	}
      	if ($_GET['Con']==3) {
      		 try {
        $sql=("SELECT * FROM produccion.peticion where Estado='3' order by idPeticion desc;");
        $pedidos=$cone->query($sql);
      } catch (Exception $e) {
        print "Error al hacer la consulta".$e;
      }
      	}
      	if ($_GET['Con']==4) {
      		 try {
        $sql=("SELECT * FROM produccion.peticion where Estado='4' order by idPeticion desc;");
        $pedidos=$cone->query($sql);
      } catch (Exception $e) {
        print "Error al hacer la consulta".$e;
      }
      	}
      }
      return($pedidos);
  }
  //funcion que trae la infomacion del un pedido
  function ConsultaPedido($cone,$id){
   try {
     $sql=("SELECT * FROM produccion.peticion where idPeticion=".$id.";");
     $pedido=$cone->query($sql);
   } catch (Exception $e) {
     print "Error al hacer la consulta".$e;  
      }
     return($pedido);
  }
  //funcion que trae los datos de los lotes y su tiempo de msd
   function Consultalotes($cone)
   {
    try {
      $lotes=$cone->query("SELECT * FROM produccion.lotes order by Estado desc;");
    } catch (Exception $e) {
      print "Error al consultar lotes".$e;
    }
    return($lotes);
   }
 ?>