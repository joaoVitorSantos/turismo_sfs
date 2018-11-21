<script>

    $(document).ready(function () {
        var size = $(window).width();

        if (size <= 767){
            $('.imagemRota').removeClass('imagemI');
        }

        // if (size >= 768){
        //      $('.imagemRota').addClass('imagemI');
        // }

        $(window).resize(function () {
            var size = $(window).width();
            if (size <= 767){
                $('.imagemRota').removeClass('imagemI');
            }

            if (size >= 768){
                $('.imagemRota').addClass('imagemI');
            }

        })

    });


</script>


<body>

<?php include_once '../view/navbar.php'?>

<div class="container rounded">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center text-primary">Título</h1>
        </div>
    </div>
    <div class="row rota">
        <div class="col-lg-8 col-md-12 text-left">
            <div class=""><img src="../../assets/images/FOTO%20PRINCIPAL.jpg" class="img-fluid rounded imagemI imagemRota"></div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="texto text-left text-muted">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed nisi lacus sed viverra. Nec dui nunc mattis enim ut tellus. Malesuada nunc vel risus commodo viverra maecenas. A condimentum vitae sapien pellentesque habitant morbi tristique senectus.
            </div>
            <a href="#" class="btn btn-primary btn-info">Ir!<span class="glyphicon glyphicon-circle-arrow-right"></span></a>
        </div>



    </div>
    <hr/>
    <div class="row rota">
        <div class="col-lg-8 col-md-12 text-left">
            <div class=""><img src="../../assets/images/ROTA%203.jpg" class="img-fluid rounded imagemI imagemRota"></div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="texto text-left text-muted">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed nisi lacus sed viverra. Nec dui nunc mattis enim ut tellus. Malesuada nunc vel risus commodo viverra maecenas. A condimentum vitae sapien pellentesque habitant morbi tristique senectus.
            </div>
            <a href="#" class="btn btn-primary btn-info">Ir!<span class="glyphicon glyphicon-circle-arrow-right"></span></a>
        </div>
    </div>

    <hr/>

    <div class="row rota">
        <div class="col-lg-8 col-md-12 text-left">
            <div class=""><img src="../../assets/images/ROTA%202%20(1).jpg" class="img-fluid rounded imagemI imagemRota"></div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="texto text-left text-muted">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed nisi lacus sed viverra. Nec dui nunc mattis enim ut tellus. Malesuada nunc vel risus commodo viverra maecenas. A condimentum vitae sapien pellentesque habitant morbi tristique senectus.
            </div>
            <a href="#" class="btn btn-primary btn-info">Ir!<span class="glyphicon glyphicon-circle-arrow-right"></span></a>
        </div>
    </div>
</div>
