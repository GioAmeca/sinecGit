
<!DOCTYPE html>
<html>
<head>


	  <!--meta tags-->
    <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Boostrap css-->
    <link rel="stylesheet" type="text/css" href="../../Css/bootstrap.min.css">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="../../Css/uikit.min.css">
    <!--Icons css-->
    <link rel="stylesheet" type="text/css" href="../../icon/css/all.css">
    <!--Css-->
    <link rel="stylesheet" type="text/css" href="../../Css/stilos.css">
    <!-- font google-->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<title>MSD</title>
</head>
<body >
  <?php 
      $Icon='fas fa-user-tie';
     $Titulo='false';
     $carpeta='../';
     include('../../menu.php');
     include('../../../Back/php/Conexion.php');
     include ('../../../Back/php/Consulta/ConsultaMsd.php');
     include('../../../Back/php/Tablas/TablaMSD.php');
    
     include('../../../Back/php/Consulta/Rapido.php');
     

  ?>
        
  <div class="uk-grid-medium"  uk-grid>
    <div class="bodysito"  style="min-width: 230px; max-width: 240px;">	
      <br>
        <div align="Center" >
          <form>
           <button type="button" uk-toggle="target: #modal-example" class="btn btn-primary">Pedir </button>
          </form>
          <br>
          <a href="" class="btn btn-success" uk-toggle="target: #modal-surtir">Surtir sin pedido</a>
          <br><br>
          <a href="MsdLote.php"  class="btn btn-primary">Msd</a>
        </div>
        <div style="height:180px; ">
        </div>
        <div align="center">
         <form >
           <button type="button" uk-toggle="target: #modal-registroC" class="btn btn-secondary">Registrar Componente </button>
         </form>
         <br>
         <a class="btn btn-secondary" href="">Administracion</a>
        </div> 
    </div>  
    <div>
    </div>
    <div  >
       
      <div class="bodysito" style="width: 160vh; " >
        <h2 align="Center" >Pedidos</h2>
        
        <nav class="uk-navbar-container" uk-navbar  style="padding-top: 5px; padding-left: 5px; padding-right: 5px; padding-bottom: 5px;">
        <div class="uk-navbar-left" uk-scrollspy="cls: uk-animation-slide-left;">
          <form action="" method="get" accept-charset="utf-8">
            <input type="text" name="por" required="" placeholder="Cualquier cosa">
            <input type="text" name="id" value="" style="display: none;">
            <input type="text" name="Con" value="0" style="display: none;">
            <input type="text" name="Estado" value="" style="display: none;">
            <button type="submit" class="btn btn-info">Buscar</button>
          </form>
        </div>
        <div class="uk-navbar-right" uk-scrollspy="cls: uk-animation-slide-right;">
          <form action="" method="get" accept-charset="utf-8">
            <input type="text" name="id" value="" style="display: none;">
            <input type="text" name="Con" value="1" style="display: none;">
            <input type="text" name="Estado" value="" style="display: none;">
            <button type="submit" class="btn btn-secondary">Todo</button>
          </form>
           &nbsp;
          <form action="" method="get" accept-charset="utf-8">
            <input type="text" name="id" value="" style="display: none;">
            <input type="text" name="Con" value="2" style="display: none;">
            <input type="text" name="Estado" value="" style="display: none;">
            <button type="submit" class="btn btn-success">Surtidos</button>
          </form>
           &nbsp;
          <form action="" method="get" accept-charset="utf-8">
            <input type="text" name="id" value="" style="display: none;">
            <input type="text" name="Con" value="3" style="display: none;">
            <input type="text" name="Estado" value="" style="display: none;">
            <button type="submit" class="btn btn-danger">Cortos</button>
          </form>
           &nbsp;
          <form action="" method="get" accept-charset="utf-8">
            <input type="text" name="id" value="" style="display: none;">
            <input type="text" name="Con" value="4" style="display: none;">
            <input type="text" name="Estado" value="" style="display: none;">
            <button type="submit" class="btn btn-warning">Cancelados</button>
          </form>
        </div>
      </div >
      </nav>
      <br>
      <div>
      </div>
      <div class="bodysito" style="width: 150vh; ">
         <?php 
             $pedidos=ConsultaPedidos($conexion);
             TablaGeneral($pedidos,$conexion);
          ?>
      </div>
      <div class="bodysito">
        <div class="uk-navbar-right" uk-scrollspy="cls: uk-animation-slide-right;">
             <form action="../../../Back/php/report/Pedidos.php" method="get" accept-charset="utf-8">
               De: 
               <input type="date" required="" name="de">
               a
               <input type="date" required="" name="a">
               <button type="submit" class="btn btn-success">Reportar</button>
             </form>
        </div>
      </div>
    </div>
  </div>
      

<!-- Modal para hacer una pedido -->
<div id="modal-example" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
      <div align="center">
      
        
       
        <h2 class="uk-modal-title">Hacer pedido</h2>
         <form action="../../../Back/php/seguridad/VerificarUserA.php" method="POST">
           <label for="parte"  >Parte:</label>
           <input type="text" name="parte" required=""  >
           <br>
           <label for="lote" >Lote:</label>
           <input type="text" name="lote"  required   >
           <input type="text" name="agotado" value="0" style="display: none;">
           <input type="checkbox" name="agotado" value="1" checked="">
           <br>
           <label for="linea" >Linea:</label>
           <input type="number" name="linea" required=""   >
           <br>
           <label for="proyecto">Proyecto:</label>
           <input type="text" name="proyecto" required="" >
           <br>
         <label for="user">Credencial: </label>
         <input type="password" name="pass" required>
         <input type="text" name="hacer" value="pedir" style="display: none;">
         <button type="submit" style="display: none;"></button>
      
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
            <button class="uk-button uk-button-primary" type="submit">Pedir</button>
        </p> 
      </form>
      </div>
    </div>
