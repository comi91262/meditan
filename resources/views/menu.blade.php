<html>
    <head>
        <title>meditan</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
@foreach ($terms as $term)
<div>
    <span> {{ $term->id }} </span>
</div>
@endforeach

    </body>
</html>