<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Joias</title>
</head>
<body>
<?php
$menu = array(
  "Home" => "index.php",
  "Categorias" => array(
    "Anéis" => array(
      "Ouro" => "anel_ouro.php",
      "Prata" => "anel_prata.php",
      "Diamante" => "anel_diamante.php",
    ),
    "Brincos" => array(
      "Ouro" => "brinco_ouro.php",
      "Prata" => "brinco_prata.php",
      "Diamante" => "brinco_diamante.php",
    ),
    "Colares e Pingentes" => array(
      "Ouro" => "colar_ouro.php",
      "Prata" => "colar_prata.php",
      "Diamante" => "colar_diamante.php",
    ),
    "Pulseiras" => array(
      "Ouro" => "pulseira_ouro.php",
      "Prata" => "pulseira_prata.php",
      "Diamante" => "pulseira_diamante.php",
    ),
    "Tiaras" => array(
      "Ouro" => "tiara_ouro.php",
      "Prata" => "tiara_prata.php",
      "Diamante" => "tiara_diamante.php",
    )
  ),
  "Promoções" => "promocoes.php",
  "Contato" => "contato.php"
);

function exibirMenu($menu) {
  echo "<ul class='menu' id='menu'>"; // Inicia a lista do menu

  foreach ($menu as $nome => $link) {
    if (is_array($link)) {
      // Se for uma categoria com subitens
      echo "<li><a href='#'>$nome</a>"; // Link principal
      echo "<ul class='submenu'>"; // Inicia a lista de subitens

      foreach ($link as $subnome => $sublink) {
        if (is_array($sublink)) {
          // Se houver subsubitens (ex.: Ouro, Prata, Diamantes)
          echo "<li><a href='#'>$subnome</a>"; // Subcategoria
          echo "<ul class='subsubmenu'>"; // Inicia a lista de subsubitens

          foreach ($sublink as $subsubnome => $subsublink) {
            echo "<li><a href='$subsublink'>$subsubnome</a></li>"; // Subsubitem
          }

          echo "</ul></li>"; // Fecha a lista de subsubitens
        } else {
          echo "<li><a href='$sublink'>$subnome</a></li>"; // Subitem
        }
      }

      echo "</ul></li>"; // Fecha a lista de subitens
    } else {
      // Se for um link simples
      echo "<li><a href='$link'>$nome</a></li>";
    }
  }

  echo "</ul>"; // Fecha a lista do menu
}

// Exibe o menu
exibirMenu($menu);
?>
</body>
</html>