<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrado com Sucesso</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
$host = 'localhost';
$banco = 'cadastro';
$usuario = 'root';
$senha = '';

$mysqli = new mysqli($host, $usuario, $senha);

// Criar o banco de dados se não existir
if (!$mysqli->query("CREATE DATABASE IF NOT EXISTS $banco")) {
    echo "Erro ao criar o banco de dados: " . $mysqli->error;
} else {
    // Conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);

    // Criar a tabela "usuarios" se não existir
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nome VARCHAR(255),
        nicknome VARCHAR(255),
        email VARCHAR(255),
        senha VARCHAR(255)
    )";
    $pdo->query($sql);

    function cadastrarUsuario($nome, $nicknome, $email, $senha) {
        global $pdo;
        $sql = "INSERT INTO usuarios (nome, nicknome, email, senha) VALUES (:nome, :nicknome, :email, :senha)";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':nome', $nome);
        $stm->bindValue(':nicknome', $nicknome);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':senha', password_hash($senha, PASSWORD_DEFAULT));
        try {
            return $stm->execute();
        } catch (PDOException $e) {
            echo "Erro ao cadastrar usuário: " . $e->getMessage();
            return false;
        }
    }

    if (empty($_POST["nome"]) || empty($_POST["nicknome"]) || empty($_POST["email"]) || empty($_POST["senha"]) || empty($_POST["senhai"])) {
        echo "<div>Por favor, preencha todos os campos.</div>";
    } elseif ($_POST["senha"] != $_POST["senhai"]) {
        echo "<div>As senhas não coincidem.</div>";
    } else {
        $nome = filter_var($_POST["nome"], FILTER_SANITIZE_STRING);
        $nicknome = filter_var($_POST["nicknome"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $senha = $_POST["senha"];
        if (cadastrarUsuario($nome, $nicknome, $email, $senha)) {
            echo "<h1>Cadastrado com sucesso!</h1><br/>";
            echo "<p>É um prazer te conhecer, $nome.</p>";
        }
    }
}
?>
    <p><a href="javascript:history.go(-1)">Voltar</a></p>    
    <p><a href="">Próxima Página</a></p>
</body>
</html>