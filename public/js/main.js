$(function () {

    $('.menu__icon').on('click', function () {
        $(this).closest('.menu').toggleClass('menu_state_open');
    });
    $('#politic__link').click(function () {
        $('#regModal').hide('slow');
        $('#myModalPolitic').fadeIn(200);
    });
    $('#close__politic').click(function () {
        $('#myModalPolitic').hide('slow');
        $('#regModal').fadeIn(300);
    });
   // слайдер
    $('.main-slider').slick({
        infinite: true,
        autoplay: true,
        speed: 1500,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    function classFunction() {
        if ($('body').width() < 577) {
            $('.products-columns').addClass('owl-carousel').addClass('owl-theme');
            $('.products-category__list').addClass('owl-carousel').addClass('owl-theme');
        } else {
            $('.products-columns').removeClass('owl-carousel').removeClass('owl-theme');
            $('.products-category__list').removeClass('owl-carousel').removeClass('owl-theme');
        }
    }

    classFunction();
    jQuery(window).resize(classFunction);
    let owl = $(".owl-carousel"),
        url = null,
        prev = $("#left"),
        next = $("#right");

    owl.owlCarousel({
        loop: true,
        responsiveRefreshRate: 100,
        responsive: {
            0: {
                items: 1,
                autoplay: true,
                autoplayTimeout: 3000,
                smartSpeed: 2000,
                touchDrag: true,
            },
            576: {
                items: 2,
                touchDrag: true,
                mouseDrag: true,
                autoplayTimeout: 3000,
                smartSpeed: 3000,
                autoplay: true,
            },
        }
    });

    //arrows on 480px
    next.on("click", () => {
        owl.trigger("next.owl.carousel");
    });
    prev.on("click", () => {
        owl.trigger("prev.owl.carousel");
    });

    //авторизация
    $(document).on('click', '#auth-btn', function (e) {
        e.preventDefault();

        var formData = $(this).parents().find('form[name="auth-from"]').serialize();

        $.ajax({
            method: 'POST',
            data: formData,
            url: GameApp.authUrl,
            success: function (response) {
                top.location.reload();
            },
            error: function (response) {
                var errors = [];
                for (error in response.responseJSON.errors) {
                    errors.push(response.responseJSON.errors[error][0])
                }

                swal({
                    title: "Ошибка",
                    icon: "error",
                    text: errors.join('\r\n')
                })
            }
        });

    });
    //регистрация
    $(document).on('click', '#register-btn', function (e) {
        e.preventDefault();

        var formData = $(this).parents().find('form[name="register-from"]').serialize();

        $.ajax({
            method: 'POST',
            data: formData,
            url: GameApp.regUrl,
            success: function (response) {
                if (response.success === true) {
                    top.location.reload();
                }
            },
            error: function (response) {
                var errors = [];
                for (error in response.responseJSON.errors) {
                    errors.push(response.responseJSON.errors[error][0])
                }

                swal({
                    title: "Ошибка",
                    icon: "error",
                    text: errors.join('\r\n')
                })
            }
        });

    });

    //добавление товара в корзину
    $(document).on('click', '.addToCartBtn', function (e) {
        e.preventDefault();

        var productId = $(this).data('product-id');
        $.ajax({
            method: 'POST',
            url: GameApp.addToCart + '/' + productId,
            success: function (response) {
                if (response.success === true) {
                    $('.payment-container').html(response.data);
                    swal({
                        title: "Ура!",
                        icon: "success",
                        text: 'Товар успешно добавлен в корзину'
                    })
                }
            },
            error: function (response) {
                var errors = [];
                for (error in response.responseJSON.errors) {
                    errors.push(response.responseJSON.errors[error][0])
                }

                swal({
                    title: "Ошибка",
                    icon: "error",
                    text: errors.join('\r\n')
                })
            }
        });
    });

    //создание заказа
    $(document).on('click', '.createOrderBtn', function (e) {
        e.preventDefault();

        $.ajax({
            method: 'POST',
            url: GameApp.createOrder,
            success: function (response) {
                if (response.success === true) {
                    swal({
                        title: "Ура!",
                        icon: "success",
                        text: 'Заказ успешно создан.\r\nСейчас вы будете перемещены на страницу с заказом'
                    }).then(function () {
                        location.href = GameApp.orderDetail + '/' + response.orderId;
                    })
                }
            },
            error: function (response) {
                var errors = [];

                if (response.status === 401) {
                    errors.push('Для оформления заказы Вы должны быть авторизованы!')
                }

                for (error in response.responseJSON.errors) {
                    errors.push(response.responseJSON.errors[error][0])
                }

                swal({
                    title: "Ошибка",
                    icon: "error",
                    text: errors.join('\r\n')
                })
            }
        });
    });
//отправка
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


});




