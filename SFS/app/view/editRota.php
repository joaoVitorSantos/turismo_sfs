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
                        <input type="text" value="<?= $r->getNomeRota() ?>" required name="nome" class="form-control" id="nome" placeholder="Nome da Rota">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tempo_medio">Tempo Médio</label>
                        <input type="text" value="<?= $r->getTempoMedio() ?>" required name="tempo_medio" class="form-control" id="tempo_medio" placeholder="Ex: 1 hora">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea style="height: 10em" required name="descricao" class="form-control" id="descricao" placeholder="Descrição da Rota"><?= $r->getDescricao() ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="link">Link Maps</label>
                        <textarea style="height: 10em" required name="link" class="form-control" id="link" placeholder="Ex: http://google.com"><?= $r->getLink() ?></textarea>
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
                            <img src="../../assets/images/<?= $r->getImagemPerfil() ?>" alt="" class="img-fluid rounded" style="height: 10em; padding: 0 0 1em 0">
                        </div>
                           <div class="col-md-6 ">
                               <input type="file" name="fotoPrincipal" class="align-middle" id="fotoPrincipal">
                           </div>
                    </div>

                    <div class="form-group">

                        <label for="imgs" style="padding-left: 1em">Fotos ja Cadastradas: </label>
                        <div class="imgs">
                            <?php foreach ($imgs as $i): ?>
                            <div class="row borda rounded " style="padding: 1em 1em 0 1em; margin: 1em 1em 1em 0">
                                <div class="col-md-4 col-sm-4">
                                    <img src="../../assets/images/<?= $i->getNomeImagem() ?>" alt="" class="img-fluid rounded" style="height: 10em; padding: 0 0 1em 0">
                                </div>
                                <div class="col-md-6 col-sm-3 check">
                                    <input class="align-center" type="checkbox" value="<?= $i->getIdImagem() ?>" checked="checked" name="fotos[]">
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="imagens">
                    <div class="form-group">
                        <div class="custom-file">
                            <label for="customFile">Outras Fotos: </label>
                            <input type="file" name="outrasFotos1"  id="outrasFotos1">

                        </div>
                    </div>
                    </div>
                    <a class="btn btn-info text-center text-white" id="addImg">+ Fotos</a>
                    <br>
                    <input type="text" class="text-hide" value="editaRota" name="acao">
                    <input type="text" class="text-hide" value="<?= $r->getIdRota() ?>" name="id">
                    <button type="submit" class="btn btn-primary btnEnviar">Enviar</button>
                </form>
            </div>
        </div>
    </div>