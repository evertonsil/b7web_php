<?php
class Usuario
{
    private $id;
    private $nome;
    private $email;

    public function getId()
    {
        return $this->id;
    }
    public function setId($i)
    {
        //remove espaços em branco
        $this->id = trim($i);
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($n)
    {
        //define o nome em capitalize (letras maiusculas)
        $this->nome = ucwords(trim($n));
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($e)
    {
        $this->email = strtolower(trim($e));
    }
}

//interface para definir o modelo da classe UsuarioDAO
interface UsuarioDAO
{
    public function add(Usuario $u);
    public function findAll();
    public function findByEmail($email);
    public function findById($id);
    public function update(Usuario $u);
    public function delete($id);
}