<?php
include_once '/xampp/htdocs/AcessoBD/Bd_Autoria/PHPs/ConectarLi.php';
    Class usuario{
        private $usu;
        private $conn;
        private $senha;


        public function getUsuario(){
            return $this->usu;
        }
        public function setUsuario($usus){
            $this->usu = $usus;
        }
        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($sen){
            $this->senha = $sen;
        }

        function login(){
            try {
                $this-> conn = new Conectar();
                $sql = $this->conn->prepare("select * from usuario where Login like ? and Senha = ?");
                @$sql->bindParam(1, $this->getUsuario(), PDO::PARAM_STR);
                @$sql->bindParam(2, $this->getSenha(),PDO::PARAM_STR);
                $sql->execute();
                return $sql->fetchAll();
                $this->conn = null;
            } catch (PDOException $exc) {
                echo "<span class='text-green-200'>Erro ao consultar usuario</span>" . $exc->getMessage();
            }
        }
    }
?>