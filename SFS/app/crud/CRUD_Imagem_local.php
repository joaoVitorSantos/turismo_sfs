<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/29/2018
 * Time: 11:57 AM
 */
require_once '../model/Conexao.php';
require_once '../model/Imagem_local.php';
require_once '../model/Imagem_l.php';
require_once '../model/Local.php';

class CRUD_Imagem_local
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function get_Images_for_local(Local $l){
        $sql = "SELECT imagem_l.id_imagem, imagem_l.nome_imagem, imagem_l.local FROM `imagem_local`, local, imagem_l WHERE imagem_local.imagem_l_id_imagem = imagem_l.id_imagem AND imagem_local.local_id_local = local.id_local AND imagem_local.local_id_local = '{$l->getIdLocal()}' AND imagem_l.maps != 1";

        try{
            $resultado = $this->conexao->query($sql)->fetchALL(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }
        $array_imgs = [];

        foreach ($resultado as $i) {
            $imagem_l = new Imagem_l($i['nome_imagem'], $i['local']);
            $imagem_l->setIdImagem($i['id_imagem']);
            $array_imgs[] = $imagem_l;
        }
        return $array_imgs;
    }

    public function get_Imagem_l_maps(Local $l){
        $sql = "SELECT * FROM `imagem_local`, local, imagem_l WHERE imagem_local.imagem_l_id_imagem = imagem_l.id_imagem AND imagem_local.local_id_local = local.id_local AND imagem_local.local_id_local = '{$l->getIdLocal()}' AND imagem_l.maps = 1";


        try{
            $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        $imagem_l = new Imagem_l($resultado['nome_imagem'], $resultado['local'], $resultado['maps']);
        $imagem_l->setIdImagem($resultado['id_imagem']);
        return $imagem_l;
    }


    public function create_imagem_local(Imagem_local $i)
    {
        $sql = "INSERT INTO `imagem_local`(`imagem_l_id_imagem`, `local_id_local`) VALUES ('{$i->getImagemLIdImagem()}','{$i->getLocalIdLocal()}')";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;


    }

    public function delete_Imagem_local(Imagem_local $i){

        $sql = "DELETE FROM `imagem_local` WHERE `imagem_l_id_imagem` = '{$i->getImagemLIdImagem()}' AND `local_id_local` = '{$i->getLocalIdLocal()}'";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;


    }

    public function delete_Imagens_local( $idLocal)
    {
        $a = new Local($idLocal);
        $res = $this->get_Images_for_local($a);

        foreach ($res as $r){
            $sql = "DELETE FROM imagem_local WHERE local_id_local = {$idLocal} AND imagem_l_id_imagem = {$r->getIdImagem()}";
            try{
                $this->conexao->exec($sql);
            }catch (Exception $e){
                echo $e->getMessage();
            }
        }

        return true;

    }

    public function deleteAllImagensRota($idRota){
        $sql = "DELETE FROM imagem_local WHERE local_id_local = {$idRota}";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;

    }

}

//Teste FEITO


