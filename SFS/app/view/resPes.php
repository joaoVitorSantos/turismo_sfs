<body>
    <div class="container">
        <div class="col-md-12">
            <h1 class="text-left"><?php if ($_SESSION['lang'] == 'en'){traduzir('Resultados de sua pesquisa!');} else {echo 'Resultados de sua pesquisa!';}?></h1>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col"><?php if ($_SESSION['lang'] == 'en'){traduzir('Nome');} else {echo 'Nome';}?></th>
                    <th scope="col"><?php if ($_SESSION['lang'] == 'en'){traduzir('Tipo');} else {echo 'Tipo';}?></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($resultado as $re): ?>
                    <?php foreach ($re as $r): ?>
                        <tr>
                            <th scope="row"><?php if ($_SESSION['lang'] == 'en'){traduzir( $r['nome']);} else {echo  $r['nome'];}  ?></th>
                            <td><?php if ($_SESSION['lang'] == 'en'){traduzir( $r['tipo']);} else {echo  $r['tipo'];} ?></td>
                            <td>
                                <form action="<?php
                                    if ($r['tipo'] == "Local"){
                                        echo 'LocalController.php';
                                    }

                                    else{
                                        echo 'RotaController.php';
                                    }
                                ?>" method="post">
                                    <input type="text" name="acao" class="text-hide" value="ver">
                                    <input type="text" name="<?php
                                    if ($r['tipo'] == "Local"){
                                        echo 'id_local';
                                    }

                                    else{
                                        echo 'id_rota';
                                    }
                                    ?>" class="text-hide" value="<?= $r['id'] ?>">
                                    <input type="submit" class="btn btn-success small" value="<?php if ($_SESSION['lang'] == 'en'){traduzir('Ver');} else {echo 'Ver';}  ?>">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<div class="marginFooter" style="margin-bottom: 20em"></div>