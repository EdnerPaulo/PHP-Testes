<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>Tabela de Alunos</h1>
   <br>
    
        <?php
    // Inclua o arquivo com a definição da classe Conexao
    require_once("controler.php");

    // Crie um objeto Conexao
    $conexao = new Controler();

    // Conecte-se ao banco de dados
    $conexao->connect();

    // Execute a consulta SQL usando a função select() da classe Conexao
    $resultados = $conexao->select();

    // Verifique se existem resultados
    if ($resultados) {
        // Itere sobre os resultados e exiba as informações dentro de uma tabela




        
        // CAMPOS DO BANCO EM MAIUSCULO (IDENTICO NA CONSTRUÇÃO DA TABELA 'RA não ra')

        echo "<table border='1'>";
        echo "<tr><th>RA</th><th>NOME</th><th>PERIODO</th><th>Excluir</th><th>Update</th></tr>";
        foreach ($resultados as $aluno) {
            echo "<tr>";
            echo "<td>" . $aluno['RA'] . "</td>";
            echo "<td>" . $aluno['NOME'] . "</td>";
            echo "<td>" . $aluno['PERIODO'] . "</td>";
            echo "<td><a href='delete.php?ra={$aluno['RA']}'>Excluir</a></td>";
            echo "<td><a href='alterar.php?ra={$aluno['RA']}&nome={$aluno['NOME']}&periodo={$aluno['PERIODO']}'>Alterar</a></td>";
            echo "</tr>";

            
        }
        
        echo "</table>";
    } else {
        echo "Não foram encontrados registros.";
    }
    ?>
    <br>
    <br>
    <a href="cad_aluno.html">Cadastrar Novo Aluno</a>
    
       
</body>
</html>