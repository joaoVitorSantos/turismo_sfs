<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/28/2018
 * Time: 8:59 AM
 */
require_once '../model/Conexao.php';
require_once '../model/Curtir_rota.php';

class CRUD_Curtir_rota
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function get_Curtir_r(Curtir_rota $c)
    {
        $sql = "SELECT * FROM `curtir_rota` WHERE `rota_id_rota` = '{$c->getRotaIdRota()}' and `usuario_id_usuario` = '{$c->getUsuarioIdUsuario()}'";

        try {
            $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return false;
        }
        $curtir_rota = new Curtir_rota($resultado['rota_id_rota'], $resultado['usuario_id_usuario'], $resultado['avaliacao']);
        $curtir_rota->setDtCurtir($resultado['dt_curtir']);
        return $curtir_rota;
    }

    public function get_Curtir_r_verificacao(Curtir_rota $c)
    {
        $sql = "SELECT * FROM `curtir_rota` WHERE `rota_id_rota` = '{$c->getRotaIdRota()}' and `usuario_id_usuario` = '{$c->getUsuarioIdUsuario()}'";

        try {
            $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return false;
        }
        $curtir_rota = new Curtir_rota($resultado['rota_id_rota'], $resultado['usuario_id_usuario'], $resultado['avaliacao']);
        return $curtir_rota;
    }

    public function get_media_Curtidas_rota_round(Curtir_rota $c)
    {
        $sql = "SELECT AVG(avaliacao) as media FROM `curtir_rota` WHERE rota_id_rota = '{$c->getRotaIdRota()}'";

        try {
            $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return false;
        }
        $resultadoF = round($resultado['media']);
        return $resultadoF;
    }

    public function get_media_Curtidas_rota(Curtir_rota $c)
    {
        $sql = "SELECT AVG(avaliacao) as media FROM `curtir_rota` WHERE rota_id_rota = '{$c->getRotaIdRota()}'";

        try {
            $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return false;
        }
        $resultadoF = round($resultado['media'], 4);
        return $resultadoF;
    }

    public function create_Curtir_rota(Curtir_rota $c)
    {
        $sql = "INSERT INTO `curtir_rota` (`rota_id_rota`, `usuario_id_usuario`, `dt_curtir`, `avaliacao`) VALUES ('{$c->getRotaIdRota()}', '{$c->getUsuarioIdUsuario()}', CURRENT_TIMESTAMP, '{$c->getAvaliacao()}')";
        try {
            $this->conexao->exec($sql);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public function update_Curtir_rota(Curtir_rota $c)
    {
        $sql = "UPDATE `curtir_rota` SET `dt_curtir`= CURRENT_TIMESTAMP,`avaliacao`= '{$c->getAvaliacao()}' WHERE `rota_id_rota` = '{$c->getRotaIdRota()}' AND `usuario_id_usuario` = '{$c->getUsuarioIdUsuario()}'";

        try {
            $this->conexao->exec($sql);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public function delete_Curtir_rota(Curtir_rota $c)
    {

        $sql = "DELETE FROM `curtir_rota` WHERE `rota_id_rota` = '{$c->getRotaIdRota()}' AND `usuario_id_usuario` = '{$c->getUsuarioIdUsuario()}'";

        try {
            $this->conexao->exec($sql);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

}

//Teste FEITO

