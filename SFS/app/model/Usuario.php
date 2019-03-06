<?php

/* Estrangeira TipoUser BD */

class Usuario
{

    private $id_usuario;
    private $email;
    private $senha;
    private $user;
    private $tipo_usuario_id_tipo_usuario;

    public function __construct($id_usuario = null, $email = null, $senha = null, $user =null, $tipo_usuario_id_tipo_usuario =null)
    {
        $this->id_usuario = $id_usuario;
        $this->email = $email;
        $this->senha = $senha;
        $this->user = $user;
        $this->tipo_usuario_id_tipo_usuario = $tipo_usuario_id_tipo_usuario;
    }


    public function getIdUsuario()
    {
        return $this->id_usuario;
    }


    public function getTipoUsuarioIdTipoUsuario()
    {
        return $this->tipo_usuario_id_tipo_usuario;
    }


    public function setTipoUsuarioIdTipoUsuario($tipo_usuario_id_tipo_usuario)
    {
        $this->tipo_usuario_id_tipo_usuario = $tipo_usuario_id_tipo_usuario;
    }


    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getSenha()
    {
        return $this->senha;
    }


    public function setSenha($senha)
    {
        $this->senha = $senha;
    }


    public function getUser()
    {
        return $this->user;
    }


    public function setUser($user)
    {
        $this->user = $user;
    }

}