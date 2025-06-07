<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <title>@yield('title')</title>
    </head>

    <body>
        <header>
            <div>
                <a href="/">Главная</a>
                @yield('header')
            </div>
        </header>
    </body>

    <main>
        @yield('main')
    </main>
</html>