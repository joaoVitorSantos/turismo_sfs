<body>
    <div class="container">
        <div class="row linhaForm">
            <div class="col-md-2"></div>
            <div class="col-md-8 rounded" style="border: 1px solid rgba(0,0,0,.125); padding: 1em 1em 1em 1em">
                <form action="../controller/Home.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="nome">Nome do Estabelecimento</label>
                            <input type="text" value="" required name="nome" class="form-control" id="nome" placeholder="Nome do Estabelecimento">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea style="height: 10em" required name="descricao" class="form-control" id="descricao" placeholder="Descrição do Estabelecimento"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="link">Link do Site/Facebook</label>
                        <textarea style="height: 10em" required name="link_site" class="form-control" id="link_site" placeholder="Link do Site"></textarea>
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
                    <div class="row">
                        <div class="col-md-6">
                            <?php foreach ($categorias as $c): ?>
                                <input type="checkbox" name="categorias" value="<?= $c['id_tipo_estabelecimento'] ?>"><?= $c['categorias'] ?><br>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <br>
                    <input type="text" class="text-hide" value="addEstabelecimento" name="acao">
                    <button type="submit" class="btn btn-primary btnEnviar">Enviar</button>
                </form>
            </div>
        </div>
    </div>