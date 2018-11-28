

    $(document).ready(function () {
        var size = $(window).width();

        if (size <= 767){
            $('.imagem').removeClass('imagemI');
            $('.titulo_rota').addClass('text-center');
            $('.container').addClass('noMargin');
            $('.titulo').attr('style', 'font-size: 400%');
        }

        $(window).resize(function () {
            var size = $(window).width();
            if (size <= 767){
                $('.titulo_rota').addClass('text-center');
                $('.imagem').removeClass('imagemI');
                $('.container').addClass('noMargin');
                $('.titulo').attr('style', 'font-size: 400%');
            }

            if (size >= 768){
                $('.titulo_rota').removeClass('text-center');
                $('.imagem').addClass('imagemI');
                $('.container').removeClass('noMargin');
                $('.titulo').attr('style', 'font-size: 600%');
    }

        })

    });

