<?php

class Conexao
{
    const HOST      = "localhost";
    const NOMEBANCO = "id8290707_turismo_sfs";
    const USUARIO   = "id8290707_russo";
    const SENHA     = "mateuserkmann08";

    public static function getConexao(){
        $conexao = new PDO("mysql:host=".self::HOST.";dbname=".self::NOMEBANCO.";charset=utf8", self::USUARIO, self::SENHA);
        return $conexao;
    }

}