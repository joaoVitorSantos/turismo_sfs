<?php

class Imagem_l
{

    private $id_imagem;
    private $nome_imagem;
    private $local;
    private $maps;



    public function __construct($nome_imagem = null, $local = null, $maps = null)
    {
        $this->nome_imagem = $nome_imagem;
        $this->local = $local;
        $this->maps = $maps;
    }

    /**
     * @return null
     */
    public function getMaps()
    {
        return $this->maps;
    }

    /**
     * @param null $maps
     */
    public function setMaps($maps)
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