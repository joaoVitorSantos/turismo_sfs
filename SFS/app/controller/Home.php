
<?php

    session_start();


require_once '../crud/CRUD_rota.php';
require_once '../crud/CRUD_usuario.php';
require_once '../crud/CRUD_Pesquisa.php';
require_once '../crud/CRUD_Imagem_rota.php';
require_once '../crud/CRUD_Imagem_local.php';
require_once '../crud/CRUD_Imagem_r.php';
require_once '../crud/CRUD_Imagem_l.php';
require_once '../crud/CRUD_local.php';
require_once '../crud/CRUD_Rota_local.php';
require_once '../model/Rota_local.php';
require_once '../crud/CRUD_estabelecimento.php';

$c = new CRUD_rota();


function loadLogin(){
    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/login.php';
    include_once '../view/template/footer.php';
}

function verificaLogin($email, $senha){
    $c = new CRUD_usuario();
    $res = $c->verificaUsuario($email, $senha);

    if ($res != false and is_object($res)){

        $_SESSION['usuario'] = $res->getUser();
        $_SESSION['id_usuario'] = $res->getIdUsuario();
        $_SESSION['tipo'] = $res->getTipoUsuarioIdTipoUsuario();

        header('location: Home.php');
    }

    else{
        echo "<script>
            alert('Email ou senha incorretos!');
        </script>
        <form id='form' method='post' action='Home.php'>
        <input style='display: none' name='acao' value='formLogin'>
        </form>
        <script>
        document.getElementById('form').submit();
        </script>
        ";
    }
}

function index(){
    header('location: Home.php');
}

function logout(){
    session_destroy();
    header('location: Home.php');
}

function loadCadastro(){
    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/cadastro.php';
    include_once '../view/template/footer.php';
}

function cadastroUser($email, $senha, $user){
    $c = new CRUD_usuario();
    $us = new Usuario(null, $email, $senha, $user,1);

    $c->createUsuario($us);

    header('location: Home.php');

}

function verificaEmail($email){
    $c = new CRUD_usuario();
    $res = $c->verificaEmail($email);

    if ($res == false){
        echo 'falso';
    }

    else {echo 'suave';}
}

function viewAdmin(){
    $c = new CRUD_rota();
    $rotas = $c->getRotas();

    $d = new CRUD_local();
    $locais = $d->getLocais();

    $e = new CRUD_estabelecimento();
    $estabelecimentos = $e->getEstabelecimentos();

    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/admin.php';
    include_once '../view/template/footer.php';
}

function viewRotaAdm($id){
    $c = new CRUD_rota();

    $rota = new Rota($id);

    $r = $c->getRota($rota);

    $m = new CRUD_Imagem_rota();
    $imgMaps = $m->get_Imagem_r_maps($r);
    $imgs = $m->get_Images_for_route($r);


    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/editRota.php';
    include_once '../view/template/footer.php';
}

function pesquisa($termo){
    $c = new CRUD_Pesquisa();

    $resultado = $c->pesquisa($termo);

    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/resPes.php';
    include_once '../view/template/footer.php';

}

function editaRota(){
    $c= new CRUD_rota();
    $cI = new CRUD_Imagem_r();
    $cIR = new CRUD_Imagem_rota();

    $rV = new Rota($_POST['id']);
    $rotaV = $c->getRota($rV);
    $cIR->delete_Imagens_rota($_POST['id']);
    $count = count($_FILES) - 2;

    if($_FILES['fotoMaps']['size'] != 0) {


        $nomearq = date('dmYhis') . $_FILES['fotoMaps']['name'];
        move_uploaded_file($_FILES['fotoMaps']['tmp_name'], '../../assets/images/' . $nomearq);
        $imM = new Imagem_r($nomearq, null, 1);
        $cI->create_imagem_r($imM);
        $id = $cI->getLast();

        $del = $cIR->get_Imagem_r_maps($rotaV);
        $asd = new Imagem_rota($del->getIdImagem(), $rotaV->getIdRota());
        $cIR->delete_Imagem_rota($asd);
        $cI->delete_Imagem_r($del);

        $imgR = new Imagem_rota($id, $_POST['id']);

        $cIR->create_imagem_rota($imgR);

    }

    if ($_FILES['fotoPrincipal']['size'] != 0) {
        print_r($_FILES['fotoPrincipal']);
        $ft_principal = date('dmYhis') . $_FILES['fotoPrincipal']['name'];
        move_uploaded_file($_FILES['fotoPrincipal']['tmp_name'], '../../assets/images/' . $ft_principal);
    }else{
        $ft_principal = $rotaV->getImagemPerfil();
    }

    $rota = new Rota($_POST['id'], $_POST['nome'], $_POST['tempo_medio'], $ft_principal, $_POST['descricao'], $_POST['link']);
    $c->updateRota($rota);

    if ($_FILES['outrasFotos1']['size'] != 0){
        for ($i = 1; $i <= $count; $i++){

            if ($_FILES['outrasFotos'.$i]['size'] != 0) {
                $nomearq = date('dmYhis') . $_FILES['outrasFotos' . $i]['name'];
                move_uploaded_file($_FILES['outrasFotos'.$i]['tmp_name'], '../../assets/images/' . $nomearq);

                $im = new Imagem_r($nomearq, null, 0);
                $cI->create_imagem_r($im);

                $id = $cI->getLast();

                $imgR = new Imagem_rota($id, $_POST['id']);
                $cIR->create_imagem_rota($imgR);
            }
        }
    }




    if(isset($_POST['fotos'])) {
        foreach ($_POST['fotos'] as $f) {
            $iR = new CRUD_Imagem_r();
            $rr = new Imagem_r(null, null,null, $f);
            $iI = $iR->get_Imagem_r($rr);
            $img = new Imagem_rota($iI->getIdImagem(), $rotaV->getIdRota());

            $cIR->create_imagem_rota($img);
        }
    }

    header('location: Home.php');

}

