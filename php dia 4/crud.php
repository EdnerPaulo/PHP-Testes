<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrado com Sucesso</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main>
    <?php

    $host  = "localhost";
    $banco = "sabado";
    $usuario = "root";
    $senha = "";

    $pdo = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);  
    $sql = "INSERT INTO cadastro (nome, nicknome, email, senha) VALUES (:nome,:nicknome, :email, :senha)";

    $stm = $pdo->prepare($sql);
    $stm->bindValue(':nome', $nome);
    $stm->bindValue(':nicknome', $nicknome);
    $stm->bindValue(':email', $email);
    $stm->bindValue(':senha', $senha);

    $res = $stm->execute();

    $nome = $_POST["nome"];
    $nicknome = $_POST["nicknome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $senhai = $_POST["senhai"];

    if (empty($nome) || empty($nicknome) || empty($email) || empty($senha) || empty($senhai)) {
        echo"<div>";
        echo "Por favor, preencha todos os campos.";
    } elseif ($senha != $senhai) {
        echo "As senhas não coincidem.";
    } else {
        echo "<h1>Cadastrado com sucesso!<br/><h1>";
        echo"<p> É um prazer  te conhecer ,<strong> $nome </strong>.<br/>";
        echo"Seu Apelido é : <strong>$nicknome</strong><br/>";
        echo"Sua senha é : <strong>$senha</strong>.</p><br/>";
        echo"<br/> Este e meu site.</p><br/>";
    }
    


    ?>
    <p> <a href="javascript:history.go(-1)">Voltar</a></p>    
    <p> <a href="">Proxima Pagina</a></p>
    <?php    
    echo"</div>";
    ?>
</main>
</body>
</html>