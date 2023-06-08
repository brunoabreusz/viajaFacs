<?php
class Usuario
{
    private $cpf;
    private $nome;
    private $dataNascimento;
    private $email;
    private $telefone;
    private $senha;
    private $idUsuario;

    public function incluir()
    {

        try {
            require_once('conectionData.php');
            $conn = Data::conectar();
            $sql = $conn->prepare("INSERT INTO usuario (cpf, nome, dataNascimento, email, telefone, senha, idUsuario)
            VALUES (:cpf, :nome, :dataNascimento, :email, :telefone, :senha, :idUsuario)");
            $sql->bindParam("cpf", $cpf);
            $sql->bindParam("nome", $nome);
            $sql->bindParam("dataNascimento", $dataNascimento);
            $sql->bindParam("email", $email);
            $sql->bindParam("telefone", $telefone);
            $sql->bindParam("senha", $senha);
            $sql->bindParam("idUsuario", $idUsuario);
            $cpf = $this->cpf;
            $nome = $this->nome;
            $dataNascimento = $this->dataNascimento;
            $email  = $this->email;
            $telefone = $this->telefone;
            $senha = $this->senha;
            $idUsuario = $this->idUsuario;
            $sql->execute();
            return 'user.php';
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function verificarCredenciais($email, $senha)
    {
        require_once('conectionData.php');
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

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
}
