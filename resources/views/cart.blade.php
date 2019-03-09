@extends('layouts.main')


@section('content')
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Моя корзина</div>
        </div>
    </div>
    @if($cartItems)
        <div class="content-head__title-wrap__title__name-table">
            <div class="goods-name">Название товара</div>
            <div class="goods-price">Цена</div>
        </div>
        <div class="content-main__container">
            <div class="cart-product-list">
                @foreach($cartItems as $cartItem)
                    <div data-wow-delay="0.4s" class="cart-product-list__item wow bounceInLeft">
                        <div class="cart-product__item__product-photo">
                            <img src="{{$cartItem->photo}}" class="cart-product__item__product-photo__image">
                        </div>
                        <div class="cart-product__item__product-name">
                            <div class="cart-product__item__product-name__content"><a
                                        href="{{$cartItem->url}}">{{$cartItem->name}}</a></div>
                        </div>
                        <div class="cart-product__item__product-price">
                            <span class="product-price__value">{{number_format($cartItem->price)}} рублей</span>
                        </div>
                        <div style="font-size: 20px; padding: 0 10px 0 10px">
                            <a href="{{route('shop.cart.delete',$cartItem->cartKey)}}" title="Удалить товар из корзины"><i
                                        class="fa fa-close text-danger"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="btn btn-lg btn-primary createOrderBtn">Оформить заказ</button>
        </div>
    @else
        <div class="alert alert-danger col-sm-6 mt-5">Товаров в корзине нет</div>
    @endif
@endsection
