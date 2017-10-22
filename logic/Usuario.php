<?php
    include "Connection.php";
    class Usuario
    {   
        protected $id;
        protected $nome;
        protected $username;
        protected $nomeempresa;
        private $password;

        public function cadastroUsuario($n, $u, $nE, $p)
        {
            $conn = new Connection();
            $conn = $conn->getInstance();

            $queryCadastro = "INSERT INTO usuarios (nome, nomeempresa, username, password) VALUES (:nome, :nomeempresa, :username,'".password_hash($p, PASSWORD_DEFAULT)."')";
            $query = $conn->prepare($queryCadastro);
            $query->bindParam(":nome", $n);
            $query->bindParam(":nomeempresa", $nE);
            $query->bindParam(":username", $u);
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function verificaUsuario($u, $p)
        {
            $conn = new Connection();
            $conn = $conn->getInstance();

            $queryValida = 'SELECT id,nome,nomeempresa,username,password FROM usuarios WHERE username = :username';
            $query = $conn->prepare($queryValida);
            $query->bindParam(':username', $u);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);
            if (count($result) > 0 && password_verify($p, $result['password'])) {
                $this->setId($result['id']);
                $this->setNome($result['nome']);
                $this->setUsername($result['username']);
                $this->setNomeEmpresa($result['nomeempresa']);
                return true;
            }
            return false;
        }

        //Getters
        public function getId()
        {
            return $this->id;
        }
        public function getNome()
        {
            return $this->nome;
        }
        public function getNomeEmpresa()
        {
            return $this->nomeEmpresa;
        }
        public function getUsername()
        {
            return $this->username;
        }

        //Setters
        public function setId($i)
        {
            $this->id = $i;
        }
        public function setNome($n)
        {
            $this->nome = $n;
        }
        public function setNomeEmpresa($n)
        {
            $this->nomeEmpresa = $n;
        }
        public function setUsername($u)
        {
            $this->username = $u;
        }
    }