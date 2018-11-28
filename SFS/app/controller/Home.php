<?php

require_once '../crud/CRUD_rota.php';

$c = new CRUD_rota();

if (!isset($_POST['acao'])){

    $c = new CRUD_rota();
    $rotas = $c->getRotas();

    include_once '../view/header.php';
    include_once '../view/home.php';
    include_once '../view/footer.php';
}

else {
    switch ($_POST['acao']) {
        case 'ver':
            $ro = new Rota($_POST['id_rota']);
            $res = $c->getRota($ro);
            print_r($res);
            break;
    }
}