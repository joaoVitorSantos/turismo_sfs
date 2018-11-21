<?php

class Curtir_local
{

    private $local_id_local;
    private $usuario_id_usuario;
    private $dt_curtir;
    private $avaliacao;

    public function __construct($local_id_local, $usuario_id_usuario, $avaliacao)
    {
        $this->local_id_local = $local_id_local;
        $this->usuario_id_usuario = $usuario_id_usuario;
        $this->avaliacao = $avaliacao;
    }


    public function getLocalIdLocal()
    {
        return $this->local_id_local;
    }


    public function setLocalIdLocal($local_id_local)
    {
        $this->local_id_local = $local_id_local;
    }


    public function getUsuarioIdUsuario()
    {
        return $this->usuario_id_usuario;
    }


    public function setUsuarioIdUsuario($usuario_id_usuario)
    {
        $this->usuario_id_usuario = $usuario_id_usuario;
    }


    public function getDtCurtir()
    {
        return $this->dt_curtir;
    }


    public function setDtCurtir($dt_curtir)
    {
        $this->dt_curtir = $dt_curtir;
    }


    public function getAvaliacao()
    {
        return $this->avaliacao;
    }


    public function setAvaliacao($avaliacao)
    {
        $this->avaliacao = $avaliacao;
    }

}