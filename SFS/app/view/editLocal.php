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
                    <div class="form-group col-md-12">
                        <label for="nome">Nome do Local</label>
                        <input type="text" value="<?= $local->getNomeLocal() ?>" required name="nome" class="form-control" id="nome" placeholder="Nome do Local">
                    </div>

                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea style="height: 10em" required name="descricao" class="form-control" id="descricao" placeholder="Descrição do Local"><?= $local->getDescricao() ?></textarea>
                </div>
                <div class="form-group">
                    <label for="link">Link Maps</label>
                    <textarea style="height: 10em" required name="link" class="form-control" id="link" placeholder="Ex: http://google.com"><?= $local->getLink() ?></textarea>
                </div>
                <div class="form-group ">
                    <div class="col-md-6">
                        <label for="customFile">Foto do Maps: <small>(Se nao alterar, continua a mesma!)</small></label><br>
                        <img src="../../assets/images/<?= $imgMaps->getNomeImagem() ?>" alt="" class="img-fluid rounded" style="height: 10em; padding: 0 0 1em 0">

                    </div>
                    <div class="col-md-6 align-text-middle">
                        <input class="" type="file" name="fotoMaps" id="fotoMaps">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-md-7">
                        <label for="fotoPrincipal">Foto Principal da Rota: <small>(Se nao alterar, continua a mesma!)</small></label>
                        <img src="../../assets/images/<?= $local->getImagemPerfil() ?>" alt="" class="img-fluid rounded" style="height: 10em; padding: 0 0 1em 0">
                    </div>
                    <div class="col-md-6 ">
                        <input type="file" name="fotoPrincipal" class="align-middle" id="fotoPrincipal">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <?php foreach ($rotas as $r): ?>
                            <input type="checkbox" <?php if(in_array($r->getIdRota(), $ids)){ echo "checked";} ?> name="rotas[]" value="<?= $r->getIdRota() ?>"><?= $r->getNomeRota() ?><br>
                        <?php endforeach; ?>
                    </div>
                </div>


                <input type="text" class="text-hide" value="editaLocal" name="acao">
                <input type="text" class="text-hide" value="<?= $local->getIdLocal() ?>" name="id">
                <button type="submit" class="btn btn-primary btnEnviar">Enviar</button>
            </form>
        </div>
    </div>
</div>