<html>
    <head>
        <title>meditan</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
    <div id="app">
    <exam-component></exam-component>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>