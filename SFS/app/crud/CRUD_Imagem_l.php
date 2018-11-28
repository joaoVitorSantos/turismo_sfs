<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/28/2018
 * Time: 2:14 PM
 */

require_once '../model/Conexao.php';
require_once '../model/Imagem_l.php';

class CRUD_Imagem_l
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function create_imagem_l(Imagem_l $i)
    {
        $sql = "INSERT INTO `imagem_l`(`nome_imagem`, `local`) VALUES ('{$i->getNomeImagem()}', '{$i->getLocal()}')";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;


    }

    public function get_Imagem_l(Imagem_l $i){
        $sql = "SELECT * FROM imagem_l WHERE id_imagem = {$i->getIdImagem()}";

        try{
            $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        $imagem_l = new Imagem_l($resultado['nome_imagem'], $resultado['local']);
        $imagem_l->setIdImagem($resultado['id_imagem']);
        return $imagem_l;
    }

    public function get_Imagens_l(){
        $sql = "SELECT * FROM imagem_l";

        try{
            $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
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

    public function update_Imagem_l(Imagem_l $i){

        $sql = "UPDATE `imagem_l` SET `nome_imagem`= '{$i->getNomeImagem()}',`local`= '{$i->getLocal()}' WHERE `id_imagem`= '{$i->getIdImagem()}'";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;

    }

    public function delete_Imagem_l(Imagem_l $i){

        $sql = "DELETE FROM `imagem_l` WHERE id_imagem = '{$i->getIdImagem()}'";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;


    }

}

//Teste FEITO

