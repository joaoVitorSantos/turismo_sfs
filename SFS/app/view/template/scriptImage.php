

    $(document).ready(function () {

        $('.rotas').hide();
        $('.locais').hide();

        var size = $(window).width();

        if (size <= 767){
            $('.imagem').removeClass('imagemI');
            $('.titulo_rota').addClass('text-center');
            $('.container').addClass('noMargin');
            $('.titulo').attr('style', 'font-size: 300%');


        }

        if(size > 767){
            $('.titulo').attr('style','font-size: 500%');
            //$('.marginFooter').attr('style','margin-top: 350px');
        }

        $(window).resize(function () {
            var size = $(window).width();
            if (size <= 767){
                $('.titulo_rota').addClass('text-center');
                $('.imagem').removeClass('imagemI');
                $('.container').addClass('noMargin');
                $('.titulo').attr('style', 'font-size: 300%');
            }

            if (size >= 768){
                $('.titulo_rota').removeClass('text-center');
                $('.imagem').addClass('imagemI');
                $('.container').removeClass('noMargin');
                $('.titulo').attr('style', 'font-size: 500%');
            }

        })

        function verificaVisivel(){
            if($('.rotas').is(':visible')){
            $('#iconDrop').attr('src','../../assets/open_iconic/svg/caret-top.svg');
            }
            else{
            $('#iconDrop').attr('src','../../assets/open_iconic/svg/caret-bottom.svg');
            }
        }

        function verificaVisivelL(){
            if($('.locais').is(':visible')){
                $('#iconDropL').attr('src','../../assets/open_iconic/svg/caret-top.svg');
            }
            else{
                $('#iconDropL').attr('src','../../assets/open_iconic/svg/caret-bottom.svg');
            }
        }

        $('#tituloR').click(function(){
            $('.rotas').slideToggle(250);

            setTimeout(function(){
                verificaVisivel();
            }, 265);
        });

        $('#tituloL').click(function(){
            $('.locais').slideToggle(250);

            setTimeout(function(){
                verificaVisivelL();
            }, 265);
        });

        $('.navLink').click(function () {
            $(this).toggleClass('active');
            $('#todosR').removeClass('active');

            if ($('#gastronomiaR').hasClass('active') == false && $('#historiaR').hasClass('active') == false){
                $('#todosR').addClass('active');
            }

        });


        $('#todosR').click(function () {
            $('.navLink').removeClass('active');
            $(this).addClass('active');
        });











    });

