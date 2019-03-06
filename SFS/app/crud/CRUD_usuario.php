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

        $sql1 = "DELETE FROM `curtir_local` WHERE usuario_id_usuario = '{$usuario->getIdUsuario()}'";
        $this->conexao->exec($sql1);
        $sql2 = "DELETE FROM `curtir_rota` WHERE usuario_id_usuario = '{$usuario->getIdUsuario()}'";
        $this->conexao->exec($sql2);
        $sql = "DELETE FROM usuario WHERE id_usuario = {$usuario->getIdUsuario()}";
        $this->conexao->exec($sql);

    }

    public function createUsuario(Usuario $usuario){

        $sql = "INSERT INTO `usuario`(`email`, `senha`, `user`, `tipo_usuario_id_tipo_usuario`) VALUES ('{$usuario->getEmail()}','{$this->criptografarPass($usuario->getSenha())}','{$usuario->getUser()}','{$usuario->getTipoUsuarioIdTipoUsuario()}')";

        try{
            $this->conexao->exec($sql);
        }catch (Exception $e){
            return false;
        }

        return true;

    }

    public function verificaUsuario($email, $senha){
//        $sql = "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senha}'";
//
//        try {
//            $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
//        }catch (Exception $e){
//            return $e->getMessage();
//        }
//
//        if (is_array($resultado) and count($resultado) > 0){
//            $res = new Usuario($resultado['id_usuario'], $resultado['email'], $resultado['senha'], $resultado['user'], $resultado['tipo_usuario_id_tipo_usuario']);
//            return $res;
//        }
//
//        else {
//            return false;

        $users = $this->getUsuarios();

        foreach ($users as $u){
            if (password_verify($senha, $u->getSenha()) and $email == $u->getEmail()){
                $resultado = $this->getUsuario($u);
                return $resultado;
            }
        }
        return "nao";

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

    public function verificaEmail($email){
        $sql = "SELECT * FROM usuario WHERE email = '{$email}'";



        try{
            $res = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return false;
        }

        if (is_array($res)){
            return false;
        }

        return true;

    }

    public function criptografarPass($senha){
        $novaSenha = password_hash($senha, PASSWORD_DEFAULT);
        return $novaSenha;
    }

}

//Teste FEITO

