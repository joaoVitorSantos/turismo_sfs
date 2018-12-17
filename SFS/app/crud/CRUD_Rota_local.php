<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/15/2018
 * Time: 10:42 AM
 */
require_once '../model/Conexao.php';
require_once '../model/Rota_local.php';
require_once '../model/Rota.php';
require_once '../model/Local.php';

class CRUD_Rota_local
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function create_Rota_local(Rota_local $r){
        $sql = "INSERT INTO `rota_local`(`rota_id_rota`, `local_id_local`) VALUES ('{$r->getIdRota()}', '{$r->getIdLocal()}')";
        $this->conexao->exec($sql);
    }

    public function delete_Rota_local(Rota_local $r){
        $sql = "DELETE FROM rota_local WHERE rota_id_rota = '{$r->getIdRota()}' AND local_id_local = '{$r->getIdLocal()}'";
        $this->conexao->exec($sql);
    }

    public function get_locais_por_rota(Rota_local $r){
       $sql = "SELECT local.id_local, local.nome_local, local.descricao, local.imagem_perfil FROM `local`, rota, rota_local WHERE local.id_local = rota_local.local_id_local AND rota.id_rota = rota_local.rota_id_rota AND rota.id_rota = '{$r->getIdRota()}'";
       $res = $this->conexao->query($sql);

        $locais = array();

        foreach ($res as $r){
            $local = new Local($r['id_local'], $r['nome_local'], $r['descricao'], $r['imagem_perfil']);
            $locais[] = $local;
        }

        return $locais;
    }

    public function get_rotas_por_local(Rota_local $r){
        $sql = "SELECT rota.id_rota, rota.nome_rota, rota.tempo_medio, rota.imagem_perfil, rota.descricao, rota.link FROM `local`, rota, rota_local WHERE local.id_local = rota_local.local_id_local AND rota.id_rota = rota_local.rota_id_rota AND local.id_local = '{}'";
    }
}

//Teste

$a = new Rota_local(3, 1);
$b = new CRUD_Rota_local();
$b->create_Rota_local($a);
$c = $b->get_locais_por_rota($a);
print_r($c);