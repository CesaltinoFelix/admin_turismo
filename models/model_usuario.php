<?php
class Model_Usuario
{
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $is_admin;
    public $status;
    public $contacto;

    public function __construct($id, $nome, $email, $senha, $is_admin, $status, $contacto)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->is_admin = $is_admin;
        $this->status = $status;
        $this->contacto = $contacto;
    }
}