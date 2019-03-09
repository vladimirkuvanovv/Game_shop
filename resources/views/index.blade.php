@extends('layouts.main')

@section('header')
    @parent
@endsection

@section('content')
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Последние товары</div>
        </div>
        <div class="content-head__search-block">
            <div class="search-container">
                <form class="search-container__form" method="get" action="http://www.yandex.ru:8081/yandsearch">
                    <input type="text" class="search-container__form__input">
                    <button class="search-container__form__btn">Поиск</button>
                </form>
            </div>
        </div>
    </div>
    <div class="content-main__container">
        <div class="products-columns">
            @foreach($products as $product)
                <div data-wow-delay="0.1s" class="products-columns__item wow fadeInUp">
                    <div class="products-columns__item__title-product">
                        <a href="{{$product->url}}" class="products-columns__item__title-product__link">{{$product->name}}</a></div>
                    <div class="products-columns__item__thumbnail"><a href="{{$product->url}}"
                                                                      class="products-columns__item__thumbnail__link"><img
                                src="{{$product->photo}}" alt="{{$product->name}}"
                                class="products-columns__item__thumbnail__img"></a></div>
                    <div class="products-columns__item__description"><span class="products-price">{{number_format($product->price,0)}} руб</span><a
                            href="#" class="__btn btn-blue addToCartBtn" data-product-id="{{$product->id}}">Купить</a></div>
                </div>
            @endforeach
        </div>
        <div class="controls">
            <div id="left" class="arrow"><img src="/img/arrows/arrow__left.png"></div>
            <div id="right" class="arrow"><img src="/img/arrows/arrow__right.png"></div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
