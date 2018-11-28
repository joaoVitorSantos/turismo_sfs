<?php

class Imagem_l
{

    private $id_imagem;
    private $nome_imagem;
    private $local;

    public function __construct($nome_imagem, $local)
    {
        $this->nome_imagem = $nome_imagem;
        $this->local = $local;
    }


    public function getIdImagem()
    {
        return $this->id_imagem;
    }


    public function setIdImagem($id_imagem)
    {
        $this->id_imagem = $id_imagem;
    }


    public function getNomeImagem()
    {
        return $this->nome_imagem;
    }


    public function setNomeImagem($nome_imagem)
    {
        $this->nome_imagem = $nome_imagem;
    }


    public function getLocal()
    {
        return $this->local;
    }


    public function setLocal($local)
    {
        $this->local = $local;
    }

}