@extends('layouts.main')
@section('header')
    @parent
@endsection

@section('content')
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">О магазине</div>
        </div>
    </div>
    <div class="content-main__container">
        <div class="news-block content-text"><img src="/img/about.jpg" alt="Image" class="alignleft img-news">
            <p>
                Магазин компьютерных игр ГЕЙМСМАРКЕТ существует на рынке с 2014 года. Мы работаем, чтобы вы играли.
                На нашем сайте вы найдёте всё, о чем мечтали: Action, RPG, онлайн-игры, игры в жанре квеста или стратегии.
                Каждый может выбрать, что ему по душе, стоит только зайти в раздел Категории.
            </p>
            <p>
                Мы ежедневно обновляем каталоги, следим за новинками и новостями в мире компьютерных игр.
                Наши партнеры - это крупнейшие российские компании, что обеспечивает безопасность покупки и качество товара.
            </p>
            <p>
                Мы осуществляем поддержку клиента на всех этапах покупки и установки игры.
                Гарантируем отсутствие рисков, которые встречаются на липовых сайтах. У нас только лицензионный товар.
            </p>
            <p>
                В нашем магазине регулярно проходят акции и существует система накопительных скидок для постоянных клиентов.
                Следите за акциями и новостями - экономьте!
            </p>
            <p>
                Почему выгодно покупать онлайн?
            </p>
            <p>
                Онлайн-продажа компьютерных игр в России становится всё популярнее. Это очень удобно: не нужно идти в магазин за диском или ждать его доставки.
                Достаточно всего лишь приобрести ключ активации и скачать клиент игры.
                Вы приобретаете игру не вставая из-за компьютерного стола! К тому же, это дешевле.
            </p>
        </div>
    </div>
    @include('layouts.look-products')
    @endsection