function excluiRota(){
    $c = new CRUD_rota();
    $a = new Rota($_POST['id']);

    $cI = new CRUD_Imagem_rota();
    $cI->deleteAllImagensRota($_POST['id']);

    $c->deleteRota($a);

    echo "
<form id='formA' method='post' action='Home.php' class='text-hide'>
<input name='acao' value='viewAdmin'>
</form>
<script>
       document.getElementById('formA').submit();
</script>
";

}

function confirmarExcluir(){
    $c = new CRUD_rota();
    $ro = new Rota($_POST['id']);
    $r = $c->getRota($ro);

    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/confirmaDR.php';
    include_once '../view/template/footer.php';

}

function confirmarExcluirL(){
    $c = new CRUD_local();
    $lo = new Local($_POST['id']);
    $local = $c->getLocal($lo);

    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/confirmaDL.php';
    include_once '../view/template/footer.php';


}

function addRotaF(){
    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/addRota.php';
    include_once '../view/template/footer.php';
}

function addLocalF(){
    $cR = new CRUD_rota();
    $rotas = $cR->getRotas();

    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/addLocal.php';
    include_once '../view/template/footer.php';
}


function addRota(){

    $rota = new Rota(null, $_POST['nome'], $_POST['tempo_medio'], null, $_POST['descricao'], $_POST['link']);

    $fotoP = date('dmYhis') . $_FILES['fotoPrincipal']['name'];
    move_uploaded_file($_FILES['fotoPrincipal']['tmp_name'], '../../assets/images/' . $fotoP);

    $rota->setImagemPerfil($fotoP);

    $c = new CRUD_rota();

    $c->createRota($rota);
    $lId = $c->getLast();

    $cIR = new CRUD_Imagem_rota();
    $cI = new CRUD_Imagem_r();
    if($_FILES['fotoMaps']['size'] != 0){
        $fotoM = date('dmYhis') . $_FILES['fotoMaps']['name'];
        move_uploaded_file($_FILES['fotoMaps']['tmp_name'], '../../assets/images/' . $fotoM);

        $maps = new Imagem_r($fotoM, null, 1);


        $cI->create_imagem_r($maps);
        $l = $cI->getLast();
        $imgR = new Imagem_rota($l, $lId);

        $cIR->create_imagem_rota($imgR);

    }

    $count = count($_FILES) - 2;

    if ($_FILES['outrasFotos1']['size'] != 0){
        for ($i = 1; $i <= $count; $i++){

            if ($_FILES['outrasFotos'.$i]['size'] != 0) {
                $nomearq = date('dmYhis') . $_FILES['outrasFotos' . $i]['name'];
                move_uploaded_file($_FILES['outrasFotos'.$i]['tmp_name'], '../../assets/images/' . $nomearq);

                $im = new Imagem_r($nomearq, null, 0);
                $cI->create_imagem_r($im);

                $id = $cI->getLast();

                $imgR = new Imagem_rota($id, $lId);
                $cIR->create_imagem_rota($imgR);
            }
        }
    }

    echo "
<form id='formA' method='post' action='Home.php' class='text-hide'>
<input name='acao' value='viewAdmin' class='text-hide'>
</form>
<script>
       document.getElementById('formA').submit();
</script>
";

}

