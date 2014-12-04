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
          <ul class="nav navbar-nav navbar-left">
              <li><a onclick="showNotifyModal();"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Notification</a></li>
              <li><a href="https://github.com/pc-coholic/IFT2935-A14-P7/tree/<?= getenv('HEAD_HASH') ?>"><span class="label label-default"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> GIT Commit SHA: <?= substr(getenv('HEAD_HASH'), 0, 8) ?></span></a></li>
          </ul>
         <ul class="nav navbar-nav navbar-right">
              <li><a href="https://identification.umontreal.ca/cas/logout.ashx"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Logout <?= $_SESSION['user'][0] ?></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container-fluid">
      <div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Cette carte montre des hopitaux et temps d'attentes fictives! Communiquez toujours avec le <strong>911</strong> en cas d'urgence medicale!</div>

      <div id="mapDiv">
        <div id="LocateButton"></div>
      </div>
    </div><!-- /.container -->

    <div id="locateModal" class="modal modal-wide fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title text-center">Bienvenue sur le site de gestion des salles d'attentes</h4>
            <h5 class="text-center">Welcome to the waiting room manager of Montreal</h5>
          </div>
          <div class="modal-body">
            <form class="col-lg-12" id="locateform">
              <img class="img-responsive center-block" src="http://www.thumpertalk.com/uploads/monthly_12_2013/post-3-0-83650900-1387568242.jpg"><br>
              <div class="input-group input-group-lg col-sm-offset-3 col-sm-6">
                <input type="text" class="center-block form-control input-lg" title="Entrez votre code postal." placeholder="Entrez votre code postal." id="address">
                <span class="input-group-btn">
                  <button class="btn btn-lg btn-primary" type="submit"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> Localisation par code postal</button>
                  <button class="btn btn-lg btn-info" id="locategps"><span class="glyphicon glyphicon-record" aria-hidden="true"></span> Localisation par GPS</button>
                </span>
              </div>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div id="notifyModal" class="modal modal-wide fade" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title text-center">Notification</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" id="notifyform">
              <div class="form-group">
                <label for="inputNoPatient3" class="col-sm-2 control-label">Numero patient</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="inputNoPatient3" name="inputNoPatient3" placeholder="Numero patient">
                </div>
              </div>
              <div class="form-group">
                <label for="selectModeEnvoie3" class="col-sm-2 control-label">Mode d'envoie</label>
                <div class="col-sm-10">
                  <select class="form-control" id="selectModeEnvoie3" name="selectModeEnvoie3">
                    <option>tel</option>
                    <option>email</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="selectNoPatients3" class="col-sm-2 control-label">Nombre de patients</label>
                <div class="col-sm-10">
                  <select class="form-control" id="selectNoPatients3" name="selectNoPatients3">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option selected="selected">5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    <option>13</option>
                    <option>14</option>
                    <option>15</option>
                    <option>16</option>
                    <option>17</option>
                    <option>18</option>
                    <option>19</option>
                    <option>20</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Enregistrer</button>
                </div>
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
      require(["esri/map", "application/bootstrapmap", "esri/dijit/LocateButton", "esri/tasks/locator", "esri/graphic", 
                "esri/symbols/SimpleMarkerSymbol", "esri/symbols/PictureMarkerSymbol", "esri/symbols/Font", "esri/symbols/TextSymbol", 
                "dojo/_base/array", "esri/Color", "dojo/number", "dojo/parser", "dojo/dom", "dijit/registry", "dojo/domReady!"],

      function(Map, BootstrapMap, LocateButton, Locator, Graphic, SimpleMarkerSymbol, PictureMarkerSymbol, Font, TextSymbol, arrayUtils, Color, number, parser, dom, registry) {
        parser.parse();
        // Get a reference to the ArcGIS Map class
        var map = BootstrapMap.create("mapDiv",{
          basemap:"osm",
          center:[-73.5844, 45.5379],
          zoom:12
        });

        geoLocate = new LocateButton({
          map: map,
          setScale: false
        }, "LocateButton");
        geoLocate.startup();

        $.getJSON( "hopitaux.php", function( data ) {
          $.each( data, function( key, val ) {
            //alert(val['Nom']);
            var latLongPoint = new esri.geometry.Point(val['Longitude'], val['Latitude']);
               
            var symbol = new esri.symbol.SimpleMarkerSymbol().setSize(8).setColor(new dojo.Color([255, 0, 0]));
            var graphic = new esri.Graphic(latLongPoint, symbol);
            var infoTemplate = new esri.InfoTemplate();
            //infoTemplate.setTitle(val['Nom'] + ' <span class="badge"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> ' + secondsTimeSpanToHM(Math.abs(parseInt(val['Moyenne']))) + ' heures</span>');
            infoTemplate.setTitle(val['Nom']);
            alert(val['Moyenne']);
            alert(parseInt(val['Moyenne']));
            alert(Math.abs(parseInt(val['Moyenne'])));
            alert(secondsTimeSpanToHM(Math.abs(parseInt(val['Moyenne']))));
            var address = val['Adresse'];
            var hopital = val['ID'];
            
            $.getJSON( "departements.php?ID=" + val['ID'], function( data ) {
              var content = address + '<br><br>';
              content += '<div class="btn-group btn-group-xs" role="group">';

              $.each( data, function( key, val ) {
                content += '<button type="button" class="btn btn-default deptselect" onclick="showAttente(' + hopital + ', ' + val['ID'] + ');">' +  val['Nom'] + ' <span class="badge"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> ' + secondsTimeSpanToHM(Math.abs(parseInt(val['Moyenne']))) + ' heures</span></button>';
              });
             
              content += '</div><br>'; 
              content += '<br><div id="attente_' + hopital + '">&nbsp;</div>';
              content += '<div id="updated_' + hopital + '">&nbsp;</div>';
              infoTemplate.setContent(content);
            });
            graphic.setInfoTemplate(infoTemplate);
            map.graphics.add(graphic);
          });
        });

        locator = new Locator("https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer");
        locator.on("address-to-locations-complete", showResults);

        $("#locategps").click( function() {
          geoLocate._locate();
          $('#locateModal').modal('hide');
        });

        $("#locateform").submit( function() {
          event.preventDefault();
          var address = {
            "SingleLine": $("#address").val()
          };
          locator.outSpatialReference = map.spatialReference;
          var options = {
            address: address,
            outFields: ["Loc_name"]
          };
          locator.addressToLocations(options);
          $('#locateModal').modal('hide');
        });
  
        $("#notifyform").submit( function() {
          event.preventDefault();
          $.post("notification.php", $("#notifyform").serialize() );
          $('#notifyModal').modal('hide');
        });

        function showResults(evt) {
          var symbol = new PictureMarkerSymbol('https://js.arcgis.com/3.10compact/js/esri/dijit/images/sdk_gps_location.png', 28, 28);
          var geom;
          //arrayUtils.every(evt.addresses, function(candidate) {
          $.each( evt.addresses, function(i, candidate) {
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
          $('#locateModal').modal('show');
        });
      });
         
      function showAttente(hopital, departement) {
        $.getJSON( "attente.php?ID=" + departement, function( data ) {
          var content = ""; 
          $.each( data, function( key, val ) {
            content += '<div class="panel panel-' + val['Label'] + '"><div class="panel-heading"><h3 class="panel-title">' + val['Severite_des_patients'] + '</h3></div>';
            content += '<div class="panel-body">Patients en attente: ' + val['Attente'] + '<br>Temps d\'attente prevue: ' + secondsTimeSpanToHM(Math.abs(val['moyenne'] * val['Attente'])) + ' heures</div></div>';
          });
          $("#attente_" + hopital).html(content);
        });
        $("#updated_" + hopital).html('<div class="well well-sm">Dernière mise à jour: ' + Date() + '</div>');
      }
      
      function showNotifyModal() {
        $("#notifyModal").modal('show');
      }

      function secondsTimeSpanToHM(s) {
        var h = Math.floor(s/3600); //Get whole hours
        s -= h*3600;
        var m = Math.floor(s/60); //Get remaining minutes
        s -= m*60;
        //return h+":"+(m < 10 ? '0'+m : m)+":"+(s < 10 ? '0'+s : s); //zero padding on minutes and seconds
        return h+":"+(m < 10 ? '0'+m : m); //zero padding on minutes and seconds
      }
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
