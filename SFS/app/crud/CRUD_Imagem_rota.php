<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/29/2018
 * Time: 10:15 AM
 */
require_once '../model/Conexao.php';
require_once '../model/Imagem_rota.php';
require_once '../model/Rota.php';
class CRUD_Imagem_rota
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function get_Images_for_route(Rota $r){
        $sql = "SELECT imagem_r.id_imagem, imagem_r.nome_imagem, imagem_r.local, imagem_r.maps FROM `imagem_rota`, rota, imagem_r WHERE imagem_rota.imagem_r_id_imagem = imagem_r.id_imagem AND imagem_rota.rota_id_rota = rota.id_rota AND imagem_rota.rota_id_rota = '{$r->getIdRota()}'";

        try{
            $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }
        $array_imgs = [];
        foreach ($resultado as $i) {
            $imagem_r = new Imagem_r($i['nome_imagem'], $i['local'], $i['maps']);
            $imagem_r->setIdImagem($i['id_imagem']);
            $array_imgs[] = $imagem_r;
        }
        return $array_imgs;
    }

    public function get_Imagem_r_maps(Rota $r){
        $sql = "SELECT imagem_r.id_imagem, imagem_r.nome_imagem, imagem_r.local, imagem_r.maps FROM `imagem_rota`, rota, imagem_r WHERE imagem_rota.imagem_r_id_imagem = imagem_r.id_imagem AND imagem_rota.rota_id_rota = rota.id_rota AND imagem_rota.rota_id_rota = '{$r->getIdRota()}' AND imagem_r.maps = 1";

        try{
            $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        $imagem_r = new Imagem_r($resultado['nome_imagem'], $resultado['local'], $resultado['maps']);
        $imagem_r->setIdImagem($resultado['id_imagem']);
        return $imagem_r;
    }

    public function create_imagem_rota(Imagem_rota $i)
    {
        $sql = "INSERT INTO `imagem_rota`(`imagem_r_id_imagem`, `rota_id_rota`) VALUES ('{$i->getImagemRIdImagem()}','{$i->getRotaIdRota()}')";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;


    }

    public function delete_Imagem_rota(Imagem_rota $i){

        $sql = "DELETE FROM `imagem_rota` WHERE `imagem_r_id_imagem` = '{$i->getImagemRIdImagem()}' AND `rota_id_rota` = '{$i->getRotaIdRota()}'";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;


    }

}

//Teste FEITO
