<?php

class Rota
{

    private $id_rota;
    private $nome_rota;
    private $tempo_medio;
    private $imagem_perfil;
    private $descricao;

    public function __construct($nome_rota = null, $tempo_medio = null, $imagem_perfil = null, $descricao = null)
    {

        $this->nome_rota = $nome_rota;
        $this->tempo_medio = $tempo_medio;
        $this->imagem_perfil = $imagem_perfil;
        $this->descricao = $descricao;

    }

    public function getIdRota()
    {
        return $this->id_rota;
    }


    public function setIdRota($id_rota)
    {
        $this->id_rota = $id_rota;
    }


    public function getNomeRota()
    {
        return $this->nome_rota;
    }


    public function setNomeRota($nome_rota)
    {
        $this->nome_rota = $nome_rota;
    }


    public function getTempoMedio()
    {
        return $this->tempo_medio;
    }


    public function setTempoMedio($tempo_medio)
    {
        $this->tempo_medio = $tempo_medio;
    }


    public function getImagemPerfil()
    {
        return $this->imagem_perfil;
    }


    public function setImagemPerfil($imagem_perfil)
    {
        $this->imagem_perfil = $imagem_perfil;
    }


    public function getDescricao()
    {
        return $this->descricao;
    }


    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

}
