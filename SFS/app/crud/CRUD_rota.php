<?php
require_once '../model/Conexao.php';
require_once '../model/Rota.php';

class CRUD_rota
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getRota(Rota $rota){
        $sql = "SELECT * FROM rota WHERE id_rota = {$rota->getIdRota()}";

        try{
            $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        $rotaO = new Rota($resultado['id_rota'], $resultado['nome_rota'], $resultado['tempo_medio'], $resultado['imagem_perfil'], $resultado['descricao'], $resultado['link']);

        return $rotaO;

    }


    public function getRotas(){
        $sql = "SELECT * FROM rota";

        try{
            $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            return false;
        }

        $rotas = array();

        foreach ($resultado as $r){
            $rota = new Rota($r['id_rota'], $r['nome_rota'], $r['tempo_medio'], $r['imagem_perfil'], $r['descricao'], $r['link']);
            $rotas[] = $rota;
        }

        return $rotas;

    }

    public function createRota(Rota $r){
        $sql = "INSERT INTO `rota`(`nome_rota`, `tempo_medio`, `imagem_perfil`, `descricao`,`link`) VALUES ('{$r->getNomeRota()}','{$r->getTempoMedio()}','{$r->getImagemPerfil()}', '{$r->getDescricao()}', '{$r->getLink()}')";

        echo $sql;

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;

    }

    public function updateRota(Rota $r){
        $sql = "UPDATE `rota` SET `nome_rota`= '{$r->getNomeRota()}',`tempo_medio`='{$r->getTempoMedio()}',`imagem_perfil`= '{$r->getImagemPerfil()}',`descricao`='{$r->getDescricao()}',
        link='{$r->getLink()}' WHERE id_rota = {$r->getIdRota()}";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;

    }

    public function deleteRota(Rota $rota){
        $sql1 = "DELETE FROM `curtir_rota` WHERE `rota_id_rota` = '{$rota->getIdRota()}'";
        $this->conexao->exec($sql1);
        $sql4 = "DELETE FROM `rota_local` WHERE `rota_id_rota` = '{$rota->getIdRota()}'";
        $this->conexao->exec($sql4);
        $sql2 = "DELETE FROM `imagem_rota` WHERE rota_id_rota = '{$rota->getIdRota()}'";
        $this->conexao->exec($sql2);
        $sql = "DELETE FROM rota WHERE id_rota = {$rota->getIdRota()}";
        $this->conexao->exec($sql);



    }

    public function getLast(){
        $sql = "SELECT max(id_rota) as id FROM rota";

        $id = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        return $id['id'];

    }

}

//Teste FEITO
