@extends('pages.templates.simple-template')
<!-- Указываем то, что шаблон НАСЛЕДУЕТСЯ от pages.templates.simple-template -->
@section('title', 'О нас')

@section('head')
    @vite(['путь до файла css или js или любой другой нужный'])
    <!-- Пример подключения стилей только на эту страничку -->
@endsection 

@section('main')
    <h1 class="mainnnn">О нас</h1>
    <!-- Для подключения стилей можно в шаблонный файл(simple-template) добавить строку собакаvite([путь до файла]),
     а можно просто прямо тут в секцию head, созданную в шаблонном файле, добавить эту строку -->
@endsection
