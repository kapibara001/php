@extends('tamplates.headerTemplate')

@section('title', 'Продукты')

@section('header')
    <a href="/">Главная страница</a>
@endsection

@section('main')
    <table class="table table-striped" style="width: 550px;">
        <thead>
            <tr>
                <td>Название</td>
                <td>Цена</td>
                <td>Наличие</td>
                <td>Рейтинг</td>
            </tr>
        </thead>
        @foreach ($products as $product)
            @if (isset($product))
                <tr>
                    <td>{{ $product['name'] }}</td>
                
                    @if ($product['in_stock'])
                        <td style="color: green">{{ $product['price'] }}</td>
                        <td>В наличии</td>
                    @else 
                        <td style="color: red">{{ $product['price'] }}</td>
                        <td>Нет в наличии</td>
                    @endif
                    <td>{{ round($product['rating'], 2) }}</td>
                </tr>
            @endif
        @endforeach
        <button class="btn btn-danger">Кнопка тест bootstrap</button>
    </table>
@endsection