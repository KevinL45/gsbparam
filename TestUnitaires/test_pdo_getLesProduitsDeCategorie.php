<?php
//Un require_once pour disposer du code de la classe
require_once("../util/class.pdoGsbParam.inc.php");
$pdoTest=PdoGsbParam::getPdoGsbParam();
//Affichage du résultat de la méthode
var_dump($pdoTest->getLesProduitsDeCategorie(1));
?>