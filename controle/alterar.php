<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar Informações</h1>

    <?php
    require_once("controler.php");
    $visualizao = new Controler();
    $visualizao->connect();
    $visualizao->update();
    ?>

<form action="grava_alteracao.php" method="POST">
        <h2>Editar Aluno</h2>
        <label for="nome">RA:</label>
        <input type="number" id="ra" name="ra" value=<?php echo $_REQUEST['ra'] ;?>>
        <br> 

        <label for="nome">Nome Completo:</label>
        <input type="text" id="nome" name="nome" value=<?php echo $_REQUEST['nome'] ;?>>
        <br>

        <label for="nome">Periodo:</label>
        <select name="periodo">
            <option value="Manha">Manhã</option>
            <option value="Tarde">Tarde</option>
            <option value="Noite">Noite</option>
            <option value="<?php echo $_REQUEST['periodo'];  ?>" selected><?php echo $_REQUEST['periodo']; ?></option>
        </select>
        <br>

        <button type="submit">Alterar</button>

    </form>
</body>
</html>