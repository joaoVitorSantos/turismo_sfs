<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/17/2018
 * Time: 2:17 PM
 */
session_start();

require_once '../crud/CRUD_rota.php';
require_once '../crud/CRUD_local.php';
require_once '../crud/CRUD_usuario.php';
require_once '../crud/CRUD_Pesquisa.php';
require_once '../crud/CRUD_Imagem_rota.php';
require_once '../crud/CRUD_Imagem_r.php';
require_once __DIR__. '/../crud/CRUD_Curtir_rota.php';
require_once __DIR__. '/../crud/CRUD_Rota_local.php';
require_once '../composer/traducao.php';

function loadRota()
{

    $c = new CRUD_rota();
    $ro = new Rota($_POST['id_rota']);
    $res = $c->getRota($ro);

    $m = new CRUD_Imagem_rota();
    $imgMaps = $m->get_Imagem_r_maps($ro);
    $imagens = $m->get_Images_for_route($ro);

    $l = new CRUD_Rota_local();
    $locais = $l->get_locais_por_rota($res);


    if(isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];
        $curtir_rota = new Curtir_rota($res->getIdRota(), $id_usuario, "");
        $cr = new CRUD_Curtir_rota();
        $avaliacaoGeral = $cr->get_media_Curtidas_rota_round($curtir_rota);
        $avaliacaoGeralReal = $cr->get_media_Curtidas_rota($curtir_rota);
        $curtida = $cr->get_Curtir_r($curtir_rota);
        if ($curtida->getUsuarioIdUsuario() != null and $curtida->getRotaIdRota() != null) {
            $curtida = $cr->get_Curtir_r_verificacao($curtida);
            $avaliacaoPropria = $curtida->getAvaliacao();
            if ($avaliacaoPropria == null) {
                $avaliacaoPropria = 0;
            }
        }

    }
    else{
        $cr = new CRUD_Curtir_rota();
        $curtir_rota = new Curtir_rota($res->getIdRota(), null, "");
        $avaliacaoGeral = $cr->get_media_Curtidas_rota_round($curtir_rota);
        $avaliacaoGeralReal = $cr->get_media_Curtidas_rota($curtir_rota);
    }

    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/rota.php';
    include_once '../view/template/footer.php';
}
function curtirRota()
{

    if(is_numeric($_POST['id_usuario'])) {

        $avaliacao = $_POST['avaliacao'];
        $id_usuario = $_POST['id_usuario'];
        $id_rota = $_POST['id_rota'];
        $crud = new CRUD_Curtir_rota();
        $curtida = new Curtir_rota($id_rota, $id_usuario, $avaliacao);
        $comparacao = $crud->get_Curtir_r_verificacao($curtida);
        if ($comparacao->getUsuarioIdUsuario() == null and isset($id_usuario) == true) {
            $crud->create_Curtir_rota($curtida);
        } elseif ($comparacao->getAvaliacao() != $curtida->getAvaliacao() and $comparacao->getUsuarioIdUsuario() == $curtida->getUsuarioIdUsuario()) {
            $crud->update_Curtir_rota($curtida);
        }
        $avaliacaoGeralReal = $crud->get_media_Curtidas_rota($curtida);



    }

    else{

        echo "nao";
    }

}

function getMedAval(){
    $c = new CRUD_rota();
    $ro = new Rota($_POST['id_rota']);
    $res = $c->getRota($ro);

    $crud = new CRUD_Curtir_rota();

    $curtir_rota = new Curtir_rota($res->getIdRota(), null, "");
    $avaliacaoGeralReal = $crud->get_media_Curtidas_rota($curtir_rota);

    echo $avaliacaoGeralReal;

}

switch ($_POST['acao']) {
    case 'ver':
        loadRota();
        break;
    case 'curtir':
        curtirRota();
        break;
    case 'avalMed':
        getMedAval();
        break;

}