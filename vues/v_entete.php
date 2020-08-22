<!doctype html>
<html lang="fr">
<head>
<title>Gsb Para</title>
<meta charset="utf-8">
<link href="util/cssGeneral.css" rel="stylesheet">
<?php 
	if(isset($_SESSION['nom'])){
	echo'Administrateur : '.$_SESSION['nom'];
	}
	if(isset($_SESSION['mail'])){
	echo'Client : '.$_SESSION['prenomClient'].' '.$_SESSION['nomClient'];
	}
?>
</head>
<body >