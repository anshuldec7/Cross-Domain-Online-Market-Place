<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Places Searchbox</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
      #target {
        width: 345px;
      }
    </style>
  </head>
  <body>
   



    <div id="map"></div>
    <script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
         
          center: {lat: 37.28279464911045, lng: -121.8545150756836},
          zoom: 7,
          mapTypeId: 'roadmap'
        });

          
             var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">E-Shopper Market Place</h1>'+
            '<div id="bodyContent">'+
            '<p><b>Market Place</b>, the best online shoppe where you can <b>Shop it all</b>, It is highly ' +
            'recommended for youth and working professionals'+
            'who do not have the luxury to spent on going through multiple online stores '+
            '<p>Visit: Market Place, <a href="https://buysmartdrone.com/marketplace">'+
            'https://buysmartdrone.com/marketplace</a> '+
            '(last visited Dec 10, 2016).</p>'+
            '</div>'+
            '</div>';
           var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        var marker = new google.maps.Marker({
          position: {lat: 37.28279464911045, lng: -121.8545150756836},
          map: map,
          title: 'Uluru (Ayers Rock)'
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
          
          
      }
      

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmjLulL2RJWCbb3ewYnwC9VfHNZRpRK-o&libraries=places&callback=initAutocomplete"
         async defer></script>
  </body>
</html>