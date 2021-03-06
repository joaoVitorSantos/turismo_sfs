<?php

require_once '../model/Conexao.php';
require_once '../model/Local.php';

class CRUD_local
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getLocal(Local $l){
        $sql = "SELECT * FROM local WHERE id_local = {$l->getIdLocal()}";

        try{
            $res = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        $local = new Local($res['id_local'], $res['nome_local'], $res['descricao'], $res['imagem_perfil'], $res['link']);

        return $local;
    }

    public function getLocais(){
        $sql = "SELECT * FROM local";

        try{
            $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        $locais = array();

        foreach ($resultado as $r){
            $loca = new Local($r['id_local'], $r['nome_local'], $r['descricao'], $r['imagem_perfil'], $r['link']);
            $locais[] = $loca;
        }

        return $locais;

    }

    public function createLocal(Local $l){
        $sql = "INSERT INTO local (nome_local, descricao, imagem_perfil, link) VALUES ('{$l->getNomeLocal()}', '{$l->getDescricao()}', '{$l->getImagemPerfil()}', '{$l->getLink()}')";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;

    }

    public function updateLocal(Local $l){
        $sql = "UPDATE `local` SET `nome_local`= '{$l->getNomeLocal()}',`descricao`='{$l->getDescricao()}',`imagem_perfil`='{$l->getImagemPerfil()}', link = '{$l->getLink()}'
                WHERE id_local = {$l->getIdLocal()}";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;

    }

    public function deleteLocal(Local $local){
        $sql1 = "DELETE FROM `curtir_local` WHERE `local_id_local` = '{$local->getIdLocal()}'";
        $this->conexao->exec($sql1);

        $sql2 = "DELETE FROM `imagem_local` WHERE local_id_local = '{$local->getIdLocal()}'";
        $this->conexao->exec($sql2);

        $sql4 = "DELETE FROM `rota_local` WHERE `local_id_local` = '{$local->getIdLocal()}'";
        $this->conexao->exec($sql4);

        $sql = "DELETE FROM local WHERE id_local = {$local->getIdLocal()}";
        $this->conexao->exec($sql);

    }

    public function getLast(){
        $sql = "SELECT max(id_local) as id FROM local";

        $id = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        return $id['id'];

    }


}

//Teste FEITO