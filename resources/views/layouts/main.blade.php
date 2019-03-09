<!DOCTYPE html>
<html lang="ru">
<head>
    {!! SEO::generate() !!}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/libs.min.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/media.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        var GameApp = {
            authUrl: '{{route('login')}}',
            regUrl: '{{route('register')}}',
            addToCart: '{{route('shop.product.add_to_cart')}}',
            createOrder: '{{route('shop.order.create')}}',
            orderDetail: '{{route('shop.order.detail')}}'
        };
    </script>
</head>
<body>
<div class="main-wrapper">
    @section('header')
        <header class="main-header">
            <a href="{{ route('main') }}" class="logotype-link"><div class="logotype-container"></div></a>
            <div class="menu">
                <div class="menu__icon">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="menu__links"><a href="{{ route('main') }}" class="menu__links-item">Главная</a>
                    <a href="{{ route('shop.orders') }}" class="menu__links-item">Мои заказы</a>
                    <a href="{{route('news.list')}}" class="menu__links-item">Новости</a>
                    <a href="{{ route('about') }}" class="menu__links-item">О компании</a>
                    <a href="{{route('feedback')}}" class="menu__links-item">Связаться</a>
                    <hr>
                    @include('layouts.include.cats-mobile')
                </div>
            </div>
            <div class="header-contact">
                <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 33-333-33</a>
                </div>
            </div>
            <div class="header-container">
                @include('layouts.include.cart', ['cartQnt' => count($cart ?? [])])
                <div class="authorization-block">
                    @if(!auth()->check())
                        <a href="#regModal" data-toggle="modal" class="authorization-block__link">Регистрация</a>
                        <a href="#authoModal" data-toggle="modal" class="authorization-block__link">Войти</a>
                    @else
                        <a class="authorization-block__link" href="javascript:"
                           style="cursor: default; color: #333;">Привет, {{auth()->user()->name}}</a>
                        <a href="{{route('logout')}}" class="authorization-block__link">Выйти</a>
                    @endif
                </div>

            </div>
            <div class="header-contact__registration">
                @if(!auth()->check())
                    <button data-toggle="modal" data-target="#authoModal" class="header-contacts__button button">
                        <span>Войти</span>
                    </button>
                    <button data-toggle="modal" data-target="#regModal" class="header-contacts__button button">
                        <span>Регистрация</span>
                    </button>
                @else
                    <a class="authorization-block__link__name-user" href="javascript:"
                       style="cursor: default; color: #333;">Привет, {{auth()->user()->name}}</a>
                    <a href="{{route('logout')}}" class="authorization-block__link__btn-out">Выйти</a>
                @endif
            </div>
            {{--регистрация--}}
            <div id="regModal" tabindex="-1" role="dialog" aria-labelledby="regModalModalLabel" aria-hidden="true"
                 class="modal fade">
                <div role="document" class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header header-title__popup">
                            <h5 id="regModalModalLabel" class="modal-title">Регистрация</h5>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"
                                    style="outline: none;"><span
                                        aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <form name="register-from" method="post" id="form">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Ваш логин<span class="red">*</span></label>
                                    <input id="name" name="name" type="text"  class="form-control" pattern="[a-zA-Zа-яА-ЯёЁ ]+" required>

                                </div>
                                <div class="form-group">
                                    <label for="reg-email" class="col-form-label">Email<span class="red">*</span></label>
                                    <input id="reg-email" name="email" type="email" placeholder="exe@example.com"
                                           class="form-control" required>

                                </div>
                                <div class="form-group">
                                    <label for="reg-pass" class="col-form-label">Пароль<span class="red">*</span></label>
                                    <input id="reg-pass" name="password" type="password" class="form-control" required>

                                </div>
                                <div class="form-group">
                                    <label for="reg-pass-confirm" class="col-form-label">Пароль ещё раз<span class="red">*</span></label>
                                    <input id="reg-pass-confirm" name="password_confirmation" type="password"
                                           class="form-control" required>
                                    <div id="er"></div>

                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label"></label>
                                    <img src="{{ captcha_src() }}" alt="captcha" class="captcha-img"
                                         data-refresh-config="default"><a href="#" id="refresh"><span
                                                class="glyphicon glyphicon-refresh">

                                        </span></a>
                                </div>
                                <div class="form-group">
                                    <label>Введите код с картинки</label>
                                    <input class="form-control" type="text" name="captcha" required/>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="politic"
                                           onchange="document.getElementById('register-btn').disabled = !this.checked;">
                                    <label class="form-check-label" for="exampleCheck1">Настоящим подтверждаю, что я
                                        ознакомлен и согласен с
                                        условиями политики конфидециальности. <a href="#" data-toggle="modal"
                                                                                 data-target="#myModalPolitic"
                                                                                 id="politic__link">Узнать
                                            больше</a></label>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="register-btn" class="btn btn-primary" disabled="disabled">
                                Отправить
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{--авторизация--}}
            <div id="authoModal" tabindex="-1" role="dialog" aria-labelledby="authoModalLabel" aria-hidden="true"
                 class="modal fade">
                <div role="document" class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header header-title__popup">
                            <h5 id="authoModalLabel" class="modal-title">Авторизация</h5>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"
                                    style="outline: none;"><span
                                        aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <form name="auth-from" method="post" class="form2">
                                @csrf
                                <div class="form-group">
                                    <label for="autho-email" class="col-form-label">Email<span class="red">*</span></label>
                                    <input id="autho-email" name="email" type="email" placeholder="exe@example.com"
                                           class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="autho-pass" class="col-form-label">Пароль<span class="red">*</span></label>
                                    <input id="autho-pass" name="password" type="password" class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer" style="display: flex; justify-content: flex-start;">
                            <button type="button" id="auth-btn" class="btn btn-primary">Войти</button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}"
                                   style="text-decoration: none;">
                                    {{ __('Забыли пароль?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{--политика конф--}}
            <div class="modal fade" id="myModalPolitic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #d0e26c;">
                            {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                            <h4 class="modal-title" id="myModalLabel">Политика конфиденциальности</h4>
                        </div>
                        <div class="modal-body">
                            <p>Политика в отношении обработки персональных данных определяет основные принципы и правила
                                по обработке персональных данных, которыми мы руководствуемся в нашей работе, а также в
                                общении с клиентами, поставщиками и сотрудниками. Политика в отношении обработки
                                персональных данных распространяется на всех наших сотрудников.</p>
                            <p>При обработке персональных данных мы стремимся соблюдать требования законодательства
                                Российской Федерации, в частности Федеральный закон № 152-ФЗ «О персональных данных», а
                                также нормы и правила, установленные в нашей компании.</p>
                            <div class="text-center">
                                <p>Политика в отношении обработки персональных данных</p>
                                <p><a target="_blank" href="/policy-rek9.pdf">policy.pdf</a>, 355 КБ</p></div>
                            <p>По всем вопросам вы можете связаться по email info@rek9.ru</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close__politic">
                                Обратно в форму
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    @show

    <div class="middle" {{$contentMiddleStyle ?? ''}}>
        @section('sidebar')
            <div class="sidebar">
                <div class="sidebar-item">
                    @include('layouts.include.left-cats', ['sidebarCats' => $sidebarCats ?? []])
                </div>
                @if($lastNews ?? true)
                    @include('layouts.include.left-news')
                @endif
            </div>
        @show
        <div class="main-content">
            @if($slider ?? true)
                <div class="content-top">
                    <div class="slider main-slider" id="up-slider">
                        <div class="slider__item"><img src="/img/slider4.jpg" alt="Image" class="image-main"></div>
                        <div class="slider__item"><img src="/img/slider2.png" alt="Image" class="image-main"></div>
                        <div class="slider__item"><img src="/img/slider3.jpg" alt="Image" class="image-main"></div>
                    </div>
                </div>
            @endif
            <div class="content-middle">
                @include('layouts.include.errors', compact('errors'))
                @yield('content')

            </div>
        </div>
        <div class="content-bottom"></div>
    </div>
    @section('footer')
        @if($footer ?? true)
            <footer class="footer">
                <div class="footer__footer-content">
                    @if($randomProduct ?? false)
                        <div class="random-product-container">
                            <div class="random-product-container__head">Случайный товар</div>
                            <div class="random-product-container__content">
                                <div class="item-product">
                                    <div class="item-product__title-product">
                                        <a href="{{$randomProduct->url}}"
                                           class="item-product__title-product__link">{{$randomProduct->name}}</a></div>
                                    <div class="item-product__thumbnail"><a href="{{$randomProduct->url}}"
                                                                            class="item-product__thumbnail__link"><img
                                                    src="{{$randomProduct->photo}}" alt="Preview-image"
                                                    class="item-product__thumbnail__link__img"></a></div>
                                    <div class="item-product__description">
                                        <div class="item-product__description__products-price"><span
                                                    class="products-price">{{ number_format($randomProduct->price,0)}}
                                                руб</span>
                                        </div>
                                        <div class="item-product__description__btn-block"><a href="#"
                                                                                             class="__btn btn-blue addToCartBtn"
                                                                                             data-product-id="{{$randomProduct->id}}">Купить</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer__footer-content__main-content">
                            <p>
                                Интернет-магазин компьютерных игр ГЕЙМСМАРКЕТ - это
                                онлайн-магазин игр для геймеров, существующий на рынке уже 5 лет.
                                У нас широкий спектр лицензионных игр на компьютер, ключей для игр - для активации
                                и авторизации, а также карты оплаты (game-card, time-card, игровые валюты и т.д.),
                                коды продления и многое друго. Также здесь всегда можно узнать последние новости
                                из области онлайн-игр для PC. На сайте предоставлены самые востребованные и
                                актуальные товары MMORPG, приобретение которых здесь максимально удобно и,
                                что немаловажно, выгодно!
                            </p>
                        </div>
                    @endif
                </div>
                <div class="footer__social-block">
                    <ul class="social-block__list bcg-social">
                        <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i
                                        class="fa fa-facebook"></i></a></li>
                        <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i
                                        class="fa fa-twitter"></i></a></li>
                        <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i
                                        class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </footer>
        @endif
    @show
</div>
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script>
        let editor = CKEDITOR.replace( 'desc' );
    </script>
    <script src="/js/wow.min.js"></script>
    <script>new WOW().init();</script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/js/slick.min.js"></script>
    <script src="/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="/js/valid/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/valid/jv/dist/jquery.validate.js"></script>
    <script>
        $(function(){
            $('#form').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 6
                    },
                    email: {
                      required:true,
                      email: true
                    },
                    password: {
                        required:true,
                        minlength: 6
                    },
                    password_confirmation: {
                        required:true,
                    }
                },
                messages: {
                    name: {
                        required: "Поле 'Имя' обязательно к заполнению",
                        minlength: "Введите не менее 6 символов в поле 'Имя'"
                    },
                    email: {
                        required: "Поле 'Email' обязательно к заполнению",
                        email: "Необходим формат адреса email: example@mail.com"
                    },
                    password: {
                        required : "Поле 'Пароль' обязательно к заполнению",
                        minlength: 'Необходимо ввести не менее 6 символов'
                    },
                    password_confirmation: {
                        required: "Поле обязательно к заполнению"
                    }
                },
                onkeyup: true,
                // onclick: true,
            });
            $('.form2').validate({
                rules: {
                    email: {
                        required:true,
                        email: true
                    },
                    password: {
                        required:true,
                        minlength: 6
                    },
                },
                messages: {

                    email: {
                        required: "Поле 'Email' обязательно к заполнению",
                        email: "Необходим формат адреса email: example@mail.com"
                    },
                    password: {
                        required : "Поле 'Пароль' обязательно к заполнению",
                        minlength: 'Необходимо ввести не менее 6 символов'
                    },
                },
                onkeyup: true,
                onclick: true,
            });

           $('#reg-pass-confirm').on('keyup', function () {
               let pass1 = $('#reg-pass').val();
               let pass2 = $(this).val();
               if (pass1 !== pass2) {
                   $('#er').html('Пароли не совпадают').css('color', 'red');
                   // $('.error').append('Пароли не совпадают').css('color', 'red');
                   $('#register-btn').attr("disabled", "disabled");
               } else {
                   $('#register-btn').remove("disabled");
                   $('.error').html('');
               }
           })

        });
    </script>
    <script src="/js/main.js"></script>
@show
</body>
