<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Application')</title>
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('applications.index') }}">一覧</a>
            <span> | </span>
            <a href="{{ route('applications.create') }}">新規作成</a>
        </nav>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
