<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/20/2018
 * Time: 9:08 AM
 */
require_once __DIR__."/../crud/CRUD_estabelecimento.php";
require_once __DIR__."/../crud/CRUD_Curtir_estabelecimento.php";

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
    $categoria = $b->getCategoriaEstabelecimento($res);


    if(isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];
        $curtir_estabelecimento = new Curtir_estabelecimento($res->getIdEstabelecimento(), $id_usuario, "");
        $cr = new CRUD_Curtir_estabelecimento();
        //$avaliacaoGeralReal = $cr->get_media_Curtidas_estabelecimento_round($curtir_estabelecimento);
        $avaliacaoGeralReal = $cr->get_media_Curtidas_estabelecimento($curtir_estabelecimento);
        $curtida = $cr->get_Curtir_estabelecimento($curtir_estabelecimento);
        if ($curtida->getIdUsuario() != null and $curtida->getIdEstabelecimento() != null) {
            $curtida = $cr->get_Curtir_estabelecimento_verificacao($curtida);
            $avaliacaoPropria = $curtida->getAvaliacao();
            if ($avaliacaoPropria == null) {
                $avaliacaoPropria = 0;
            }
        }

    }
    else{
        $cr = new CRUD_Curtir_estabelecimento();
        $curtir_estabelecimento = new Curtir_estabelecimento($res->getIdEstabelecimento(), null, "");
        $avaliacaoGeralReal = $cr->get_media_Curtidas_estabelecimento_round($curtir_estabelecimento);
        //$avaliacaoGeralReal = $cr->get_media_Curtidas_estabelecimento($curtir_estabelecimento);
    }

    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/estabelecimento.php';
    include_once '../view/template/footer.php';
}

function curtirEstabelecimento()
{

    if(is_numeric($_POST['id_usuario'])) {

        $avaliacao = $_POST['avaliacao'];
        $id_usuario = $_POST['id_usuario'];
        $id_estabelecimento = $_POST['id_estabelecimento'];
        $crud = new CRUD_Curtir_estabelecimento();
        $curtida = new Curtir_estabelecimento($id_estabelecimento, $id_usuario, $avaliacao);
        $comparacao = $crud->get_Curtir_estabelecimento_verificacao($curtida);

        if ($comparacao->getIdUsuario() == null and isset($id_usuario) == true) {
            $crud->create_Curtir_estabelecimento($curtida);
        } elseif ($comparacao->getAvaliacao() != $curtida->getAvaliacao() and $comparacao->getIdUsuario() == $curtida->getIdUsuario()) {
            $crud->update_Curtir_estabelecimento($curtida);
        }
        $avaliacaoGeralReal = $crud->get_media_Curtidas_estabelecimento($curtida);




    }

    else{

        echo "nao";
    }

}

function getMedAval(){
    $c = new CRUD_estabelecimento();
    $ro = new Estabelecimento($_POST['id_estabelecimento']);
    $res = $c->getEstabelecimento($ro);

    $crud = new CRUD_Curtir_estabelecimento();

    $curtir_estabelecimento = new Curtir_estabelecimento($res->getIdEstabelecimento(), null, "");
    $avaliacaoGeralReal = $crud->get_media_Curtidas_estabelecimento($curtir_estabelecimento);

    echo $avaliacaoGeralReal;

}

if (isset($_GET['acao']) AND $_GET['acao'] == 'verLista'){
        lista();
}elseif ($_POST['acao'] == 'ver'){
        loadEstabelecimento();
}elseif ($_POST['acao'] == 'curtir'){
        curtirEstabelecimento();
}elseif ($_POST['acao'] == 'avalMed'){
        getMedAval();
}
