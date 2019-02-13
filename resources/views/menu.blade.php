<html>
    <head>
        <title>meditan</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div>
            <a href={{ route('menu.exam') }}>問題をとく</a>
        </div>
        <div>
            <a href={{ route('menu.history') }}>テスト履歴へ</a>
        </div>
        <div>
            <a href={{ route('menu.list') }}>単語の一覧を表示</a>
        </div>
    </body>
</html>