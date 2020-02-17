<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>ArcGIS JavaScript Tutorials: Select a basemap</title>
  <style>
    html, body, #viewDiv {
      padding: 0;
      margin: 0;
      height: 100%;
      width: 100%;
    }
  </style>
  
  <link rel="stylesheet" href="https://js.arcgis.com/4.13/esri/css/main.css">
  <script src="https://js.arcgis.com/4.13/"></script>
  
  <script>  
    require([
      "esri/Map",
      "esri/views/MapView",
      "esri/widgets/BasemapToggle",
      "esri/widgets/BasemapGallery"
    ], function(Map, MapView, BasemapToggle, BasemapGallery, FeatureLayer) {

      var map = new Map({
        basemap: "topo-vector"
      });
      
      var view = new MapView({
        container: "viewDiv",
        map: map,
        center: [124.6412833,8.4765562],
        zoom: 16
      });
      
//       var basemapToggle = new BasemapToggle({
//         view: view,
//         secondMap: "satellite"
//       });
      
//       view.ui.add(basemapToggle,"bottom-right");
      
      var basemapGallery = new BasemapGallery({
        view: view,
        source: {
          portal: {
            url: "http://www.arcgis.com",
            useVectorBasemaps: true, // Load vector tile basemap group
          },
        } 
      });

      view.ui.add(basemapGallery, "top-right"); // Add to the view
      
    });

    var popupTrailheads = {
        "title": "{TRL_NAME}",
        "content": "<b>City:</b> {CITY_JUR}<br><b>Cross Street:</b> {X_STREET}<br><b>Parking:</b> {PARKING}<br><b>Elevation:</b> {ELEV_FT} ft"
      }

      var trailheads = new FeatureLayer({
        url: "https://services3.arcgis.com/GVgbJbqm8hXASVYi/arcgis/rest/services/Trailheads_Styled/FeatureServer/0",
        outFields: ["TRL_NAME","CITY_JUR","X_STREET","PARKING","ELEV_FT"],
        popupTemplate: popupTrailheads
      });

      map.add(trailheads);

      var popupTrails = {
        "title": "Trail Information",
        "content": function(){
           return "This is {TRL_NAME} with {ELEV_GAIN} ft of climbing.";
        }
      }

      var trails = new FeatureLayer({
        url: "https://services3.arcgis.com/GVgbJbqm8hXASVYi/arcgis/rest/services/Trails_Styled/FeatureServer/0",
        outFields: ["TRL_NAME","ELEV_GAIN"],
        popupTemplate: popupTrails
      });

      map.add(trails,0);

      var popupOpenspaces = {
        "title": "{PARK_NAME}",
        "content": [{
          "type": "fields",
          "fieldInfos": [
            {
              "fieldName": "AGNCY_NAME",
              "label": "Agency",
              "isEditable": true,
              "tooltip": "",
              "visible": true,
              "format": null,
              "stringFieldOption": "text-box"
            },
            {
              "fieldName": "TYPE",
              "label": "Type",
              "isEditable": true,
              "tooltip": "",
              "visible": true,
              "format": null,
              "stringFieldOption": "text-box"
            },
            {
              "fieldName": "ACCESS_TYP",
              "label": "Access",
              "isEditable": true,
              "tooltip": "",
              "visible": true,
              "format": null,
              "stringFieldOption": "text-box"
            },
            {
              "fieldName": "GIS_ACRES",
              "label": "Acres",
              "isEditable": true,
              "tooltip": "",
              "visible": true,
              "format": {
                "places": 2,
                "digitSeparator": true
              },
              "stringFieldOption": "text-box"
            }
          ]
        }]
      }

      var openspaces = new FeatureLayer({
        url: "https://services3.arcgis.com/GVgbJbqm8hXASVYi/arcgis/rest/services/Parks_and_Open_Space_Styled/FeatureServer/0",
        outFields: ["TYPE","PARK_NAME", "AGNCY_NAME","ACCESS_TYP","GIS_ACRES"],
        popupTemplate: popupOpenspaces
      });

      map.add(openspaces,0);
  </script>
</head>
<body>
  <div id="viewDiv"></div>
</body>
</html>