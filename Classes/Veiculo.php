<?php


class Veiculo{
    Private $id;
    Private $nome;
    Private $modelo;
    Private $ano;
    Private $placa;

    private $pdo;
    public $erros;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
        $this->erros = array();
    }

    function setId($id) {
        $this->id = $id;
    }
        
    public function setVeiculoCompleto($id, $nome, $modelo, $ano, $placa){
        $this->id= $id;
        $this->nome= $nome;
        $this->modelo= $modelo;
        $this->ano= $ano;
        $this->placa= $placa;
    }

    public function setVeiculo($veiculo){
        $this->veiculo= $veiculo;
    }

    public function setNome($nome){
        $this->nome= $nome;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function setAno($ano){
        $this->ano = $ano;
    }

    public function autentica(){
      $veiculo = $this->veiculo;

      $sql = "SELECT * from veiculos where veiculo = '$veiculo'"; 
      return $this->pdo->query($sql)->fetch();

    }

    public function recuperarPorVeiculo($veiculo){
        $sql = "SELECT * from veiculos where veiculo = '$veiculo'";
        return $this->pdo->query($sql)->fetch();
    }

    public function salvar(){
           if(empty($this->id)){
         //incluir
             $sql ="INSERT INTO veiculos
                    (
                      nome,
                      modelo,
                      ano,
                      placa
                    )
                    VALUES
                    (
                     '$this->nome',
                     '$this->modelo',
                     '$this->ano',
                     '$this->placa'
                     )";
          }else{
          //alterar
              $sql = "UPDATE veiculos
                     SET
                      nome='$this->nome',
                      modelo='$this->modelo',
                      ano='$this->ano',
                      placa='$this->placa'
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
      $sql="SELECT * from veiculos";
      return $this->pdo->query($sql)->fetchAll();
    }

  
}

