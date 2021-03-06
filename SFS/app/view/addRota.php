<script>
    $(document).ready(function () {
        var id = 1;

        $('#addImg').click(function () {
            id +=1;
            $('.imagens').append('<div class="form-group">\n' +
                '                        <div class="custom-file">\n' +
                '<label for="customFile">Outras Fotos: </label>\n' +
                '                        <input type="file" name="outrasFotos' + id +'" id="outrasFotos' + id + '">\n' +
                '                        </div>\n' +
                '                        </div>')
        });
    });
</script>
<body>
<div class="container">
    <div class="row linhaForm">
        <div class="col-md-2"></div>
        <div class="col-md-8 rounded" style="border: 1px solid rgba(0,0,0,.125); padding: 1em 1em 1em 1em">
            <form action="../controller/Home.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nome">Nome da Rota</label>
                        <input type="text" value="" required name="nome" class="form-control" id="nome" placeholder="Nome da Rota">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nome">Tempo Médio</label>
                        <input type="text" value="" required name="tempo_medio" class="form-control" id="tempo_medio" placeholder="Ex: 1h">
                    </div>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea style="height: 10em" required name="descricao" class="form-control" id="descricao" placeholder="Descrição da Rota"></textarea>
                </div>
                <div class="form-group">
                    <label for="link">Link Maps</label>
                    <textarea style="height: 10em" required name="link" class="form-control" id="link" placeholder="Ex: http://google.com"></textarea>
                </div>
                <div class="form-group ">
                    <div class="col-md-6 align-text-middle">
                        <label for="fotoMaps">Foto do Maps: </label>
                        <input class="" type="file" name="fotoMaps" id="fotoMaps">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-md-6 ">
                        <label for="fotoPrincipal">Foto Principal: </label>
                        <input type="file" name="fotoPrincipal" class="align-middle" id="fotoPrincipal">
                    </div>
                </div>

                <div class="imagens">
                    <div class="form-group">
                            <label for="customFile">Outras Fotos: </label>
                        <input type="file" name="outrasFotos1"  id="outrasFotos1">
                    </div>
                </div>
                <a class="btn btn-info text-center text-white" id="addImg">+ Fotos</a>
                <br>
                <input type="text" class="text-hide" value="addRota" name="acao">
                <button type="submit" class="btn btn-primary btnEnviar">Enviar</button>
            </form>
        </div>
    </div>
</div>