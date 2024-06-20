<?php
include_once './ConectarLi.php';

class livro{
    private $Cod_Livro;
    private $Titulo;
    private $ISBN;
    private $Categoria;
    private $QtdePag;
    private $Idioma;
    private $conn;

    public function getCod_Livro(){
        return $this-> Cod_Livro;
    }
    public function setCod_Livro($iid){
        $this->Cod_Livro = $iid;
    }
    public function getTitulo(){
        return $this->Titulo;
    }
    public function setTitulo($titu){
        $this->Titulo = $titu;
    }
    public function getQtdePag(){
        return $this->QtdePag;
    }
    public function setQtdePag($Quant){
        $this->QtdePag = $Quant;
    }
    public function getIdioma() {
        return $this-> Idioma;
    }
    public function setIdioma($idi){
        $this->Idioma = $idi;
    }
    public function getCategoria(){
        return $this-> Categoria;
    }
    public function setCategoria($catego){
        $this-> Categoria = $catego;
    }
    public function setISBN(){
        return $this -> ISBN;
    }
    public function getISBN($isbn){
        $this-> ISBN = $isbn;
    }

    function salvar(){
        try{
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into livro values (null,?,?)");
            @$sql->bindParam(1,$this->getTitulo(),PDO::PARAM_STR);
            @$sql->bindParam(2,$this->getCategoria(),PDO::PARAM_STR);
            @$sql->bindParam(3,$this->getISBN(),PDO::PARAM_STR);
            @$sql->bindParam(4,$this->getIdioma(),PDO::PARAM_STR);
            @$sql->bindParam(5,$this->getQtdePag(),PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("Select * from livro where Cod_Livro = ?");
            @$sql->bindParam(1,$this->getCod_Livro(),PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("update livro set Titulo = ? where id = ?");
            @$sql->bindParam(1,$this->getTitulo(),PDO::PARAM_STR);
            @$sql->bindParam(2,$this->getCategoria(),PDO::PARAM_STR);
            @$sql->bindParam(3,$this->getISBN(),PDO::PARAM_STR);
            @$sql->bindParam(4,$this->getIdioma(),PDO::PARAM_STR);
            @$sql->bindParam(5,$this->getQtdePag(),PDO::PARAM_STR);
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
            $sql =  $this->conn->prepare("select * from livro where Titulo like ?");
            @$sql->bindParam(1,$this->getTitulo(),PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("delete from livro where Cod_Livro = ?");
            $sql ->bindParam(1,$this->getCod_Livro(),PDO::PARAM_STR);
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
           $sql = $this->conn-> query("select * from livro order by Cod_Livro");
           $sql ->execute();
           return $sql->fetchAll();
           $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar a consulta." . $exc->getMessage();
        }
    }
}
?>