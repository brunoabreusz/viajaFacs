<?php
class Usuario
{
    private $cpf;
    private $nome;
    private $dataNascimento;
    private $email;
    private $telefone;
    private $senha;
    private $minhasPassagens;
    private $id;

    public function incluir()
    {

        try {
            require_once('conectionData.php');
            // $data = new Data();
            $conn = Data::conectar();
            $sql = $conn->prepare("INSERT INTO usuario (cpf, nome, dataNascimento, email, telefone, senha, minhasPassagens, id)
            VALUES (:cpf, :nome, :dataNascimento, :email, :telefone, :senha, :minhasPassagens, :id)");
            $sql->bindParam("cpf", $cpf);
            $sql->bindParam("nome", $nome);
            $sql->bindParam("dataNascimento", $dataNascimento);
            $sql->bindParam("email", $email);
            $sql->bindParam("telefone", $telefone);
            $sql->bindParam("senha", $senha);
            $sql->bindParam("minhasPassagens", $minhasPassagens);
            $sql->bindParam("id", $id);
            $cpf = $this->cpf;
            $nome = $this->nome;
            $dataNascimento = $this->dataNascimento;
            $email  = $this->email;
            $telefone = $this->telefone;
            $senha = $this->senha;
            $minhasPassagens = $this->minhasPassagens;
            $id = $this->id;
            $sql->execute();
            return 'user.php';
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function verificarCredenciais($email, $senha)
    {
        require_once('conectionData.php');
        // $data = new Data();
        $conn = Data::conectar();

        $sql = $conn->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");
        $sql->bindParam(":email", $email);
        $sql->bindParam(":senha", $senha);
        $sql->execute();

        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            // As credenciais são válidas
            return true;
        } else {
            // As credenciais são inválidas
            return false;
        }
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getMinhasPassagens()
    {
        return $this->minhasPassagens;
    }

    public function setMinhasPassagens($minhasPassagens)
    {
        $this->minhasPassagens = $minhasPassagens;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}
