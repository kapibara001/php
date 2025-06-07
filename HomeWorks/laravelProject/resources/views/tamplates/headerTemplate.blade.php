<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <title class="btn btn-warning">@yield('title')</title>
    </head>

    <body>
        <header>
            <div>
                @yield('header')
            </div>
        </header>
    </body>

    <main>
        @yield('main')
    </main>
</html>