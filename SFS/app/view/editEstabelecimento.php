<body>
<div class="container">
    <div class="row linhaForm">
        <div class="col-md-2"></div>
        <div class="col-md-8 rounded" style="border: 1px solid rgba(0,0,0,.125); padding: 1em 1em 1em 1em">
            <form action="../controller/Home.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="nome">Nome do Estabelecimento</label>
                        <input type="text" value="<?= $estabelecimento->getNomeEstabelecimento() ?>" required name="nome" class="form-control" id="nome">
                    </div>
                </div>
                <div class="form-group">
                    <label for="link">Link do Site/Facebook</label>
                    <textarea style="height: 10em" required name="link_site" class="form-control" id="link_site" placeholder="Link do Site"><?= $estabelecimento->getLinkSite() ?></textarea>
                </div>
                <div class="form-group">
                    <label for="link">Link Maps</label>
                    <textarea style="height: 10em" required name="link" class="form-control" id="link" placeholder="Ex: http://google.com"><?= $estabelecimento->getLinkMaps() ?></textarea>
                </div>
                <div class="form-group ">
                    <div class="col-md-7">
                        <label for="fotoPrincipal">Foto Principal da Rota: <small>(Se nao alterar, continua a mesma!)</small></label>
                        <img src="../../assets/images/<?= $estabelecimento->getImagemPerfil() ?>" alt="" class="img-fluid rounded" style="height: 10em; padding: 0 0 1em 0">
                    </div>
                    <div class="col-md-6 ">
                        <input type="file" name="fotoPrincipal" class="align-middle" id="fotoPrincipal">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php foreach ($categorias as $c): ?>
                            <input type="radio" <?php if(in_array($c['id_tipo_estabelecimento'], $categoria)){ echo "checked";} ?> name="categorias" value="<?= $c['id_tipo_estabelecimento'] ?>"><?= $c['categorias'] ?><br>
                        <?php endforeach; ?>
                    </div>
                </div>
                <br>
                <input type="text" class="text-hide" name="id" value="<?= $estabelecimento->getIdEstabelecimento() ?>">
                <input type="text" class="text-hide" value="editarEstabelecimento" name="acao">
                <button type="submit" class="btn btn-primary btnEnviar">Enviar</button>
            </form>
        </div>
    </div>
</div>