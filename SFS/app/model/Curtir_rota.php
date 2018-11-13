<?php

class Curtir_rota
{

    private $rota_id_rota;
    private $usuario_id_usuario;
    private $dt_curtir;
    private $avaliacao;

    public function __construct($rota_id_rota, $usuario_id_usuario, $dt_curtir, $avaliacao)
    {
        $this->rota_id_rota = $rota_id_rota;
        $this->usuario_id_usuario = $usuario_id_usuario;
        $this->dt_curtir = $dt_curtir;
        $this->avaliacao = $avaliacao;
    }


    public function getRotaIdRota()
    {
        return $this->rota_id_rota;
    }


    public function setRotaIdRota($rota_id_rota)
    {
        $this->rota_id_rota = $rota_id_rota;
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