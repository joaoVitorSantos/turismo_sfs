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
        $rotaO = new Rota($resultado['id_rota'], $resultado['nome_rota'], $resultado['tempo_medio'], $resultado['imagem_perfil'], $resultado['descricao']);
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
            $rota = new Rota($r['id_rota'], $r['nome_rota'], $r['tempo_medio'], $r['imagem_perfil'], $r['descricao']);
            $rotas[] = $rota;
        }
        return $rotas;
    }
    public function createRota(Rota $r){
        $sql = "INSERT INTO `rota`(`nome_rota`, `tempo_medio`, `imagem_perfil`, `descricao`) VALUES ('{$r->getNomeRota()}','{$r->getTempoMedio()}','{$r->getImagemPerfil()}', '{$r->getDescricao()}')";
        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }
        return true;
    }
    public function updateRota(Rota $r){
        $sql = "UPDATE `rota` SET `nome_rota`= '{$r->getNomeRota()}',`tempo_medio`='{$r->getTempoMedio()}',`imagem_perfil`= '{$r->getImagemPerfil()}',`descricao`='{$r->getDescricao()}'
        WHERE id_rota = {$r->getIdRota()}";
        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }
        return true;
    }
    public function deleteRota(Rota $rota){
        $sql = "DELETE FROM rota WHERE id_rota = {$rota->getIdRota()}";
        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }
        return true;
    }
}
//Teste FEITO

