<?php

class Controler {

    private $host; 
    private $dbname; 
    private $user; 
    private $password;
    private $pdo;

    public function __construct(){
      $this->host = "localhost";
      $this->dbname = "nicoly_teste";
      $this->user = "root";
      $this->password = "";
    }     

    public function connect(){
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Erro ao conectar com o banco de dados: " . $e->getMessage());
        }
    }

    public function create(){
        
        // Recupera os dados do formulário
        $nome = $_REQUEST["nome"];
        $ra = $_REQUEST["ra"];
        $periodo = $_REQUEST["periodo"];
    
    
        // Insere os dados no banco de dados
        $sql = "INSERT INTO Alunos(ra, nome, periodo) VALUES (:ra, :nome, :periodo)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ra', $ra);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':periodo', $periodo);
        
        // Executa a inserção
        if ($stmt->execute()) {
            echo "Foi cadastrado corretamente no banco. <a href='consulta.php'>Visualizar as infos já cadastradas</a>";
        } else {
            echo "Erro ao cadastrar.";
        }
    }
    
    function select() {
        try {
            // Prepara a consulta SQL
            $sql = "SELECT * FROM Alunos";
            $stmt = $this->pdo->prepare($sql);
            
            // Executa a consulta
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die("Erro ao executar consulta: " . $e->getMessage());
        }
    }

    public function delete(){
        $ra = $_REQUEST["ra"];

        $sql = "     FROM Alunos WHERE RA = :ra";
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':ra', $ra);

        $res = $stm->execute();

        if ($res) {
            echo 'Dados excluídos com sucesso!';
        } else {
            echo 'Erro ao excluir!';
        } 
        echo "<br><br>" ;
        echo "Foi excluido corretamente no banco. <a href='consulta.php'>Visualizar as infos já cadastradas</a>";
    }

    public function update(){
       
    $ra = $_REQUEST['ra'];
    $nome = $_REQUEST["nome"];
    $periodo = $_REQUEST["periodo"];
    


    $sql = 'SELECT * FROM Alunos WHERE RA=:ra,NOME=:nome,PERIODO=:periodo';
    
    $stm = $this->pdo->prepare($sql);
    $stm->bindValue(':ra', $ra);
    $stm->bindValue(':nome', $nome);
    $stm->bindValue(':periodo', $periodo);
  
    } 

    public function gravarAlteracao(){
        $ra = $_REQUEST["ra"];
        $nome = $_REQUEST["nome"];
        $periodo = $_REQUEST["periodo"];
     
    
        $sql = 'UPDATE alunos SET nome=:nome, periodo=:periodo WHERE ra=:ra';
    
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':ra', $ra);
        $stm->bindValue(':nome', $nome);
        $stm->bindValue(':periodo', $periodo);
    
        $res = $stm->execute();
    
        if ($res) {
          echo 'Dados alterados com sucesso!';
        } else {
          echo 'Erro ao alterar!';
        }
        echo "<br><br>";
        echo "<a href='consulta.php'>Voltar</a>";
     
        }

}