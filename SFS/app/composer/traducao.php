<?php

require_once ('vendor/autoload.php');
use \Statickidz\GoogleTranslate;

function traduzir($texto){

    $source = 'pt';
    $target = 'en';
    $text = $texto;

    $trans = new GoogleTranslate();
    $result = $trans->translate($source, $target, $text);

    echo $result;

}

