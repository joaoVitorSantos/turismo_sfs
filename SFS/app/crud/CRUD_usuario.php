<?php
require_once '../model/Conexao.php';
require_once '../model/Usuario.php';
class CRUD_usuario
{
    private $conexao;
    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }
    public function getUsuario(Usuario $usuario){
        $sql = "SELECT * FROM usuario WHERE id_usuario = {$usuario->getIdUsuario()}";
        try{
            $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }
        $usuario = new Usuario($resultado['id_usuario'], $resultado['email'], $resultado['senha'], $resultado['user'], $resultado['tipo_usuario_id_tipo_usuario']);
        return $usuario;
    }
    public function getUsuarios(){
        $sql = "SELECT * FROM usuario";
        try{
            $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }
        $usuarios = array();
        foreach ($resultado as $user){
            $usuario = new Usuario($user['id_usuario'], $user['email'], $user['senha'], $user['user'], $user['tipo_usuario_id_tipo_usuario']);
            $usuarios[] = $usuario;
        }
        return $usuarios;
    }
    public function deleteUsuario(Usuario $usuario){
        $sql = "DELETE FROM usuario WHERE id_usuario = {$usuario->getIdUsuario()}";
        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }
        return true;
    }
    public function createUsuario(Usuario $usuario){
        $sql = "INSERT INTO `usuario`(`email`, `senha`, `user`, `tipo_usuario_id_tipo_usuario`) VALUES ('{$usuario->getEmail()}','{$usuario->getSenha()}','{$usuario->getUser()}','{$usuario->getTipoUsuarioIdTipoUsuario()}')";
        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }
        return true;
    }
    public function updateUsuario(Usuario $usuario){
        $sql = "UPDATE `usuario` SET `email`= '{$usuario->getEmail()}',`senha`= '{$usuario->getSenha()}',`user`= '{$usuario->getUser()}',`tipo_usuario_id_tipo_usuario`= '{$usuario->getTipoUsuarioIdTipoUsuario()}' WHERE `id_usuario`= '{$usuario->getIdUsuario()}'";
        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }
        return true;
    }
}
//Teste
$a = new Usuario('a@a', 'lllll', 'joaoV3', 1);
$a->setIdUsuario(2);
$b = new CRUD_usuario();
//TODO ARRUMAR ESTRANGEIRA
//TODO CONTINUAR
$b->deleteteUsuario($a);