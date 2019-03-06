<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/13/2018
 * Time: 1:38 PM
 */

class Rota_local
{
    private $id_rota;
    private $id_local;

    public function __construct($id_rota= null, $id_local= null)
    {
        $this->id_rota = $id_rota;
        $this->id_local = $id_local;

    }

    /**
     * @return mixed
     */
    public function getIdRota()
    {
        return $this->id_rota;
    }

    /**
     * @param mixed $id_rota
     */
    public function setIdRota($id_rota)
    {
        $this->id_rota = $id_rota;
    }

    /**
     * @return mixed
     */
    public function getIdLocal()
    {
        return $this->id_local;
    }

    /**
     * @param mixed $id_local
     */
    public function setIdLocal($id_local)
    {
        $this->id_local = $id_local;
    }
}