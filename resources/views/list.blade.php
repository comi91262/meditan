<html>
    <head>
        <title>meditan</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <td>日本語名</td>
                    <td>英語名</td>
                    <td>カテゴリ名</td>
                </tr>
            </thead>
        @foreach ($terms as $term)
        <tbody>
                <tr>
                    <td>{{$term->name_jp}}</td>
                    <td>{{$term->name_en}}</td>
                    <td>{{$term->category}}</td>
                </tr>
        </tbody>
        
        @endforeach
        </table>
    </body>
</html>