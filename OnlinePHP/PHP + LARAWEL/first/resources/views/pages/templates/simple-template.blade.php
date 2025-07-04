<html>
    <head>
        <!-- yield -  это директива Blade-шаблонизатора в Laravel, которая используется для обозначения места под контент, 
        который будет вставлен из других шаблонов, расширяющих данный шаблон. 
        Вместо yield будет подставлено то, что мы передадим -->
        
        <title>
            @yield('title')
        </title>

        @vite(['C:/Program Files/Ampps/www/OnlinePHP/PHP + LARAWEL/first/resources/css/template.css']) 
        <!-- Подключение стилей к файлам, созданным по этому шаблону  -->

        @yield('head')
    </head>

    <body>
        <header>
            <div>
                @yield('header')
            </div>
            <a href="/">Главная</a>
        </header>
    </body>

    <main>
        @yield('main')
    </main>
</html>