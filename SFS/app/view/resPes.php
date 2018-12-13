<body>
    <div class="container">
        <div class="col-md-12">
            <h1>Resultados de sua pesquisa!</h1>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Tipo</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($resultado as $re): ?>
                    <?php foreach ($re as $r): ?>
                        <tr>
                            <th scope="row"><?= $r['nome'] ?></th>
                            <td><?= $r['tipo'] ?></td>
                            <td>
                                <form action="Home.php" method="post">
                                    <input type="text" name="acao" class="text-hide" value="ver">
                                    <input type="text" name="id" class="text-hide" value="<?= $r['id'] ?>">
                                    <input type="submit" class="btn btn-success small" value="Ver">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>