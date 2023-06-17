<?php

require_once 'conectionData.php';

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

    public function verificarCredenciais($email, $senha)
    {
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

    public function obterDadosDoUsuario()
    {
        // Recupera o email do usuário da sessão
        $email = $_SESSION['email'];

        try {
            $query = "SELECT * FROM usuario WHERE email = :email";
            $conn = Data::conectar();
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            // Obtém os dados do usuário
            $usuarioData = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se os dados do usuário foram encontrados
            if ($usuarioData) {
                // Atualiza os atributos do objeto Usuário com os dados obtidos
                $this->cpf = $usuarioData['cpf'];
                $this->nome = $usuarioData['nome'];
                $this->dataNascimento = $usuarioData['dataNascimento'];
                $this->email = $usuarioData['email'];
                $this->telefone = $usuarioData['telefone'];
                $this->senha = $usuarioData['senha'];

                return $this;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Erro ao obter os dados do usuário: " . $e->getMessage();
            return null;
        }
    }


    public function updateDadosUsuario($usuario)
    {
        try {
            $conn = Data::conectar();

            $query = "UPDATE usuario SET cpf = :cpf, nome = :nome, dataNascimento = :dataNascimento, telefone = :telefone, senha = :senha WHERE email = :email";
            $stmt = $conn->prepare($query);

            // Vincula os parâmetros da consulta com os valores do objeto Usuario
            $stmt->bindValue(':cpf', $usuario->getCpf());
            $stmt->bindValue(':nome', $usuario->getNome());
            $stmt->bindValue(':dataNascimento', $usuario->getDataNascimento());
            $stmt->bindValue(':telefone', $usuario->getTelefone());
            $stmt->bindValue(':senha', $usuario->getSenha());
            $stmt->bindValue(':email', $_SESSION['email']);

            $stmt->execute();

            // Verifica se a atualização foi bem-sucedida
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false; 
            }
        } catch (PDOException $e) {
            echo "Erro ao atualizar os dados do usuário: " . $e->getMessage();
            return false;
        }
    }

    public function verificarEmailCadastrado($email) {
        try {
            $query = "SELECT * FROM usuario WHERE email = :email";
            $conn = Data::conectar(); // Conecta ao banco de dados
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
 
            if ($stmt->rowCount() > 0) {
                return true; // Email já cadastrado
            } else {
                return false; // Email não cadastrado
            }
        } catch (PDOException $e) {
            echo "Erro ao verificar o email cadastrado: " . $e->getMessage();
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
