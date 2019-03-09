@extends('layouts.main')

@section('content')
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Детализация заказа №{{$order->id}}</div>
        </div>
    </div>
    <div class="content-head__title-wrap__title__name-table">
        <div class="goods-name">Название товара</div>
        <div class="goods-price">Цена</div>
    </div>
    <div class="content-main__container">
        <div class="cart-product-list">
            @foreach($order->getProducts() as $product)
                <div data-wow-delay="0.4s" class="cart-product-list__item wow bounceInLeft">
                    <div class="cart-product__item__product-photo">
                        <img src="{{$product->photo}}" class="cart-product__item__product-photo__image">
                    </div>
                    <div class="cart-product__item__product-name">
                        <div class="cart-product__item__product-name__content"><a
                                href="{{$product->url}}">{{$product->name}}</a></div>
                    </div>
                    <div class="cart-product__item__product-price">
                        <span class="product-price__value">{{number_format($product->price)}} рублей</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
