<?php

class Conexao
{
    const HOST      = "localhost";
    const NOMEBANCO = "turismo_sfs";
    const USUARIO   = "root";
    const SENHA     = "";

    public static function getConexao(){
        $conexao = new PDO("mysql:host=".self::HOST.";dbname=".self::NOMEBANCO.";charset=utf8", self::USUARIO, self::SENHA);
        return $conexao;
    }

}