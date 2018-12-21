<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/20/2018
 * Time: 9:08 AM
 */
require_once __DIR__."/../crud/CRUD_estabelecimento.php";

session_start();

function lista(){
    if ($_GET['id'] == 1) {
        $a = new CRUD_estabelecimento();
        $res = $a->getEstabelecimentosGastronomia();
        $categoria = "Gastronomia";
    }elseif ($_GET['id'] == 2) {
        $b = new CRUD_estabelecimento();
        $res = $b->getEstabelecimentosHospedagem();
        $categoria = "Hospedagem";
    }elseif ($_GET['id'] == 3) {
        $c = new CRUD_estabelecimento();
        $res = $c->getEstabelecimentosServicos();
        $categoria = "Serviços";
    }elseif ($_GET['id'] == 4) {
        $d = new CRUD_estabelecimento();
        $res = $d->getEstabelecimentosArquitetura();
        $categoria = "Arquitetura";
    }elseif ($_GET['id'] == 5){
        $e = new CRUD_estabelecimento();
        $res = $e->getEstabelecimentosMuseus();
        $categoria = "Museu";
    }

    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/lista.php';
    include_once '../view/template/footer.php';

}

function loadEstabelecimento(){
    $a = new Estabelecimento($_POST['id_estabelecimento']);
    $b = new CRUD_estabelecimento();
    $res = $b->getEstabelecimento($a);
    $categoria = $b->getCategoriaEstabelecimento($a);

    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/estabelecimento.php';
    include_once '../view/template/footer.php';
}
if (isset($_GET['acao']) AND $_GET['acao'] == 'verLista'){
        lista();
}elseif ($_POST['acao'] == 'ver'){
        loadEstabelecimento();
}
