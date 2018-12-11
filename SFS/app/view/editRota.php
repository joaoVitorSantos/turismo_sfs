<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="../controller/Home.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome da Rota</label>
                        <input type="text" value="<?= $r->getNomeRota() ?>" required name="nome" class="form-control" id="nome" placeholder="Nome da Rota">
                    </div>
                    <div class="form-group">
                        <label for="tempo_medio">Tempo Médio</label>
                        <input type="text" value="<?= $r->getTempoMedio() ?>" required name="tempo_medio" class="form-control" id="tempo_medio" placeholder="Ex: 1 hora">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" value="<?= $r->getDescricao() ?>" required name="descricao" class="form-control" id="descricao" placeholder="Descrição da Rota">
                    </div>
                    <input type="text" class="text-hide" value="editaRota" name="acao">
                    <input type="text" class="text-hide" value="<?= $r->getIdRota() ?>" name="id">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>