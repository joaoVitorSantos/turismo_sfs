<?php

class Imagem_rota
{

    private $imagem_r_id_imagem;
    private $rota_id_rota;

    public function __construct($imagem_r_id_imagem, $rota_id_rota)
    {
        $this->imagem_r_id_imagem = $imagem_r_id_imagem;
        $this->rota_id_rota = $rota_id_rota;
    }


    public function getImagemRIdImagem()
    {
        return $this->imagem_r_id_imagem;
    }


    public function setImagemRIdImagem($imagem_r_id_imagem)
    {
        $this->imagem_r_id_imagem = $imagem_r_id_imagem;
    }


    public function getRotaIdRota()
    {
        return $this->rota_id_rota;
    }


    public function setRotaIdRota($rota_id_rota)
    {
        $this->rota_id_rota = $rota_id_rota;
    }



}