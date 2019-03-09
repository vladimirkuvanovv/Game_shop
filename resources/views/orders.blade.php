@extends('layouts.main')


@section('content')
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Мои заказы</div>
        </div>
    </div>
    <div class="content-head__title-wrap__title__name-table orders__list">
        <div class="goods-name">Номер заказа</div>
        <div class="order-date">Дата заказа</div>
        <div class="goods-price">Цена</div>
    </div>
    <div class="content-main__container">
        <div class="cart-product-list">
            @foreach($orders as $order)
                <div data-wow-delay="0.4s" class="cart-product-list__item wow bounceInLeft">

                    <div class="cart-product__item__product-name">
                        <div class="cart-product__item__product-name__content"><a
                                href="{{route('shop.order.detail',$order->id)}}">Заказ №{{$order->id}}</a></div>
                    </div>
                    <div class="cart-product__item__cart-date">
                        <div
                            class="cart-product__item__cart-date__content">{{\Carbon\Carbon::parse($order->created_at)->toDateString()}}</div>
                    </div>
                    <div class="cart-product__item__product-price"><span class="product-price__value">{{$order->amount}} рублей</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="content-footer__container">
        {!! $orders->links() !!}
    </div>
@endsection
