<?php

require_once '../crud/CRUD_rota.php';

$c = new CRUD_rota();

function loadRota(){
    $c = new CRUD_rota();
    $ro = new Rota($_POST['id_rota']);
    $res = $c->getRota($ro);

    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/rota.php';
    include_once '../view/template/footer.php';

}

if (!isset($_POST['acao'])){

    $c = new CRUD_rota();
    $rotas = $c->getRotas();

    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/home.php';
    include_once '../view/template/footer.php';
}

else {
    switch ($_POST['acao']) {
        case 'ver':
            loadRota();
            break;
    }
}