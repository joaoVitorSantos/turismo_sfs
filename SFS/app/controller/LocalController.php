<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/18/2018
 * Time: 1:39 PM
 */

require_once __DIR__."/../crud/CRUD_local.php";

switch ($_POST['acao']){
    case'ver':
        $c = new CRUD_local();
        $local = new Local($_POST['id_local']);
        $res = $c->getLocal($local);



        include_once '../view/template/header.php';
        include_once '../view/template/navbar.php';
        include_once '../view/local.php';
        include_once '../view/template/footer.php';
        break;
}