</div>
<!-- Modal para surtir sin pedido  -->
<div id="modal-surtir" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
      <div align="center">
      
        <h2 class="uk-modal-title">Surtir sin pedido</h2>
         <form action="../../../Back/php/seguridad/VerificarUserA.php" method="POST">
           <label for="parte"  >Parte:</label>
           <input type="text" name="parte" required=""  >
           <br>
           <label for="lote" >Lote:</label>
           <input type="text" name="lote" required=""   >
           <br>
           <label for="linea" >Linea:</label>
           <input type="number" name="linea" required=""   >
           <br>
           <label for="Cantidad" >Cantidad:</label>
           <input type="number" name="Cantidad" required=""   >
           <br>
           <label for="proyecto">Proyecto:</label>
           <input type="text" name="proyecto" required="" >
           <br>
         <label for="user">Credencial: </label>
         <input type="password" name="pass" required>
         <input type="text" name="hacer" value="surtirSP" style="display: none;">
         <button type="submit" style="display: none;"></button>
      
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
            <button class="uk-button uk-button-primary" type="submit">Pedir</button>
        </p> 
      </form>
      </div>
    </div>
</div>

<!-- Modal para surtir pedido -->
<div style="height: 20px;" ></div>
<div class="bodysito"  >
   <?php 
   $id=0;
   $pedido;
   if ($_GET!=null) {
     $id=$_GET['id'];
     $pedido=ConsultaPedido($conexion,$id);
     if ($_GET['Estado']==1 ) {
       TablaSurtir($conexion,$pedido);
     }
    else{
      if ($pedido!=null) {
         TablaSurtido($conexion,$pedido);
      }
     
    }
   }
      
      
     
    ?>

</div>
<a id="surti"></a><div style="height: 200px;" ></div>
<!-- Modal para registro de componentes -->
<div id="modal-registroC" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
      <div align="center">
        <h2 class="uk-modal-title">Parte Nueva</h2>
         <form action="../../../Back/php/seguridad/VerificarUserA.php" method="POST">
           <label for="idParte" style="">Parte:</label>
           <input type="text" name="idParte" required="" >
           <br>
           <label for="NivelMSD" >Nivel de MSD:</label>
           <input type="number" name="NivelMSD" required=""   >
           <br>
           <label for="Descripcion">Descripcion:</label>
           <input type="text" name="Descripcion" required="" >
           <br>
           <input type="text" name="hacer" value="Registrar" style="display: none;">
          <label for="user">Credencial: </label>
         <input type="password" name="pass" required>
         <br>
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
            <button class="uk-button uk-button-primary" type="submit">Registrar</button>
        </p> 
      </form>
      </div>
    </div>
</div>
    <!--Boostrap js-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../../../Back/Js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- UIkit JS -->
    <script src="../../../Back/Js/uikit.min.js"></script>
    <script src="../../../Back/Js/uikit-icons.min.js"></script>
    <!--script para manejar notificaciones-->
    <script >
      var msg= getParameterByName('msg');
      switch(msg){
            case 'bien':
               UIkit.notification({
               message: '<div class="alert alert-primary" role="alert"><b class="alert-link">Action Save</b></div>',
               status: 'primary',
               pos: 'bottom-left',
               timeout: 5000
                }); 
            break;
            case 'bienClose':
               UIkit.notification({
               message: '<div class="alert alert-success" role="alert"><b class="alert-link">Closed Action </b></div>',
               status: 'primary',
               pos: 'bottom-left',
               timeout: 5000
                }); 
            break;
            case 'bienModificado':
               UIkit.notification({
               message: '<div class="alert alert-primary" role="alert"><b class="alert-link">Save Change</b></div>',
               status: 'primary',
               pos: 'bottom-left',
               timeout: 5000
                }); 
            break;
            case 'mal':
                UIkit.notification({
                message: '<div class="alert alert-danger" role="alert"><b class="alert-link">Error</b></div>',
                status: 'warning',
                pos: 'bottom-left',
                timeout: 5000
                });
            break;
            case 'malClose':
                UIkit.notification({
                message: '<div class="alert alert-warning" role="alert"><b class="alert-link">Unauthorized User</b></div>',
                status: 'warning',
                pos: 'top-center',
                timeout: 5000
                });
            break;
            case 'malModificado':
                UIkit.notification({
                message: '<div class="alert alert-warning" role="alert"><b class="alert-link">Failed to change</b></div>',
                status: 'warning',
                pos: 'bottom-center',
                timeout: 5000
                });
            break;
           case 'Notify':
               UIkit.notification({
               message: '<div class="alert alert-success" role="alert"><b class="alert-link"> Sent Notify </b></div>',
               status: 'primary',
               pos: 'bottom-left',
               timeout: 5000
                }); 
            break;
      }
      
  
//funcion que ayuda a recoger el valor de las variables POST
    function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
</script>
    

</body>
</html>