<html>
    <head>
        <title>meditan</title>
    </head>
    <body>
@foreach ($terms as $term)
<div>
    <span> {{ $term->name_jp }} {{ $term->name_en }} {{ $term->category }}  </span>
</div>
@endforeach
    </body>
</html>