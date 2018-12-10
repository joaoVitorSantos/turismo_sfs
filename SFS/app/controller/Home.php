<?php

session_start();


require_once '../crud/CRUD_rota.php';
require_once '../crud/CRUD_usuario.php';

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

    if ($res == 'false'){
        return 'falso';
    }

    return 'suave';
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

        case 'verificaEmail':
            verificaEmail($_POST['email']);

        default:
            index();
            break;
    }

}