<!DOCTYPE html>
<html>
<head>
	<!--meta tags-->
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Boostrap css-->
    <link rel="stylesheet" type="text/css" href="Css/bootstrap.min.css">
      <!-- UIkit CSS -->
    <link rel="stylesheet" href="Css/uikit.min.css">
    <!--Icons css-->
    <link rel="stylesheet" type="text/css" href="icon/css/all.css">
    <!--Css-->
    <link rel="stylesheet" type="text/css" href="Css/stilos.css">
    <!-- font google-->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<title>Menu</title>
</head>
<body >
  <div uk-scrollspy="cls: uk-animation-kenburns; repeat: true" style="background-color:#dcdcdc;position: absolute; width: 100%; height: 100%;  "> 
  </div>
  <div class="Menu">
        <nav class="uk-navbar-container" uk-navbar style="background-color: #3c8dbc; height: 50px;" >
            <div style="position: absolute;top: 5px; left: 10px;">
                
                
               <label class="Logo-Blanco">
                  <img src="img/sinec-white.svg" width="130">
               </label>
                                       
            </div>
            <div style="position: absolute;top: 9px; right: 10px;">
               <a href="construccion.php"><label class="Etiqueta-Menu">
                   <i class="fas fa-desktop"><b style="font-family: 'Raleway', sans-serif;"> It Crowd</b> </i>
               </label></a>                        
            </div>
        </nav>
  </div>
  <div>
    <div class="uk-flex uk-flex-center" uk-grid style="position: relative; top: 50px;">
      <div class="uk-card uk-margin-left" uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
         <a href="areas/Open.php" class="menuData" style=" text-decoration: none;">
            <div class="DataMenu">
               <div style="text-align: center; padding-top: 10px;">
                  <i class="fas fa-clipboard-list fa-5x"></i> <br>
                  <b>Open Action</b>
               </div> 
            </div>
         </a>
      </div>
      <div class="uk-card uk-margin-left" uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
         <a href="areas/Time.php" class="menuData" style=" text-decoration: none;">
            <div class="DataMenu">
                <div style="text-align: center; padding-top: 10px;">
                  <i class="far fa-clock fa-5x "></i> <br>
                  <b>Time-Out</b>
                </div>
            </div>
         </a>
      </div>
      <div class="uk-card uk-margin-left" uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
         <a href="areas/Time.php" class="menuData" style=" text-decoration: none;">
            <div class="DataMenu">
                <div style="text-align: center; padding-top: 10px;">
                  <i class="fas fa-umbrella fa-5x"></i></i> <br>
                  <b>MSD</b>
                </div>
            </div>
         </a>
      </div>
    </div>
  </div>

    <div style=" background-color: #3c8dbc; width: 100%; height: 80px; position: absolute;  bottom: 1px; " >
    <div class="uk-align-center" style=" color:#fff;  font-size: 10px; text-align: center;"  >
    <b>Created by <br> Geovanny Salazar Medina</b>
      <br>
      <a href="https://www.tecnm.mx/" class="pie"><img src="img/TecNM.png" width="70"></a>
      <a href="http://www.tecmm.edu.mx/"class="pie"><img src="img/TecMM.png" width="70"></a>
    </div> 
    </div>
<!--Boostrap js-->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../Back/Js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- UIkit JS -->
   <script src="../Back/Js/uikit.min.js"></script>
   <script src="../Back/Js/uikit-icons.min.js"></script>
</body>
</html>