function addLocal(){
    $local = new Local(null, $_POST['nome'],  $_POST['descricao'], null, $_POST['link']);



    $fotoP = date('dmYhis') . $_FILES['fotoPrincipal']['name'];
    move_uploaded_file($_FILES['fotoPrincipal']['tmp_name'], '../../assets/images/' . $fotoP);

    $local->setImagemPerfil($fotoP);

    $c = new CRUD_local();

    $c->createLocal($local);
    $lId = $c->getLast();

    $cIL = new CRUD_Imagem_local();
    $cI = new CRUD_Imagem_l();
    if($_FILES['fotoMaps']['size'] != 0){
        $fotoM = date('dmYhis') . $_FILES['fotoMaps']['name'];
        move_uploaded_file($_FILES['fotoMaps']['tmp_name'], '../../assets/images/' . $fotoM);

        $maps = new Imagem_l($fotoM, null, 1);


        $cI->create_imagem_l($maps);
        $l = $cI->getLast();
        $imgR = new Imagem_local($l, $lId);

        $cIL->create_imagem_local($imgR);

    }

    $count = count($_FILES) - 2;

    if ($_FILES['outrasFotos1']['size'] != 0){
        for ($i = 1; $i <= $count; $i++){

            if ($_FILES['outrasFotos'.$i]['size'] != 0) {
                $nomearq = date('dmYhis') . $_FILES['outrasFotos' . $i]['name'];
                move_uploaded_file($_FILES['outrasFotos'.$i]['tmp_name'], '../../assets/images/' . $nomearq);

                $im = new Imagem_l($nomearq, null, 0);
                $cI->create_imagem_l($im);

                $id = $cI->getLast();

                $imgR = new Imagem_local($id, $lId);
                $cIL->create_imagem_local($imgR);
            }
        }
    }

    $cRl = new CRUD_Rota_local();

    if (isset($_POST['rotas'])){
        foreach ($_POST['rotas'] as $ro){
            $rotaLocal=  new Rota_local($ro, $lId);
            $cRl->create_Rota_local($rotaLocal);
        }
    }


    echo "
<form id='formA' method='post' action='Home.php' class='text-hide'>
<input name='acao' value='viewAdmin' class='text-hide'>
</form>
<script>
       document.getElementById('formA').submit();
</script>
";
}

function editaLocalF(){
    $c= new CRUD_local();
    $cI = new CRUD_Imagem_local();
    $l = new Local($_POST['id']);
    $local = $c->getLocal($l);
    $cR = new CRUD_rota();
    $rotas = $cR->getRotas();
    $cRL = new CRUD_Rota_local();
    $asd = new Rota_local(null, $_POST['id']);
    $rotasJ = $cRL->get_rotas_por_local($asd);
    $ids = array();

    foreach ($rotasJ as $rr){
        $ids[] = $rr->getIdRota();
    }

    $imgMaps = $cI->get_Imagem_l_maps($local);

    $imgs = $cI->get_Images_for_local($local);

    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/editLocal.php';
    include_once '../view/template/footer.php';

}

function editaLocal(){
    $c= new CRUD_local();
    $cI = new CRUD_Imagem_local();
    $cI->delete_Imagens_local($_POST['id']);
    $cIL = new CRUD_Imagem_l();
    $l = new Local($_POST['id']);
    $local = $c->getLocal($l);
    $count = count($_FILES) - 2;



    if ($_FILES['fotoPrincipal']['size'] != 0) {
        $ft_principal = date('dmYhis') . $_FILES['fotoPrincipal']['name'];
        move_uploaded_file($_FILES['fotoPrincipal']['tmp_name'], '../../assets/images/' . $ft_principal);
    }else{
        $ft_principal = $local->getImagemPerfil();
    }

    $lo = new Local($_POST['id'], $_POST['nome'], $_POST['descricao'], $ft_principal, $_POST['link']);

    $c->updateLocal($lo);

    if($_FILES['fotoMaps']['size'] != 0){
        $fotoM = date('dmYhis') . $_FILES['fotoMaps']['name'];
        move_uploaded_file($_FILES['fotoMaps']['tmp_name'], '../../assets/images/' . $fotoM);

        $del = $cI->get_Imagem_l_maps($local);
        $asd = new Imagem_local($del->getIdImagem(), $local->getIdLocal());
        $cI->delete_Imagem_local($asd);
        $cIL->delete_Imagem_l($del);

        $maps = new Imagem_l($fotoM, null, 1);
        $cIL->create_imagem_l($maps);
        $l = $cIL->getLast();
        $imgR = new Imagem_local($l, $_POST['id']);

        $cI->create_imagem_local($imgR);

    }

    if ($_FILES['outrasFotos1']['size'] != 0){
        for ($i = 1; $i <= $count; $i++){

            if ($_FILES['outrasFotos'.$i]['size'] != 0) {
                $nomearq = date('dmYhis') . $_FILES['outrasFotos' . $i]['name'];
                move_uploaded_file($_FILES['outrasFotos'.$i]['tmp_name'], '../../assets/images/' . $nomearq);

                $im = new Imagem_l($nomearq, null, 0);
                $cIL->create_imagem_l($im);

                $id = $cIL->getLast();

                $imgR = new Imagem_local($id, $_POST['id']);
                $cI->create_imagem_local($imgR);
            }
        }
    }

    if(isset($_POST['fotos'])) {
        foreach ($_POST['fotos'] as $f) {
            $iR = new CRUD_Imagem_l();
            $rr = new Imagem_l(null, null,null, $f);
            $iI = $iR->get_Imagem_l($rr);
            $img = new Imagem_local($iI->getIdImagem(), $_POST['id']);

            $cI->create_imagem_local($img);
        }
    }
    $cRl = new CRUD_Rota_local();

    $cRl->delete_Rota_local_from_local($_POST['id']);

    if (isset($_POST['rotas'])){
        foreach ($_POST['rotas'] as $ro){
            $rotaLocal=  new Rota_local($ro, $_POST['id']);
            $cRl->create_Rota_local($rotaLocal);
        }
    }

    header('location: Home.php');

}

