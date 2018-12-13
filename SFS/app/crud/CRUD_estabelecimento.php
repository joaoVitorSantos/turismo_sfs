<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/13/2018
 * Time: 2:34 PM
 */
require_once '../model/Conexao.php';
require_once '../model/Estabelecimento.php';

class CRUD_estabelecimento
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getEstabelecimento(Estabelecimento $e){
        $sql = "SELECT * FROM estabelecimento WHERE id_estabelecimento = {$e->getIdEstabelecimento()}";

        try{
            $res = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        $estabelecimento = new Estabelecimento($res['id_estabelecimento'], $res['nome_estabelecimento'], $res['link_site'], $res['link_maps'], $res['imagem_perfil'], $res['tipo_estabelecimento_id_tipo_estabelecimento']);

        return $estabelecimento;
    }

    public function getEstabelecimentos(){
        $sql = "SELECT * FROM estabelecimento";

        try{
            $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        $estabelecimentos = array();

        foreach ($resultado as $r){
            $estabelecimento = new Estabelecimento($r['id_estabelecimento'], $r['nome_estabelecimento'], $r['link_site'], $r['link_maps'], $r['imagem_perfil'], $r['tipo_estabelecimento']);
            $locais[] = $loca;
        }

        return $locais;

    }
}

//Teste

$a = new Estabelecimento(1, "a", "a", "a", "a", 1);
$b = new CRUD_estabelecimento();
$c = $b->getEstabelecimento($a);
print_r($c);