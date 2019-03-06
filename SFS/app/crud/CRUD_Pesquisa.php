<?php
require_once '../model/Conexao.php';
class CRUD_Pesquisa
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function pesquisa($termo){
        $sql1 = "SELECT DISTINCT * FROM rota WHERE nome_rota like '%{$termo}%' OR descricao like '%{$termo}%'";
        $sql2 = "SELECT DISTINCT * FROM local WHERE nome_local like '%{$termo}%' OR descricao like '%{$termo}%'";

        $resRotas = $this->conexao->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
        $resLocais = $this->conexao->query($sql2)->fetchAll(PDO::FETCH_ASSOC);

        $cR = count($resRotas);
        for ($i = 0; $i < $cR; $i++){
            $resRotas[$i]['tipo'] = 'Rota';
            $resRotas[$i]['nome'] = $resRotas[$i]['nome_rota'];
            $resRotas[$i]['id'] = $resRotas[$i]['id_rota'];
        }

        $cL = count($resLocais);
        for ($j = 0; $j < $cL; $j++){
            $resLocais[$j]['tipo'] = 'Local';
            $resLocais[$j]['nome'] = $resLocais[$j]['nome_local'];
            $resLocais[$j]['id'] = $resLocais[$j]['id_local'];
        }

        if (is_array($resRotas) and is_array($resLocais)){
            $tudo[] = $resRotas;
            $tudo[] = $resLocais;

            return $tudo;
        }

        elseif (!is_array($resRotas) and !is_array($resLocais)){

            return false;
        }

        elseif (!is_array($resRotas)){
            return $resLocais;
        }

        else {
            return $resRotas;
        }

    }

}