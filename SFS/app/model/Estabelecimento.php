<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/13/2018
 * Time: 1:33 PM
 */

class Estabelecimento
{
    private $id_estabelecimento = null;
    private $nome_estabelecimento;
    private $link_site;
    private $link_maps;
    private $imagem_perfil;
    private $tipo_estabelecimento_id_tipo_estabelecimento;

    public function __construct($id_estabelecimento, $nome_estabelecimento, $link_site, $link_maps, $imagem_perfil, $tipo_estabelecimento_id_tipo_estabelecimento)
    {
        $this->id_estabelecimento = $id_estabelecimento;
        $this->nome_estabelecimento = $nome_estabelecimento;
        $this->link_site = $link_site;
        $this->link_maps = $link_maps;
        $this->imagem_perfil = $imagem_perfil;
        $this->tipo_estabelecimento_id_tipo_estabelecimento = $tipo_estabelecimento_id_tipo_estabelecimento;
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
    public function setIdEstabelecimento($id_estabelecimento)
    {
        $this->id_estabelecimento = $id_estabelecimento;
    }

    /**
     * @return mixed
     */
    public function getNomeEstabelecimento()
    {
        return $this->nome_estabelecimento;
    }

    /**
     * @param mixed $nome_estabelecimento
     */
    public function setNomeEstabelecimento($nome_estabelecimento)
    {
        $this->nome_estabelecimento = $nome_estabelecimento;
    }

    /**
     * @return mixed
     */
    public function getLinkSite()
    {
        return $this->link_site;
    }

    /**
     * @param mixed $link_site
     */
    public function setLinkSite($link_site)
    {
        $this->link_site = $link_site;
    }

    /**
     * @return mixed
     */
    public function getLinkMaps()
    {
        return $this->link_maps;
    }

    /**
     * @param mixed $link_maps
     */
    public function setLinkMaps($link_maps)
    {
        $this->link_maps = $link_maps;
    }

    /**
     * @return mixed
     */
    public function getImagemPerfil()
    {
        return $this->imagem_perfil;
    }

    /**
     * @param mixed $imagem_perfil
     */
    public function setImagemPerfil($imagem_perfil)
    {
        $this->imagem_perfil = $imagem_perfil;
    }

    /**
     * @return mixed
     */
    public function getTipoEstabelecimentoIdTipoEstabelecimento()
    {
        return $this->tipo_estabelecimento_id_tipo_estabelecimento;
    }

    /**
     * @param mixed $tipo_estabelecimento_id_tipo_estabelecimento
     */
    public function setTipoEstabelecimentoIdTipoEstabelecimento($tipo_estabelecimento_id_tipo_estabelecimento)
    {
        $this->tipo_estabelecimento_id_tipo_estabelecimento = $tipo_estabelecimento_id_tipo_estabelecimento;
    }


}