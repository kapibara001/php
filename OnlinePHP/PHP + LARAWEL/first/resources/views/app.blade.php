<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <head>
    </head>
    <body class="font-sans antialiased">
        <h{{ rand(1, 7) }}> {{ rand() }} </h1>
        <div class="">
            <li>
                <a href="/about">О нас</a>
            </li>
            <li>
                <a href="/contacts">Контакты</a>
            </li>
            <li>
                <a href="/bucket">Корзина</a>
            </li>
        </div>
    </body>
</html>
