<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{getAssetUrl('images/favicon.ico')}}" type="image/x-icon">
    <title>Not found page</title>
    <link rel="stylesheet" href="{{getAssetUrl('css/main.css')}}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="xs-12 md-6 mx-auto">
                <div id="countUp">
                    <div class="number" data-count="404">0</div>
                    <div class="text">Page not found</div>
                    <div class="text">This may not mean anything.</div>
                    <div class="text">I'm probably working on something that has blown up.</div>
                    <div class="text return"><a href="{{BASE_URL}}" >Return Home Page</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{getAssetUrl('adminLTE/plugins/jquery/jquery.min.js')}}"></script>
    <!-- In view -->
    <script src="https://cdn.3up.dk/in-view@0.6.1"></script>
    <script src="{{getAssetUrl('js/main.js')}}"></script>
</body>

</html>
