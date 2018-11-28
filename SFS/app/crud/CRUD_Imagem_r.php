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

    public function get_Imagem_r(Imagem_r $i){
        $sql = "SELECT * FROM imagem_r WHERE id_imagem = {$i->getIdImagem()}";

        try{
            $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }
        //Continuar

        $imagem_l = new Imagem_r($resultado['nome_imagem'], $resultado['local']);
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

//Teste

$a = new CRUD_Imagem_r();
$b = new Imagem_r("ALA", "kdwmdsm", 1);
$c = $a->get_Imagem_r($b);
print_r($c);