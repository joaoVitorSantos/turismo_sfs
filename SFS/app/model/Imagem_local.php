<?php

class Imagem_local
{

    private $imagem_l_id_imagem;
    private $local_id_local;

    public function __construct($imagem_l_id_imagem, $local_id_local)
    {
        $this->imagem_l_id_imagem = $imagem_l_id_imagem;
        $this->local_id_local = $local_id_local;
    }


    public function getImagemLIdImagem()
    {
        return $this->imagem_l_id_imagem;
    }


    public function setImagemLIdImagem($imagem_l_id_imagem)
    {
        $this->imagem_l_id_imagem = $imagem_l_id_imagem;
    }


    public function getLocalIdLocal()
    {
        return $this->local_id_local;
    }


    public function setLocalIdLocal($local_id_local)
    {
        $this->local_id_local = $local_id_local;
    }

}