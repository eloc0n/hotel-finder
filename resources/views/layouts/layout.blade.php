<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Hotel Finder</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />

        
    </head>
    <body>

    <nav>
        <ul class="horizontal">
            <li><a class="active" href="#">Hotels</a></li>
            <li class="rightli" style="float:right"><a href="#">Profile</a></li>
            <li class="rightli" style="float:right"><a href="/room">Home</a></li>
        </ul>
    </nav>

        <div class="container">
            <div class="row justify-content-center">
                
                @yield('content')
                
            </div>
        </div>
        
        <footer>
            <div class="card-footer text-muted text-center">
                Hotel
            </div>
        </footer>

        <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"
        type="text/javascript" charset="utf-8"></script>
        <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"
        type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
        <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>


        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
        <script src="/js/main.js"></script>
        <script src="/js/app.js"></script>
        
        <script>    

            // Obtain from db lat and lng
            var lat_location = {!! json_encode($data->lat_location ?? '', JSON_HEX_TAG) !!};
            var lng_location = {!! json_encode($data->lng_location ?? '', JSON_HEX_TAG) !!};

            // console.log(lng_location);
            // console.log(lat_location);

            function moveMapToBerlin(map){
                map.setCenter({lat: lat_location, lng: lng_location});
                map.setZoom(17);
            }

            // Initialize the platform object:
            var platform = new H.service.Platform({
                'apikey': 'JBVN2-60sBjtUy_zFuGfKImudhCm5NOBWUV4mOCBS70'
            });

            // Obtain the default map types from the platform object
            var maptypes = platform.createDefaultLayers();

            // Instantiate (and display) a map object:
            var map = new H.Map(
            document.getElementById('mapContainer'),
            maptypes.vector.normal.map,
            {
                center: {lat:50, lng:5},
                zoom: 4,
                pixelRatio: window.devicePixelRatio || 1
            });


            // add a resize listener to make sure that the map occupies the whole container
            window.addEventListener('resize', () => map.getViewPort().resize());

            // make the map interactive
            // MapEvents enables the event system
            // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
            var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

            // Create the default UI components
            var ui = H.ui.UI.createDefault(map, maptypes);

            // Now use the map as required...
            window.onload = function () {
                moveMapToBerlin(map);
            }

            // Create a marker icon from an image URL:
            var icon = new H.map.Icon('/img/map-marker-icon.png', {size: {w: 55, h: 55}});

            // Create a marker using the previously instantiated icon:
            var marker = new H.map.Marker({ lat: lat_location, lng: lng_location }, { icon: icon });

            // Add the marker to the map:
            map.addObject(marker);
                        

            

        </script>

        

    </body>
</html>
