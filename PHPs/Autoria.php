<?php
include_once './ConectarLi.php';

class Autoria{
    private $Cod_Autor;
    private $Cod_Livro;
    private $DataLacamento;
    private $Editora;
    private $conn;
    public function getCod_Autor(){
        return $this-> Cod_Autor;
    }
    public function setCod_Autor($iid){
        $this->Cod_Autor = $iid;
    }
    public function getCod_Livro(){
        return $this->Cod_Livro;
    }
    public function setCod_Livro($iid2){
        $this->Cod_Livro = $iid2;
    }
    public function getDataLacamento(){
        return $this->DataLacamento;
    }
    public function setSobrenome($dl){
        $this->DataLacamento = $dl;
    }
    public function getEditora() {
        return $this-> Editora;
    }
    public function setEmail($Edi){
        $this->Editora = $Edi;
    }
    

    function salvar(){
        try{
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into autoria values (null,?,?)");
            @$sql->bindParam(1,$this->getCod_Autor(),PDO::PARAM_STR);
            @$sql->bindParam(2,$this->getCod_Livro(),PDO::PARAM_STR);
            @$sql->bindParam(3,$this->getDataLacamento(),PDO::PARAM_STR);
            @$sql->bindParam(4,$this->getEditora(),PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("Select * from autoria where Cod_Autor = ?");
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
            $sql = $this->conn->prepare("update autoria set Editora = ? where Cod_Autor = ?");
            @$sql->bindParam(1,$this->getCod_Autor(),PDO::PARAM_STR);
            @$sql->bindParam(2,$this->getCod_Livro(),PDO::PARAM_STR);
            @$sql->bindParam(3,$this->getDataLacamento(),PDO::PARAM_STR);
            @$sql->bindParam(4,$this->getEditora(),PDO::PARAM_STR);
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
            $sql =  $this->conn->prepare("select * from autoria where Editora like ?");
            @$sql->bindParam(1,$this->getEditora(),PDO::PARAM_STR);
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
           $sql = $this->conn-> query("select * from autoria order by Cod_Autor");
           $sql ->execute();
           return $sql->fetchAll();
           $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar a consulta." . $exc->getMessage();
        }
    }
}
?>