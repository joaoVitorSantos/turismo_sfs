<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/18/2018
 * Time: 1:39 PM
 */

require_once __DIR__."/../crud/CRUD_local.php";
require_once __DIR__."/../crud/CRUD_Curtir_local.php";
require_once __DIR__."/../crud/CRUD_Imagem_local.php";

session_start();

function load_local(){
    $c = new CRUD_local();
    $local = new Local($_POST['id_local']);
    $res = $c->getLocal($local);
    $cl = new Curtir_local($_POST['id_local']);
    $ccl = new CRUD_Curtir_local();
    $avaliacaoGeralReal = $ccl->get_media_Curtidas_local_round($cl);
    $cil = new CRUD_Imagem_local();
    $imgMaps = $cil->get_Imagem_l_maps($local);

    if(isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];
        $curtir_local = new Curtir_local($res->getIdLocal(), $id_usuario, "");
        $cr = new CRUD_Curtir_local();
        $avaliacaoGeral = $cr->get_media_Curtidas_local_round($curtir_local);
        $avaliacaoGeralReal = $cr->get_media_Curtidas_local($curtir_local);
        $curtida = $cr->get_Curtir_local($curtir_local);
        if ($curtida->getUsuarioIdUsuario() != null and $curtida->getLocalIdLocal() != null) {
            $curtida = $cr->get_Curtir_local_verificacao($curtida);
            $avaliacaoPropria = $curtida->getAvaliacao();
            if ($avaliacaoPropria == null) {
                $avaliacaoPropria = 0;
            }
        }

    }


    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/local.php';
    include_once '../view/template/footer.php';
}

function curtirLocal()
{
    if(is_numeric($_POST['id_usuario'])) {

        $avaliacao = $_POST['avaliacao'];
        $id_usuario = $_POST['id_usuario'];
        $id_local = $_POST['id_local'];
        $crud = new CRUD_Curtir_local();
        $curtida = new Curtir_local($id_local, $id_usuario, $avaliacao);
        $comparacao = $crud->get_Curtir_local_verificacao($curtida);
        if ($comparacao->getUsuarioIdUsuario() == null and isset($id_usuario) == true) {
            $crud->create_Curtir_local($curtida);
        } elseif ($comparacao->getAvaliacao() != $curtida->getAvaliacao() and $comparacao->getUsuarioIdUsuario() == $curtida->getUsuarioIdUsuario()) {
            $crud->update_Curtir_local($curtida);
        }
        $avaliacaoGeralReal = $crud->get_media_Curtidas_local($curtida);



    }

    else{

        echo "nao";
    }

}
function getMedAval(){
    $c = new CRUD_local();
    $ro = new Local($_POST['id_local']);
    $res = $c->getLocal($ro);

    $crud = new CRUD_Curtir_local();

    $curtir_local = new Curtir_local($res->getIdLocal(), null, "");
    $avaliacaoGeralReal = $crud->get_media_Curtidas_local($curtir_local);

    echo $avaliacaoGeralReal;

}
switch ($_POST['acao']){
    case'ver':
        load_local();
        break;
    case'curtir':
        curtirLocal();
        break;
    case 'avalMed':
        getMedAval();
        break;
}