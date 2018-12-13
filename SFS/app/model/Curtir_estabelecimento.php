<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/13/2018
 * Time: 1:17 PM
 */

class Curtir_estabelecimento
{
    private $id_estabelecimento;
    private $id_usuario;
    private $dt_curtir;
    private $avaliacao;

    public function __construct($id_estabelecimento, $id_usuario, $avaliacao)
    {
        $this->id_estabelecimento = $id_estabelecimento;
        $this->id_usuario = $id_usuario;
        $this->avaliacao = $avaliacao;
    }

    /**
     * @return mixed
     */
    public function getIdEstabelecimento()
    {
        return $this->id_estabelecimento;
    }

    /**
     * @param mixed $id_estabelecimento
     */
    public function setIdEstabelecimento($id_estabelecimento): void
    {
        $this->id_estabelecimento = $id_estabelecimento;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @return mixed
     */
    public function getDtCurtir()
    {
        return $this->dt_curtir;
    }

    /**
     * @param mixed $dt_curtir
     */
    public function setDtCurtir($dt_curtir): void
    {
        $this->dt_curtir = $dt_curtir;
    }

    /**
     * @return mixed
     */
    public function getAvaliacao()
    {
        return $this->avaliacao;
    }

    /**
     * @param mixed $avaliacao
     */
    public function setAvaliacao($avaliacao): void
    {
        $this->avaliacao = $avaliacao;
    }

}