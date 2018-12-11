<?php

class Local
{

    private $id_local;
    private $nome_local;
    private $descricao;
    private $imagem_perfil;

    public function __construct($id_local, $nome_local, $descricao, $imagem_perfil)
    {
        $this->id_local = $id_local;
        $this->nome_local = $nome_local;
        $this->descricao = $descricao;
        $this->imagem_perfil = $imagem_perfil;
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

