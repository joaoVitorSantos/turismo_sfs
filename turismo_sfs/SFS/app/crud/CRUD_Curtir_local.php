<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/21/2018
 * Time: 3:08 PM
 */
require_once '../model/Conexao.php';
require_once '../model/Curtir_local.php';

class CRUD_Curtir_local
{
    private $conexao;
    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function get_Curtir_local(Curtir_local $c)
    {
        $sql = "SELECT * FROM `curtir_local` WHERE `local_id_local` = '{$c->getLocalIdLocal()}' and `usuario_id_usuario` = '{$c->getUsuarioIdUsuario()}'";

        try{
            $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }
        $curtir_local = new Curtir_local($resultado['local_id_local'], $resultado['usuario_id_usuario'], $resultado['dt_curtir'], $resultado['avaliacao']);
        return $curtir_local;
    }

    public function get_media_Curtidas_local(Curtir_local $c)
    {
        $sql = "SELECT AVG(avaliacao) as media FROM `curtir_local` WHERE local_id_local = '{$c->getLocalIdLocal()}'";

        try{
            $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }
        $resultadoF = round($resultado['media']);
        return $resultadoF;
    }

    public function create_Curtir_local(Curtir_local $c){
        $sql = "INSERT INTO `curtir_local`(`local_id_local`, `usuario_id_usuario`, `dt_curtir`, `avaliacao`) VALUES ('{$c->getLocalIdLocal()}', '{$c->getUsuarioIdUsuario()}', '{$c->getDtCurtir()}', '{$c->getAvaliacao()}')";
        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }
        return true;
    }

    public function update_Curtir_local(Curtir_local $c){
        $sql = "UPDATE `curtir_local` SET `dt_curtir`= CURRENT_TIMESTAMP,`avaliacao`= '{$c->getAvaliacao()}' WHERE `local_id_local` = '{$c->getLocalIdLocal()}' AND `usuario_id_usuario` = '{$c->getUsuarioIdUsuario()}'";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }
        return true;
    }

}

//Teste

