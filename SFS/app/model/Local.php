<?php

class Local
{

    private $id_local;
    private $nome_local;
    private $descricao;
    private $imagem_perfil;
    private $link;


    public function __construct($id_local = null, $nome_local = null, $descricao = null, $imagem_perfil = null, $link = null)
    {
        $this->id_local = $id_local;
        $this->nome_local = $nome_local;
        $this->descricao = $descricao;
        $this->imagem_perfil = $imagem_perfil;
        $this->link = $link;
    }

    /**
     * @return null
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param null $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getIdLocal()
    {
        return $this->id_local;
    }


    public function setIdLocal($id_local)
    {
        $this->id_local = $id_local;
    }


    public function getNomeLocal()
    {
        return $this->nome_local;
    }


    public function setNomeLocal($nome_local)
    {
        $this->nome_local = $nome_local;
    }


    public function getDescricao()
    {
        return $this->descricao;
    }


    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }


    public function getImagemPerfil()
    {
        return $this->imagem_perfil;
    }


    public function setImagemPerfil($imagem_perfil)
    {
        $this->imagem_perfil = $imagem_perfil;
    }

}

