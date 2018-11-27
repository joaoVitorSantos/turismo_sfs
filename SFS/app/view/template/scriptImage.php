

    $(document).ready(function () {
        var size = $(window).width();

        if (size <= 767){
            $('.imagem').removeClass('imagemI');
        }

        $(window).resize(function () {
            var size = $(window).width();
            if (size <= 767){
                $('.imagem').removeClass('imagemI');
            }

            if (size >= 768){
                $('.imagem').addClass('imagemI');
            }

        })

    });

