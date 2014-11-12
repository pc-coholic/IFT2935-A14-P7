<?php
require("auth.php");
check_auth();
?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>IFT2935-A14-P7</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/starter-template.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="https://js.arcgis.com/3.10/js/esri/css/esri.css">   
    <link rel="stylesheet" type="text/css" href="https://esri.github.io/bootstrap-map-js/src/css/bootstrapmap.css">  
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">IFT2935-A14-P7</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
<!--
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
-->
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <div id="mapDiv"></div>
<!--
      <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>
-->
    </div><!-- /.container -->

     <script type="text/javascript">
            var package_path = "//esri.github.com/bootstrap-map-js/src/js";
            var dojoConfig = {
                packages: [{
                    name: "application",
                    location: package_path
                }]
            };
        </script>
        <script src="https://js.arcgis.com/3.10compact"></script>
        <script>
            require(["esri/map", "application/bootstrapmap", "dojo/domReady!"], 
              function(Map, BootstrapMap) {
                // Get a reference to the ArcGIS Map class
                var map = BootstrapMap.create("mapDiv",{
                  basemap:"osm",
                  center:[45.513973, -73.618013],
                  zoom:12
                });
            });
        </script>
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
