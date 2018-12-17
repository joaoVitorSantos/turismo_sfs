<script>
    $(document).ready(function () {
       $('#btnIr').click(function () {
           var end = $(this).attr('name');
           window.open(end);
       });

       var avaliacao = 0;
       var id_usuario = $("#id_usuario").html();
       var id_rota = $("#id_rota").html();
       var avaliacao_propria = $("#avaliacao_propria").html();
       var avaliacao_geral = $("#avaliacao_geral").html();
       var avaliacao_geral_real = $("#avaliacao_geral_real").html();


       if (avaliacao_propria == 5){
           $("#1").attr('src','../../assets/images/estrelaC.jpg');
           $('#3').attr('src','../../assets/images/estrelaC.jpg');
           $('#4').attr('src','../../assets/images/estrelaC.jpg');
           $('#5').attr('src','../../assets/images/estrelaC.jpg');
           $('#2').attr('src','../../assets/images/estrelaC.jpg');
       }else if (avaliacao_propria == 4){
           $("#4").attr('src','../../assets/images/estrelaC.jpg');
           $('#1').attr('src','../../assets/images/estrelaC.jpg');
           $('#2').attr('src','../../assets/images/estrelaC.jpg');
           $('#3').attr('src','../../assets/images/estrelaC.jpg');
           $('#5').attr('src','../../assets/images/estrelaN.jpg');
       }else if (avaliacao_propria == 3){
           $("#3").attr('src', '../../assets/images/estrelaC.jpg');
           $('#1').attr('src', '../../assets/images/estrelaC.jpg');
           $('#2').attr('src', '../../assets/images/estrelaC.jpg');
           $('#4').attr('src', '../../assets/images/estrelaN.jpg');
           $('#5').attr('src', '../../assets/images/estrelaN.jpg');
       }else if (avaliacao_propria == 2){
           $("#3").attr('src', '../../assets/images/estrelaN.jpg');
           $('#1').attr('src', '../../assets/images/estrelaC.jpg');
           $('#2').attr('src', '../../assets/images/estrelaC.jpg');
           $('#4').attr('src', '../../assets/images/estrelaN.jpg');
           $('#5').attr('src', '../../assets/images/estrelaN.jpg');
       }else if (avaliacao_propria == 1){
           $("#3").attr('src', '../../assets/images/estrelaN.jpg');
           $('#1').attr('src', '../../assets/images/estrelaC.jpg');
           $('#2').attr('src', '../../assets/images/estrelaN.jpg');
           $('#4').attr('src', '../../assets/images/estrelaN.jpg');
           $('#5').attr('src', '../../assets/images/estrelaN.jpg');
       }

        $('#1').click(function () {
           $(this).attr('src','../../assets/images/estrelaC.jpg');
            $('#3').attr('src','../../assets/images/estrelaN.jpg');
            $('#4').attr('src','../../assets/images/estrelaN.jpg');
            $('#5').attr('src','../../assets/images/estrelaN.jpg');
            $('#2').attr('src','../../assets/images/estrelaN.jpg');

            $.post("RotaController.php",
            {
                    acao: 'curtir',
                    avaliacao: 1,
                    id_usuario: id_usuario,
                    id_rota: id_rota
            },
             function(data){
                location.reload();
            });
        });

        $('#2').click(function () {
            $(this).attr('src','../../assets/images/estrelaC.jpg');
            $('#1').attr('src','../../assets/images/estrelaC.jpg');
            $('#3').attr('src','../../assets/images/estrelaN.jpg');
            $('#4').attr('src','../../assets/images/estrelaN.jpg');
            $('#5').attr('src','../../assets/images/estrelaN.jpg');

            $.post("RotaController.php",
                {
                    acao: 'curtir',
                    avaliacao: 2,
                    id_usuario: id_usuario,
                    id_rota: id_rota
                },
                function(data){
                    location.reload()
                });
        });

        $('#3').click(function () {
            $(this).attr('src','../../assets/images/estrelaC.jpg');
            $('#1').attr('src','../../assets/images/estrelaC.jpg');
            $('#2').attr('src','../../assets/images/estrelaC.jpg');
            $('#4').attr('src','../../assets/images/estrelaN.jpg');
            $('#5').attr('src','../../assets/images/estrelaN.jpg');

            $.post("RotaController.php",
                {
                    acao: 'curtir',
                    avaliacao: 3,
                    id_usuario: id_usuario,
                    id_rota: id_rota
                },
                function(data){
                    location.reload();
                });
        });

        $('#4').click(function () {
            $(this).attr('src','../../assets/images/estrelaC.jpg');
            $('#1').attr('src','../../assets/images/estrelaC.jpg');
            $('#2').attr('src','../../assets/images/estrelaC.jpg');
            $('#3').attr('src','../../assets/images/estrelaC.jpg');
            $('#5').attr('src','../../assets/images/estrelaN.jpg');

            $.post("RotaController.php",
                {
                    acao: 'curtir',
                    avaliacao: 4,
                    id_usuario: id_usuario,
                    id_rota: id_rota
                },
                function(data){
                    location.reload();
                });
        });

        $('#5').click(function () {
            $(this).attr('src','../../assets/images/estrelaC.jpg');
            $('#1').attr('src','../../assets/images/estrelaC.jpg');
            $('#2').attr('src','../../assets/images/estrelaC.jpg');
            $('#3').attr('src','../../assets/images/estrelaC.jpg');
            $('#4').attr('src','../../assets/images/estrelaC.jpg');

            $.post("RotaController.php",
                {
                    acao: 'curtir',
                    avaliacao: 5,
                    id_usuario: id_usuario,
                    id_rota: id_rota
                },
                function(data){
                    location.reload();
                });
        });


    });
