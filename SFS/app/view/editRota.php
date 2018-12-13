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
                    <input type="text" class="text-hide" value="editaRota" name="acao">
                    <input type="text" class="text-hide" value="<?= $r->getIdRota() ?>" name="id">
                    <button type="submit" class="btn btn-primary btnEnviar">Enviar</button>
                </form>
            </div>
        </div>
    </div>