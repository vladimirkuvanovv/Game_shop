@extends('layouts.main')

@section('content')
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">{{$product->name}} в
                разделе {{$product->categoryItem->name}}</div>
        </div>
    </div>
    <div class="content-main__container">
        <div class="product-container">
            <div class="product-container__image-wrap"><img src="{{$product->photo}}"
                                                            class="image-wrap__image-product"></div>
            <div class="product-container__content-text">
                <div class="product-container__content-text__title">{{$product->name}}</div>
                <div class="product-container__content-text__price first-original">
                    <div class="product-container__content-text__price__value">
                        Цена: <b>{{number_format($product->price,0)}}</b> руб
                    </div>
                    <a href="#" class="__btn btn-blue addToCartBtn" data-product-id="{{$product->id}}">Купить</a>
                </div>
                <div class="product-container__content-text__description">
                    <p>
                        {{$product->description}}
                    </p>
                </div>
                <div class="product-container__content-text__price duplicate">
                    <div class="product-container__content-text__price__value">
                        Цена: <b>{{number_format($product->price,0)}}</b> руб
                    </div>
                    <a href="#" class="__btn btn-blue addToCartBtn" data-product-id="{{$product->id}}">Купить</a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.look-products', compact('otherProducts'))
@endsection
@section('page-nav')
@endsection
