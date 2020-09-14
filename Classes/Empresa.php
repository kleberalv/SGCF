<?php
/* ######### Classe 6######### */
/* #Este arquivo foi gerado em 24/05/2013 10:12:47pelo gerador de aplicativos PHP,# */
/* #desenvolvido por Wellington G. de Sousa.# */
/* #e-mail:wellingtonsousa@pop.com.br# */
/* ############################################ */

class Empresa{
    Private $id;
    Private $cnpj;

    private $pdo;
    public $erros;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
        $this->erros = array();
    }

    function setId($id) {
        $this->id = $id;
    }
        
    public function setUsuarioCompleto($id, $nome, $cnpj){
        $this->id= $id;
        $this->nome= $nome;
        $this->cnpj= $cnpj;
        }

    public function setCnpj($cnpj){
        $this->cnpj= $cnpj;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function nome(){
      $nome = $this->nome;

      $sql = "SELECT * from empresa where nome = '$nome/'"; 
      return $this->pdo->query($sql)->fetch();

    }

    public function recuperarPorCnpj($cnpj){
        $sql = "SELECT * from empresa where cnpj = '$cnpj'";
        return $this->pdo->query($sql)->fetch();
    }

    public function salvar(){
           if(empty($this->id)){
         //incluir
             $sql ="INSERT INTO empresa
                    (
                      nome,
                      cnpj
                    )
                    VALUES
                    (
                     '$this->nome',
                     '$this->cnpj'
                     )";
          }else{
          //alterar
              $sql = "UPDATE empresa
                     SET
                      nome='$this->nome',
                      cnpj='$this->cnpj'
                     WHERE id = '$this->id'";
           }
           $resultado = $this->pdo->exec($sql);
           if(!empty($resultado)){
               return "Ok";
           }else{
               return "nOk";
           }
    }

    public function listar(){
      $sql="SELECT * from empresa";
      return $this->pdo->query($sql)->fetchAll();
    }

        public function deletar(){
      $sql="DELETE FROM empresa WHERE id = '$this->id'";
      if($this->pdo->exec($sql)){
               return 1;
           }else{
               return 2;
           }
    }

  
}

