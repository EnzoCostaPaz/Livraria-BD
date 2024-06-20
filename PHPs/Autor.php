<?php
include_once './ConectarLi.php';

class autor{
    private $Cod_Autor;
    private $NomeAutor;
    private $Sobrenome;
    private $Email;
    private $Nasc;
    private $conn;
    public function getCod_Autor(){
        return $this-> Cod_Autor;
    }
    public function setCod_Autor($iid){
        $this->Cod_Autor = $iid;
    }
    public function getAutor(){
        return $this->NomeAutor;
    }
    public function setAutor($np){
        $this->NomeAutor = $np;
    }
    public function getSobrenome(){
        return $this->Sobrenome;
    }
    public function setSobrenome($ns){
        $this->Sobrenome = $ns;
    }
    public function getEmail() {
        return $this-> Email;
    }
    public function setEmail($Ema){
        $this->Email = $Ema;
    }
    public function getNasc(){
        return $this-> Nasc;
    }
    public function setNasc($nasc){
        $this-> Nasc = $nasc;
    }

    function salvar(){
        try{
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into autor values (null,?,?)");
            @$sql->bindParam(1,$this->getCod_Autor(),PDO::PARAM_STR);
            @$sql->bindParam(2,$this->getAutor(),PDO::PARAM_STR);
            @$sql->bindParam(3,$this->getSobrenome(),PDO::PARAM_STR);
            @$sql->bindParam(4,$this->getEmail(),PDO::PARAM_STR);
            @$sql->bindParam(5,$this->getNasc(),PDO::PARAM_STR);
            if ($sql->execute()==1) {
                return"Registro salvo com sucesso!";
            }
            $this->conn = null;
        }
        catch(PDOException $exc){
            echo "erro ao salvar o registro.". $exc->getMessage();
        }
    }
    function alterar(){
        try{
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("Select * from autor where Cod_Autor = ?");
            @$sql->bindParam(1,$this->getCod_Autor(),PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
        }
        catch(PDOException $exc){
            echo "Erro ao alterar". $exc->getMessage();
        }
    }
    function alterar2(){
        try
        {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("update autor set NomeAutor = ? where Cod_Autor = ?");
            @$sql->bindParam(1,$this->getCod_Autor(),PDO::PARAM_STR);
            @$sql->bindParam(2,$this->getAutor(),PDO::PARAM_STR);
            @$sql->bindParam(3,$this->getSobrenome(),PDO::PARAM_STR);
            @$sql->bindParam(4,$this->getEmail(),PDO::PARAM_STR);
            @$sql->bindParam(5,$this->getNasc(),PDO::PARAM_STR);
            if ($sql->execute()==1) {
                return "Registro Salvo com sucesso";
            }
            $this->conn = null;
        }
        catch(PDOException $exc)
        {
            echo "Erro ao salvar o registro". $exc->getMessage();
        }
    }
    function consultar(){
        try{
            $this->conn = new Conectar();
            $sql =  $this->conn->prepare("select * from autor where NomeAutor like ?");
            @$sql->bindParam(1,$this->getAutor(),PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        }
        catch(PDOException $exc){
            echo "Erro ao execultar a consulta". $exc->getMessage();
        }
    }
    function exclusao(){
        try{
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("delete from autor where Cod_Autor = ?");
            $sql ->bindParam(1,$this->getCod_Autor(),PDO::PARAM_STR);
            if($sql->execute()==1){
                return "Excluindo com sucesso";
            }
            else{
                return "Erro na exclusão";
            }
            $this->conn = null;
        }
        catch(PDOException $exc){
            echo "" . $exc->getMessage();
        }
    }
    function listar(){
        try {
           $this->conn = new Conectar();
           $sql = $this->conn-> query("select * from autor order by Cod_Autor");
           $sql ->execute();
           return $sql->fetchAll();
           $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar a consulta." . $exc->getMessage();
        }
    }
}
?>