function excluirLocal(){
    $c = new CRUD_local();
    $a = new Local($_POST['id']);

    $cI = new CRUD_Imagem_local();
    $cI->deleteAllImagensRota($_POST['id']);

    $c->deleteLocal($a);

    echo "
<form id='formA' method='post' action='Home.php' class='text-hide'>
<input name='acao' value='viewAdmin'>
</form>
<script>
       document.getElementById('formA').submit();
</script>
";
}

function addEstabelecimentoF(){
    $crud = new CRUD_estabelecimento();
    $categorias = $crud->getCategorias();

    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/addEstabelecimento.php';
    include_once '../view/template/footer.php';
}

function addEstabelecimento(){

    $estabelecimento = new Estabelecimento(null, $_POST['nome'], $_POST['link_site'], $_POST['link'], null, $_POST['categorias']);

    $fotoP = date('dmYhis') . $_FILES['fotoPrincipal']['name'];
    move_uploaded_file($_FILES['fotoPrincipal']['tmp_name'], '../../assets/images/' . $fotoP);

    $estabelecimento->setImagemPerfil($fotoP);


    $c = new CRUD_estabelecimento();

    $c->createEstabelecimento($estabelecimento);

    echo "
<form id='formA' method='post' action='Home.php' class='text-hide'>
<input name='acao' value='viewAdmin' class='text-hide'>
</form>
<script>
       document.getElementById('formA').submit();
</script>
";

}



if (!isset($_POST['acao'])){

    $c = new CRUD_rota();
    $rotas = $c->getRotas();
    $num_rotas = count($rotas);

    //$estab = new Estabelecimento(null, null, null, null, null, null)
    $descricoes = [];
    foreach ($rotas as $rota){
        $descricao = $rota->getDescricao();
        $descricao_array = str_split($descricao);
        $descricoes[] = $descricao;
    }
//    $matrizes = [];
//    $palavras_encurtadas = [];
//    foreach ($descricoes as $descricao){
//        $matriz = str_split($descricao);
//        for ($i = 0; $i<= 10; $i++){
//            $palavras_encurtadas[] = $matriz[$i];
//        }
//        $matrizes[] = $matriz;
//    }



    include_once '../view/template/header.php';
    include_once '../view/template/navbar.php';
    include_once '../view/home.php';
    include_once '../view/template/footer.php';
}

else {
    switch ($_POST['acao']) {
        case 'formLogin':
            loadLogin();
            break;

        case 'verificaLogin':
            verificaLogin($_POST['email'], $_POST['senha']);
            break;

        case 'logout':
            logout();
            break;

        case 'cadastroForm':
            loadCadastro();
            break;

        case 'cadastroUsuario':
            cadastroUser($_POST['email'], $_POST['senha'], $_POST['user']);
            break;

        case 'verificaE':
            verificaEmail($_POST['email']);
            break;

        case 'viewAdmin':
            viewAdmin();
            break;

        case 'editarR':
            viewRotaAdm($_POST['id']);
            break;

        case 'editaRota':
            editaRota();
            break;

        case 'pesquisa':
            pesquisa($_POST['termo']);
            break;

        case 'excluirR':
            confirmarExcluir();
            break;

        case 'deleteRota':
            excluiRota();
            break;

        case 'addRotaF':
            addRotaF();
            break;

        case 'addRota':
            addRota();
            break;

        case 'editarL':
            editaLocalF();
            break;

        case 'editaLocal':
            editaLocal();
            break;

        case 'excluirL':
            confirmarExcluirL();
            break;

        case 'deleteLocal':
            excluirLocal();
            break;

        case 'addLocalF':
            addLocalF();
            break;

        case 'addLocal':
            addLocal();
            break;
        case 'addEstabelecimentoF':
            addEstabelecimentoF();
            break;
        case 'addEstabelecimento':
            addEstabelecimento();
            break;
        default:
            index();
            break;
    }

}