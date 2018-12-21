<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/13/2018
 * Time: 2:34 PM
 */
require_once '../model/Conexao.php';
require_once '../model/Estabelecimento.php';

class CRUD_estabelecimento
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getEstabelecimento(Estabelecimento $e){
        $sql = "SELECT * FROM estabelecimento WHERE id_estabelecimento = {$e->getIdEstabelecimento()}";

        try{
            $res = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        $estabelecimento = new Estabelecimento($res['id_estabelecimento'], $res['nome_estabelecimento'], $res['link_site'], $res['link_maps'], $res['imagem_perfil'], $res['tipo_estabelecimento_id_tipo_estabelecimento']);

        return $estabelecimento;
    }

    public function getEstabelecimentos(){
        $sql = "SELECT * FROM estabelecimento";

        try{
            $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        $estabelecimentos = array();

        foreach ($resultado as $r){
            $estabelecimento = new Estabelecimento($r['id_estabelecimento'], $r['nome_estabelecimento'], $r['link_site'], $r['link_maps'], $r['imagem_perfil'], $r['tipo_estabelecimento_id_tipo_estabelecimento']);
            $estabelecimentos[] = $estabelecimento;
        }

        return $estabelecimentos;

    }

    public function getEstabelecimentosGastronomia(){
        $sql = "SELECT * FROM estabelecimento WHERE tipo_estabelecimento_id_tipo_estabelecimento = 1";

        try{
            $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        $estabelecimentos = array();

        foreach ($resultado as $r){
            $estabelecimento = new Estabelecimento($r['id_estabelecimento'], $r['nome_estabelecimento'], $r['link_site'], $r['link_maps'], $r['imagem_perfil'], $r['tipo_estabelecimento_id_tipo_estabelecimento']);
            $estabelecimentos[] = $estabelecimento;
        }

        return $estabelecimentos;

    }

    public function getEstabelecimentosHospedagem(){
        $sql = "SELECT * FROM estabelecimento WHERE tipo_estabelecimento_id_tipo_estabelecimento = 2";

        try{
            $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        $estabelecimentos = array();

        foreach ($resultado as $r){
            $estabelecimento = new Estabelecimento($r['id_estabelecimento'], $r['nome_estabelecimento'], $r['link_site'], $r['link_maps'], $r['imagem_perfil'], $r['tipo_estabelecimento_id_tipo_estabelecimento']);
            $estabelecimentos[] = $estabelecimento;
        }

        return $estabelecimentos;

    }

    public function getEstabelecimentosServicos(){
        $sql = "SELECT * FROM estabelecimento WHERE tipo_estabelecimento_id_tipo_estabelecimento = 3";

        try{
            $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        $estabelecimentos = array();

        foreach ($resultado as $r){
            $estabelecimento = new Estabelecimento($r['id_estabelecimento'], $r['nome_estabelecimento'], $r['link_site'], $r['link_maps'], $r['imagem_perfil'], $r['tipo_estabelecimento_id_tipo_estabelecimento']);
            $estabelecimentos[] = $estabelecimento;
        }

        return $estabelecimentos;

    }

    public function getEstabelecimentosArquitetura(){
        $sql = "SELECT * FROM estabelecimento WHERE tipo_estabelecimento_id_tipo_estabelecimento = 4";

        try{
            $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        $estabelecimentos = array();

        foreach ($resultado as $r){
            $estabelecimento = new Estabelecimento($r['id_estabelecimento'], $r['nome_estabelecimento'], $r['link_site'], $r['link_maps'], $r['imagem_perfil'], $r['tipo_estabelecimento_id_tipo_estabelecimento']);
            $estabelecimentos[] = $estabelecimento;
        }

        return $estabelecimentos;

    }

    public function getEstabelecimentosMuseus(){
        $sql = "SELECT * FROM estabelecimento WHERE tipo_estabelecimento_id_tipo_estabelecimento = 5";

        try{
            $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        $estabelecimentos = array();

        foreach ($resultado as $r){
            $estabelecimento = new Estabelecimento($r['id_estabelecimento'], $r['nome_estabelecimento'], $r['link_site'], $r['link_maps'], $r['imagem_perfil'], $r['tipo_estabelecimento_id_tipo_estabelecimento']);
            $estabelecimentos[] = $estabelecimento;
        }

        return $estabelecimentos;

    }


    public function createEstabelecimento(Estabelecimento $l){
        $sql = "INSERT INTO estabelecimento(nome_estabelecimento, link_site, link_maps, imagem_perfil, tipo_estabelecimento_id_tipo_estabelecimento) VALUES ('{$l->getNomeEstabelecimento()}','{$l->getLinkSite()}','{$l->getLinkMaps()}', '{$l->getImagemPerfil()}', '{$l->getTipoEstabelecimentoIdTipoEstabelecimento()}')";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;

    }

    public function updateEstabelecimento(Estabelecimento $l){
        $sql = "UPDATE `estabelecimento` SET nome_estabelecimento='{$l->getNomeEstabelecimento()}',`link_site`='{$l->getLinkSite()}', link_maps = '{$l->getLinkMaps()}', imagem_perfil = '{$l->getImagemPerfil()}', tipo_estabelecimento_id_tipo_estabelecimento = '{$l->getTipoEstabelecimentoIdTipoEstabelecimento()}'
                WHERE id_estabelecimento = {$l->getIdEstabelecimento()}";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;

    }

    public function deleteEstabelecimento(Estabelecimento $estabelecimento){
        $sql1 = "DELETE FROM `curtir_estabelecimento` WHERE `estabelecimento_id_estabelecimento` = '{$estabelecimento->getIdEstabelecimento()}'";
        $this->conexao->exec($sql1);
        $sql2 = "DELETE FROM `estabelecimento` WHERE id_estabelecimento = '{$estabelecimento->getIdEstabelecimento()}'";
        $this->conexao->exec($sql2);
    }

    public function getCategoriaEstabelecimento(Estabelecimento$estabelecimento){
        $sql = "SELECT tipo_estabelecimento.desc as a FROM `estabelecimento`, tipo_estabelecimento WHERE tipo_estabelecimento.id_tipo_estabelecimento = id_estabelecimento and id_estabelecimento = '{$estabelecimento->getIdEstabelecimento()}'";
        try{
            $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        return $resultado['a'];
    }
}

//Teste FEITO
