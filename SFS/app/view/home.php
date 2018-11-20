<script>
        $(document).ready(function () {

            $('#estrela1').click(function () {
                if ($(this).attr('src') == '../../assets/images/estrelaC.jpg' && $('#estrela2').attr('src') == '../../assets/images/estrelaC.jpg'){
                    $(this).attr("src","../../assets/images/estrelaC.jpg");
                    $('#estrela2').attr("src","../../assets/images/estrelaN.jpg");
                    $('#estrela3').attr("src","../../assets/images/estrelaN.jpg");
                    $('#estrela4').attr("src","../../assets/images/estrelaN.jpg");
                    $('#estrela5').attr("src","../../assets/images/estrelaN.jpg");
                }

                else if($(this).attr('src') == '../../assets/images/estrelaC.jpg'){
                    $(this).attr("src","../../assets/images/estrelaN.jpg");
                }

                else{
                    $(this).attr("src","../../assets/images/estrelaC.jpg");
                }
            });

            $('#estrela2').click(function () {

                if ($(this).attr('src') == '../../assets/images/estrelaC.jpg' && $('#estrela3').attr('src') == '../../assets/images/estrelaC.jpg'){
                    $(this).attr('src','../../assets/images/estrelaC.jpg');
                    $('#estrela1').attr('src','../../assets/images/estrelaC.jpg');
                    $('#estrela3').attr("src","../../assets/images/estrelaN.jpg");
                    $('#estrela4').attr("src","../../assets/images/estrelaN.jpg");
                    $('#estrela5').attr("src","../../assets/images/estrelaN.jpg");
                }

                else if($(this).attr('src') == '../../assets/images/estrelaC.jpg'){
                    $(this).attr("src","../../assets/images/estrelaN.jpg");
                }

                else{
                    $(this).attr("src","../../assets/images/estrelaC.jpg");
                    $('#estrela1').attr("src","../../assets/images/estrelaC.jpg");
                }

            });

            $('#estrela3').click(function () {

                if ($(this).attr('src') == '../../assets/images/estrelaC.jpg' && $('#estrela4').attr('src') == '../../assets/images/estrelaC.jpg'){
                    $(this).attr('src','../../assets/images/estrelaC.jpg');
                    $('#estrela1').attr('src','../../assets/images/estrelaC.jpg');
                    $('#estrela2').attr("src","../../assets/images/estrelaC.jpg");
                    $('#estrela4').attr("src","../../assets/images/estrelaN.jpg");
                    $('#estrela5').attr("src","../../assets/images/estrelaN.jpg");
                }

                else if($(this).attr('src') == '../../assets/images/estrelaC.jpg'){
                    $(this).attr("src","../../assets/images/estrelaN.jpg");
                }

                else{
                    $(this).attr("src","../../assets/images/estrelaC.jpg");
                    $('#estrela1').attr("src","../../assets/images/estrelaC.jpg");
                    $('#estrela2').attr("src","../../assets/images/estrelaC.jpg");
                }

            });

            $('#estrela4').click(function () {

                if ($(this).attr('src') == '../../assets/images/estrelaC.jpg' && $('#estrela5').attr('src') == '../../assets/images/estrelaC.jpg'){
                    $(this).attr('src','../assets/images/estrelaC.jpg');
                    $('#estrela1').attr('src','../../assets/images/estrelaC.jpg');
                    $('#estrela2').attr("src","../../assets/images/estrelaC.jpg");
                    $('#estrela3').attr("src","../../assets/images/estrelaN.jpg");
                    $('#estrela5').attr("src","../../assets/images/estrelaN.jpg");
                }

                else if($(this).attr('src') == '../../assets/images/estrelaC.jpg'){
                    $(this).attr("src","../../assets/images/estrelaN.jpg");
                }

                else{
                    $(this).attr("src","../../assets/images/estrelaC.jpg");
                    $('#estrela1').attr("src","../../assets/images/estrelaC.jpg");
                    $('#estrela2').attr("src","../../assets/images/estrelaC.jpg");
                    $('#estrela3').attr("src","../../assets/images/estrelaC.jpg");
                }

            });

            $('#estrela5').click(function () {

                if($(this).attr('src') == '../../assets/images/estrelaC.jpg'){
                    $(this).attr("src","../../assets/images/estrelaN.jpg");
                }

                else{
                    $(this).attr("src","../../assets/images/estrelaC.jpg");
                    $('#estrela1').attr("src","../../assets/images/estrelaC.jpg");
                    $('#estrela2').attr("src","../../assets/images/estrelaC.jpg");
                    $('#estrela3').attr("src","../../assets/images/estrelaC.jpg");
                    $('#estrela4').attr("src","../../assets/images/estrelaC.jpg");
                }
            });

            $('#enviar').click(function () {
                var avaliacao = 0;

                if ($('#estrela5').attr('src') == '../../assets/images/estrelaC.jpg'){
                    avaliacao = 5;
                }

                else if ($('#estrela4').attr('src') == '../../assets/images/estrelaC.jpg'){
                    avaliacao = 4;
                }

                else if ($('#estrela3').attr('src') == '../../assets/images/estrelaC.jpg'){
                    avaliacao = 3;
                }

                else if ($('#estrela2').attr('src') == '../../assets/images/estrelaC.jpg'){
                    avaliacao = 2;
                }

                else if ($('#estrela1').attr('src') == '../../assets/images/estrelaC.jpg'){
                    avaliacao = 1;
                }

                if ($('#estrela1').attr('src') == '../../assets/images/estrelaN.jpg'){
                    alert('Selecione a quantidade de estrelas de sua avalição!');
                }

                if (avaliacao > 0 && avaliacao < 6){
                    $.post("../controller/Salvar.php", {avaliacao: avaliacao}, function (data) {
                       alert(data);
                    });
                }

            });

        })
    </script>

<body>

    <?php include_once '../view/navbar.php'; ?>
    <div class="container">
    <div class="row">
    <div class="estrelas col-md-4 col-sm-6 mx-auto">
        <div class="estrelaA"><input type="image" value="1" id="estrela1" class="estrela" src="../../assets/images/estrelaN.jpg" alt="">
        <input type="image" value="2" id="estrela2" class="estrela" src="../../assets/images/estrelaN.jpg" alt="">
        <input type="image" value="3" id="estrela3" class="estrela" src="../../assets/images/estrelaN.jpg" alt="">
        <input type="image" value="4" id="estrela4" class="estrela" src="../../assets/images/estrelaN.jpg" alt="">
        <input type="image" value="5" id="estrela5" class="estrela" src="../../assets/images/estrelaN.jpg" alt=""></div>
        <input type="button" class="btn btn-primary" id="enviar" value="Enviar">
    </div>
    </div>

