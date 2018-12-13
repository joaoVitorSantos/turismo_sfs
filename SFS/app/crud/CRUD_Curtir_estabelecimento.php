<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/13/2018
 * Time: 1:45 PM
 */
require_once '../model/Conexao.php';
require_once '../model/Curtir_estabelecimento.php';

class CRUD_Curtir_estabelecimento
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function get_Curtir_estabelecimento(Curtir_estabelecimento $c)
    {
        $sql = "SELECT * FROM `curtir_estabelecimento` WHERE `estabelecimento_id_estabelecimento` = '{$c->getIdEstabelecimento()}' and `usuario_id_usuario` = '{$c->getIdUsuario()}'";

        try{
            $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }
        $curtir_estabelecimento = new Curtir_estabelecimento($resultado['estabelecimento_id_estabelecimento'], $resultado['usuario_id_usuario'], $resultado['avaliacao']);
        $curtir_estabelecimento->setDtCurtir($resultado['dt_curtir']);
        return $curtir_estabelecimento;
    }

    public function get_media_Curtidas_estabelecimento(Curtir_estabelecimento $c)
    {
        $sql = "SELECT AVG(avaliacao) as media FROM `curtir_estabelecimento` WHERE estabelecimento_id_estabelecimento = '{$c->getIdEstabelecimento()}'";

        try{
            $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }
        $resultadoF = round($resultado['media']);
        return $resultadoF;
    }

    public function create_Curtir_estabelecimento(Curtir_estabelecimento $c){
        $sql = "INSERT INTO `curtir_estabelecimento`(`estabelecimento_id_estabelecimento`, `usuario_id_usuario`, `dt_curtir`, `avaliacao`) VALUES ('{$c->getIdEstabelecimento()}', '{$c->getIdUsuario()}', '{$c->getDtCurtir()}', '{$c->getAvaliacao()}')";
        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }
        return true;
    }

    public function update_Curtir_estabelecimento(Curtir_estabelecimento $c){
        $sql = "UPDATE `curtir_estabelecimento` SET `dt_curtir`= CURRENT_TIMESTAMP,`avaliacao`= '{$c->getAvaliacao()}' WHERE `estabelecimento_id_estabelecimento` = '{$c->getIdEstabelecimento()}' AND `usuario_id_usuario` = '{$c->getIdUsuario()}'";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }
        return true;
    }

    public function delete_Curtir_estabelecimento(Curtir_estabelecimento $c){

        $sql = "DELETE FROM `curtir_estabelecimento` WHERE `estabelecimento_id_estabelecimento` = '{$c->getIdEstabelecimento()}' AND `usuario_id_usuario` = '{$c->getIdUsuario()}'";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;


    }
}

//Teste FEITO
