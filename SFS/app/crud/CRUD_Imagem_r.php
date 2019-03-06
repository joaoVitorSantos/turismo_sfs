<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/28/2018
 * Time: 6:30 PM
 */

require_once '../model/Conexao.php';
require_once '../model/Imagem_r.php';


class CRUD_Imagem_r
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function create_imagem_r(Imagem_r $i)
    {
        $sql = "INSERT INTO `imagem_r`(`nome_imagem`, `local`, maps) VALUES ('{$i->getNomeImagem()}', '{$i->getLocal()}', '{$i->getMaps()}')";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;


    }

    public function getLast(){
        $sql = "SELECT max(id_imagem) as id FROM imagem_r";

        $id = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $id['id'];

    }

    public function get_Imagem_r(Imagem_r $i){
        $sql = "SELECT * FROM imagem_r WHERE id_imagem = '{$i->getIdImagem()}'";

        try{
            $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        $imagem_r = new Imagem_r($resultado['nome_imagem'], $resultado['local'], $resultado['maps']);
        $imagem_r->setIdImagem($resultado['id_imagem']);
        return $imagem_r;
    }

    public function get_Imagens_r(){
        $sql = "SELECT * FROM imagem_r";

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



    public function update_Imagem_r(Imagem_r $i){

        $sql = "UPDATE `imagem_r` SET `nome_imagem`= '{$i->getNomeImagem()}',`local`= '{$i->getLocal()}', maps = '{$i->getMaps()}' WHERE `id_imagem`= '{$i->getIdImagem()}'";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;

    }

    public function delete_Imagem_r(Imagem_r $i){

        $sql = "DELETE FROM `imagem_r` WHERE id_imagem = '{$i->getIdImagem()}'";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;


    }


}

//Teste FEITO