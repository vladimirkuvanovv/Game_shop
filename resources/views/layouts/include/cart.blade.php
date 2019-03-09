<div class="payment-container">
    <div class="payment-basket__status">
        <div class="payment-basket__status__icon-block"><a
                class="payment-basket__status__icon-block__link" href="{{route('shop.cart')}}"><i
                    class="fa fa-shopping-basket"></i></a></div>
        <div class="payment-basket__status__basket"><span
                class="payment-basket__status__basket-value">{{ $cartQnt ?? 0 }}</span><span
                class="payment-basket__status__basket-value-descr">{{\app\Helpers\Helper::plural(['товар','товара','товаров'],$cartQnt ?? 0)}}</span>
        </div>
    </div>
</div>
