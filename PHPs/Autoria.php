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
    public function setDataLacamento($dl){
        $this->DataLacamento = $dl;
    }
    public function getEditora() {
        return $this-> Editora;
    }
    public function setEditora($Edi){
        $this->Editora = $Edi;
    }
    public function relacaoAutorLivro() {
        //Verifica se o código do livro bate com o código do autor e vice-versa
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select count(*) from autoria where Cod_Autor = ? AND Cod_Livro = ?");
            $sql->bindValue(1, $this->getCod_Autor(), PDO::PARAM_INT);
            $sql->bindValue(2, $this->getCod_Livro(), PDO::PARAM_INT);
            $sql->execute();
            $resultado = $sql->fetchColumn();
            return $resultado > 0; // Se o resultado for maior que 0, existe a relação.
        } catch (PDOException $exc) {
            echo "Erro ao verificar relação: " . $exc->getMessage();
        }
    }
    public function autorExistente(){
        //verfica se autor existe no banco de dados
        try {
          $this->conn = new Conectar();
          $sql = $this->conn->prepare("select * from autor where Cod_Autor = ?");//acessa a tabela Autor
          $sql->bindValue(1,$this->getCod_Autor(),PDO::PARAM_INT);//use bindValue ao invés de bindparam para evitar erros 
          $sql->execute();//executa a consulta no banco de dados
          $resultado = $sql->fetchColumn();//retorna o valor da primeira linha da primeira coluna, nesse cado o Codigo do autor
          return $resultado > 0;//se houver um codigo irá retornar esse valor para saber que existe
        } catch (PDOException $exc) {
            echo "Erro ao verificar autor: " . $exc->getMessage(); 
        }
    }
    public function LivroExistente(){
        //verifica se o livro existe no banco de dados
        try {
          $this->conn = new Conectar();
          $sql = $this->conn->prepare("select count(*) from livro where Cod_Livro = ?");
          $sql->bindValue(1,$this->getCod_Livro(),PDO::PARAM_INT);
          $sql->execute();
          $resultado = $sql->fetchColumn();
          return $resultado > 0;
        } catch (PDOException $exc) {
            echo "Erro ao verificar autor: " . $exc->getMessage();        
        }
    }
    function salvar(){
        if (!$this->autorExistente()) {
            return "<b>Erro: Código do autor não existe!</b>";
        }
        if (!$this->LivroExistente()) {
            return "Erro: Código do livro não existe!";

        }
        else{
            try{
                // associa os parâmetros da consulta SQL com os valores respectivos
                 $sql = $this->conn->prepare("insert into autoria values (?,?,?,?)");
                 @$sql->bindParam(1,$this->getCod_Autor(),PDO::PARAM_STR);
                 @$sql->bindParam(2,$this->getCod_Livro(),PDO::PARAM_STR);
                 @$sql->bindParam(3,$this->getDataLacamento(),PDO::PARAM_STR);
                 @$sql->bindParam(4,$this->getEditora(),PDO::PARAM_STR);
                 if ($sql->execute() == 1) {
                     return "Registro salvo com sucesso!";
                 } 
                 $this->conn = null;
             }
             catch(PDOException $exc){
                 echo "erro ao salvar o registro.". $exc->getMessage();
             }
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
    function exclusao() {
        try {
           
            if (!$this->autorExistente()) {
                return "Erro: Código do autor não existe!";
            }
            if (!$this->LivroExistente()) {
                return "Erro: Código do livro não existe!";
            }
            if (!$this->relacaoAutorLivro()) {
                return "Erro: Não existe uma relação entre o autor e o livro fornecidos.";
            }
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("delete from autoria where Cod_Autor = ? and Cod_Livro = ?");
            $sql->bindValue(1, $this->getCod_Autor(), PDO::PARAM_STR);
            $sql->bindValue(2, $this->getCod_Livro(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
                return "Excluído com sucesso";
            } else {
                return "Erro na exclusão";
            }
            $this->conn = null;
        } catch (PDOException $exc) {
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