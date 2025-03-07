<?php

require_once("controler.php");
$visualizao = new Controler();
$visualizao->connect();
$visualizao->delete();

?>
