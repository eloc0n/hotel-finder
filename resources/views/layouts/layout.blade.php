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

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
        <script src="/js/main.js"></script>
        <script src="/js/app.js"></script>

        <script>    
            // Initialize the platform object:
            var platform = new H.service.Platform({
            'apikey': 'JBVN2-60sBjtUy_zFuGfKImudhCm5NOBWUV4mOCBS70'
            });

            // Obtain the default map types from the platform object
            var maptypes = platform.createDefaultLayers();
            
            // Obtain from db lat and lng
            var lat_location = "<?php echo 37.976703; ?>";
            var lng_location = "<?php echo 23.750417; ?>";
            // console.log(lng_location);

            // Instantiate (and display) a map object:
            var map = new H.Map(
            document.getElementById('mapContainer'),
            maptypes.vector.normal.map,
            {
                zoom: 17,
                center: { lng: lng_location, lat: lat_location }
            });

            // Create a marker icon from an image URL:
            var icon = new H.map.Icon('/img/map-marker-icon.png', {size: {w: 45, h: 45}});

            // Create a marker using the previously instantiated icon:
            var marker = new H.map.Marker({ lat: 37.976703, lng: 23.750417 }, { icon: icon });

            // Add the marker to the map:
            map.addObject(marker);
        </script>
        

    </body>
</html>
