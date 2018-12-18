
<?php

    session_start();


require_once '../crud/CRUD_rota.php';
require_once '../crud/CRUD_local.php';
require_once '../crud/CRUD_usuario.php';
require_once '../crud/CRUD_Pesquisa.php';
require_once '../crud/CRUD_Imagem_rota.php';
require_once '../crud/CRUD_Imagem_r.php';

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
        $ft_principal = date('dmYhis') . $_FILES['fotoPrincipal']['name'];
        move_uploaded_file($_FILES['fotoPrincipal']['tmp_name'], '../../assets/images/' . $ft_principal);
    }else{
        $ft_principal = $rV->getImagemPerfil();
    }

    $rota = new Rota($_POST['id'], $_POST['nome'], $_POST['tempo_medio'], $ft_principal, $_POST['descricao']);
    $c->updateRota($rota);

    if ($_FILES['outrasFotos1']['size'] != 0){
        for ($i = 1; $i <= $count; $i++){
            $nomearq = date('dmYhis').$_FILES['outrasFotos'.$i]['name'];
            move_uploaded_file($_FILES['outrasFotos'.$i]['tmp_name'], '../../assets/images/'.$nomearq);

            $im = new Imagem_r($nomearq, null, 0);
            $cI->create_imagem_r($im);

            $id = $cI->getLast();

            $imgR = new Imagem_rota($id, $_POST['id']);
            $cIR->create_imagem_rota($imgR);

        }
    }

    header('location: Home.php');

    //print_r($_FILES);

}


if (!isset($_POST['acao'])){

    $c = new CRUD_rota();
    $rotas = $c->getRotas();
    $num_rotas = count($rotas);

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


    $l = new CRUD_local();
    $locais = $l->getLocais();

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

        default:
            index();
            break;
    }

}