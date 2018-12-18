<?php

class Imagem_r
{

    private $id_imagem;
    private $nome_imagem;
    private $local;
    private $maps;



    public function __construct($nome_imagem=null, $local=null, $maps=null, $id_imagem=null)
    {
        $this->nome_imagem = $nome_imagem;
        $this->local = $local;
        $this->maps = $maps;
        $this->id_imagem = $id_imagem;
    }

    /**
     * @return mixed
     */
    public function getMaps()
    {
        return $this->maps;
    }

    /**
     * @param mixed $maps
     */
    public function setMaps($maps): void
    {
        $this->maps = $maps;
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