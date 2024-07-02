<?php
require_once 'models/Usuario.php';

/*essa classe trata os dados com o MySQL, 
caso necessário pode-se criar outra classe para tratar com outro SGBD*/
class UsuarioDaoMysql implements UsuarioDAO
{
    private $pdo;

    //importanto o driver do PDO
    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function add(Usuario $u)
    {
        $sql = $this->pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $sql->bindValue(':name', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId());
        return $u;
    }

    public function findAll()
    {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM users");
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach ($data as $item) {
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setNome($item['name']);
                $u->setEmail($item['email']);

                $array[] = $u;
            }
        }

        return $array;
    }

    public function findByEmail($email)
    {
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['name']);
            $u->setEmail($data['email']);

            return $u;
        } else {
            return false;
        }
    }

    public function findById($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['name']);
            $u->setEmail($data['email']);

            return $u;
        } else {
            return false;
        }
    }

    public function update(Usuario $u)
    {
        $sql = $this->pdo->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
        $sql->bindValue(':name', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':id', $u->getId());
        $sql->execute();

        return true;
    }

    public function delete($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}