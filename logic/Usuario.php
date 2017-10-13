<?php
    include "Connection.php";
    class Usuario
    {
        protected $nome;
        protected $username;
        protected $nomeempresa;
        private $password;

        public function cadastroUsuario($n, $u, $nE, $p){
            $conn = new Connection();
            $conn = $conn->getInstance();
            $queryCadastro = "INSERT INTO usuarios (nome, nomeempresa, username, password) VALUES ('".$n."','".$nE."','".$u."','".password_hash($p, PASSWORD_DEFAULT)."')";
            $query = $conn->prepare($queryCadastro);
            
            if($query->execute()){
                return true;
            } else {
                return false;
            }
        }
    }