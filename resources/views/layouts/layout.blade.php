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
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="/js/main.js"></script>
        <script src="/js/app.js"></script>
    </body>
</html>
