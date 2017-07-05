<!DOCTYPE html>
<html lang="en" ng-app="mobieApp">
<head>
  <title>Mobie - UAG</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="<?php echo $global['app_base']; ?>/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php echo $global['app_base']; ?>/favicon.ico" type="image/x-icon">

  <!-- ================================================================================= -->
  <script src="<?php echo $global['app_base']; ?>/js/vendor/angular/angular.min.js"></script>
  <!-- ================================================================================= -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  
  
  <script src="<?php echo $global['app_base']; ?>/js/vendor/animate/angular-animate.min.js"></script>
  <!-- Bootstrap angular-->
  <script src="<?php echo $global['app_base']; ?>/js/vendor/angularbootstrap-ui/ui-bootstrap-tpls-0.14.3.min.js"></script>

  <!-- ================================================================================= -->
  <script src="<?php echo $global['app_base']; ?>/js/app.js"></script>
  <!-- ================================================================================= -->
  
  <!-- Grow Service Plugins -->
  <link rel="stylesheet" href="<?php echo $global['app_base'] ?>/css/jquery.growl.css">
  <script src="<?php echo $global['app_base']; ?>/js/vendor/GrowlNotification/jquery.growl.js"></script>
  <script src="<?php echo $global['app_base']; ?>/js/growlService.js"></script>

  <!-- Modules & Angular Controllers -->
  <!-- ================================================================================= -->
  <script src="<?php echo $global['app_base']; ?>/js/webservices/apiFactoryRest.js"></script>
  <script src="<?php echo $global['app_base']; ?>/js/controllers/homePageCtrl.js"></script>
  <script src="<?php echo $global['app_base']; ?>/js/controllers/displayMovieModalCtrl.js"></script>
  <!-- ================================================================================= -->

  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
     background-color: #f2f2f2;
     padding: 25px;
   }
 </style>
</head>
<body ng-controller="homePageCtrl">

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#">Ménu</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Inicio</a></li>
          <li><a href="#">Actores</a></li>
          <li><a href="#">Directores</a></li>
          <li><a href="#">Escritores</a></li>
          <li><a href="#">Generos</a></li>
          <li><a href="#">Busqueda Avanzada</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="jumbotron">
    <div class="container text-center">
      <h1>Mobie</h1>      
      <p>Encuentra la mejor Pelicula que ver...</p>
    </div>
  </div>
  
  <div class="container-fluid bg-3 text-center">    
    <h3>Algunas de las Mejores Peliculas recomendadas para ti</h3><br>
    <div class="row">
      <div class="col-sm-3" style="padding: 30px; cursor: pointer;" ng-repeat="movie in movies">
        <p> <strong> {{movie.title}} </strong> </p>
        <img src="{{movie.image}}" ng-click="fn.openMovieModal(movie)" class="img-responsive" style="width:100%" alt="Image">
      </div>
    </div>
  </div><br>

  <footer class="container-fluid text-center">
    <p>Desarrollo por José Noé Hernández Vivanco | Universidad Autonoma de Guadalajara</p>
  </footer>
  
  <?php include_once "views/displayMovie.html" ?>
</body>
</html>
