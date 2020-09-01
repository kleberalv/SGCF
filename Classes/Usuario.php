<?php
/* ######### Classe 6######### */
/* #Este arquivo foi gerado em 24/05/2013 10:12:47pelo gerador de aplicativos PHP,# */
/* #desenvolvido por Wellington G. de Sousa.# */
/* #e-mail:wellingtonsousa@pop.com.br# */
/* ############################################ */

class Usuario{
    Private $id;
    Private $nome;
    Private $email;
    Private $usuario;
    Private $senha;
    Private $situacao;

    private $pdo;
    public $erros;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
        $this->erros = array();
    }

    function setId($id) {
        $this->id = $id;
    }
        
    public function setUsuarioCompleto($id, $nome, $usuario, $email){
        $this->id= $id;
        $this->nome= $nome;
        $this->usuario= $usuario;
        $this->email= $email;
    }

    public function setUsuario($usuario){
        $this->usuario= $usuario;
    }

    public function setSenha($senha){
        $this->senha= $senha;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function autentica(){
      $usuario = $this->usuario;

      $sql = "SELECT * from usuarios where usuario = '$usuario'"; 
      return $this->pdo->query($sql)->fetch();

    }

    public function recuperarPorUsuario($usuario){
        $sql = "SELECT * from usuarios where usuario = '$usuario'";
        return $this->pdo->query($sql)->fetch();
    }

    public function salvar(){
           if(empty($this->id)){
         //incluir
             $sql ="INSERT INTO usuarios
                    (
                      nome,
                      email,
                      senha,
                      usuario,
                      situacao
                    )
                    VALUES
                    (
                     '$this->nome',
                     '$this->email',
                     '$this->senha',
                     '$this->usuario',
                     'bloqueado'
                     )";
          }else{
          //alterar
              $sql = "UPDATE usuarios
                     SET
                      nome='$this->nome',
                      email='$this->email',
                      senha='$this->senha',
                      usuario='$this->usuario'
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
      $sql="SELECT * from usuarios";
      return $this->pdo->query($sql)->fetchAll();
    }

  
}

