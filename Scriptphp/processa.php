<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="text-align: center;">
    <?php
    if($_SERVER['REQUEST_METHOD']== 'POST'){
        $nome= $_POST['nome'];
       $idade= $_POST['idade'];
       $cidade= $_POST['cidade'];
       $estado= $_POST['estado'];
        

        echo "<h2>Seja bem vindo, $nome </h2>";
        echo "<p> Você tem $idade anos ";
        echo "<p> E mora na cidade de <strong> $cidade </strong> no estado de $estado  ";
        echo "<br/><br/>";
        echo '<button onclick="window.history.back()">Voltar</button>';

    } else{
        echo "Preencha o formulario anterior, Por Favor !";
    }
   
    ?>
    </div>
</body>
</html>