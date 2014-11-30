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
      <div class="container-fluid">
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
          <ul class="nav navbar-nav navbar-right">
              <li><a href="https://identification.umontreal.ca/cas/logout.ashx">Logout <?= $_SESSION['user'][0] ?></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container-fluid">
      <div class="alert alert-danger" role="alert">Cette carte montre des hopitaux et temps d'attentes fictives! Communiquez toujours avec le <strong>911</strong> en cas d'urgence medicale!</div>

      <div id="mapDiv">
        <div id="LocateButton"></div>
      </div>
<!--
      <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>
-->
    </div><!-- /.container -->

      <div id="shortModal" class="modal modal-wide fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Bienvenue sur le site de gestion des salles d'attentes</h4>
              <h5>Welcome to the waiting room manager of Montreal</h5>
            </div>
            <div class="modal-body">
            <form class="col-lg-12" id="locateform">
              <div class="input-group input-group-lg col-sm-offset-4 col-sm-4">
                <input type="text" class="center-block form-control input-lg" title="Entrez votre code postal." placeholder="Entrez votre code postal." id="address">
                <span class="input-group-btn"><button class="btn btn-lg btn-primary" type="submit">OK</button></span>
              </div>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
     <script type="text/javascript">
            var package_path = "//esri.github.io/bootstrap-map-js/src/js";
            var dojoConfig = {
                packages: [{
                    name: "application",
                    location: package_path
                }]
            };
        </script>
        <script src="https://js.arcgis.com/3.10compact"></script>
        <script>
            require(["esri/map", "application/bootstrapmap", "esri/dijit/LocateButton", "esri/tasks/locator", "esri/symbols/PictureMarkerSymbol", "dojo/domReady!"],
              function(Map, BootstrapMap, LocateButton, Locator, PictureMarkerSymbol) {
                // Get a reference to the ArcGIS Map class
                var map = BootstrapMap.create("mapDiv",{
                  basemap:"osm",
                  center:[-73.5844, 45.5379],
                  zoom:12
                });

                geoLocate = new LocateButton({
                  map: map
                }, "LocateButton");
                geoLocate.startup();

                $.getJSON( "hopitaux.php", function( data ) {
                  $.each( data, function( key, val ) {
                    //alert(val['Nom']);
                    var latLongPoint = new esri.geometry.Point(val['Longitude'], val['Latitude']);
                    
                    var symbol = new esri.symbol.SimpleMarkerSymbol().setSize(8).setColor(new dojo.Color([255, 0, 0]));
                    var graphic = new esri.Graphic(latLongPoint, symbol);
                    var infoTemplate = new esri.InfoTemplate();
                    infoTemplate.setTitle(val['Nom']);
                    infoTemplate.setContent(val['Adresse']);
                    graphic.setInfoTemplate(infoTemplate);
                    map.graphics.add(graphic);
                  });
               });

               locator = new Locator("https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer");
               locator.on("address-to-locations-complete", showResults);

               $("#locateform").submit(function() {
                 event.preventDefault();
                 var address = $("#address").val();
                 locator.outSpatialReference = map.spatialReference;
                 var options = {
                   address: address,
                   outFields: ["Loc_name"]
                 };
                 locator.addressToLocations(options);
               });
          
               function showResults(evt) {
                 var symbol = new new PictureMarkerSymbol('https://js.arcgis.com/3.10compact/js/esri/dijit/images/sdk_gps_location.png', 28, 28);
                 var geom;
                 arrayUtils.every(evt.addresses, function(candidate) {
                   console.log(candidate.score);
                   if (candidate.score > 80) {
                     console.log(candidate.location);
                     var attributes = { 
                       address: candidate.address, 
                       score: candidate.score, 
                       locatorName: candidate.attributes.Loc_name 
                     };   
                     geom = candidate.location;
                     //var graphic = new Graphic(geom, symbol, attributes, infoTemplate);
                     var graphic = new Graphic(geom, symbol, attributes);
                     //add a graphic to the map at the geocoded location
                     map.graphics.add(graphic);
                     //add a text symbol to the map listing the location of the matched address.
                     var displayText = candidate.address;
                     var font = new Font(
                       "16pt",
                       Font.STYLE_NORMAL, 
                       Font.VARIANT_NORMAL,
                       Font.WEIGHT_BOLD,
                       "Helvetica"
                     );
                    
                     var textSymbol = new TextSymbol(
                       displayText,
                       font,
                       new Color("#666633")
                     );
                     textSymbol.setOffset(0,8);
                     map.graphics.add(new Graphic(geom, textSymbol));
                     return false; //break out of loop after one candidate with score greater  than 80 is found.
                   }
                 });
                 if ( geom !== undefined ) {
                   map.centerAndZoom(geom, 12);
                 }
               }

               $(".modal-wide").on("show.bs.modal", function() {
                 var height = $(window).height() - 200;
                 $(this).find(".modal-body").css("max-height", height);
               });

               $(window).load(function(){
                 $('#shortModal').modal('show');
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