</script>
<p id="id_usuario" class="text-hide"><?= $_SESSION['id_usuario'] ?></p>
<p id="id_rota" class="text-hide"><?= $res->getIdRota(); ?></p>
<p id="avaliacao_propria" class="text-hide"><?= $avaliacaoPropria ?></p>
<p id="avaliacao_geral" class="text-hide"><?= $avaliacaoGeral?></p>
<body>

<div class="container">
    <div class="card bg-dark" style="margin-top: 2em">
        <img class="card-img" id="imagemRota" src="../../assets/images/<?= $res->getImagemPerfil() ?>" alt="">
        <div class="card-img-overlay" style="margin-top: -1.3em; margin-left: -1.3em; margin-right: -1.3em">
            <div class="card-title text-center text-light tituloCard rounded"><?= $res->getNomeRota() ?></div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="card cardeR">
            <div class="card-body">
                <h1 class="card-tittle" style="font-family: Cocogoose">Descrição</h1>
                <p class="card-text"><?= $res->getDescricao() ?></p>
            </div>
            <div class="card-footer">
                Tempo Médio: <?= $res->getTempoMedio() ?>
            </div>
        </div>
    </div>

    <div class="row">
            <div style="height: 4em" class="col-md-4 float-right text-center fundo rounded">
                <div  style="display: inline">
                    <img class="estrela" id="1" src="../../assets/images/estrelaN.jpg" alt="">
                    <img class="estrela" id="2" src="../../assets/images/estrelaN.jpg" alt="">
                    <img class="estrela" id="3" src="../../assets/images/estrelaN.jpg" alt="">
                    <img class="estrela" id="4" src="../../assets/images/estrelaN.jpg" alt="">
                    <img class="estrela" id="5" src="../../assets/images/estrelaN.jpg" alt="">
                    <!--<button class="small btn btn-outline-primary" id="avaliar">Avaliar</button>-->
                </div>
                <br>
                <h7>Média Geral dos Usuários: <p id="avaliacao_geral_real" style="display: inline"><?= $avaliacaoGeralReal ?></p></h7>
            </div>


        <div class="col-md-7 float-left text-center fundo rounded">
            <h3 class="rotaM">Rota no Maps</h3>
            <img class="img-fluid rounded" src="../../assets/images/<?= $imgMaps->getNomeImagem() ?>" alt="rota">
            <button id="btnIr" name="<?= $res->getLink() ?>" class="btn btn-success">Ir!</button>
        </div>




    </div>
</div>