<?php
// contrôleur qui gère l'affichage des produits
$action = $_REQUEST['action'];
switch($action)
{
	Case 'Inscription'  :
	{
		include ("vues/v_inscription.php");
		if(isset($_REQUEST['valider'])) {
		$message=$_REQUEST['valider'];
		include("vues/v_message.php");
		}
	break;	
	}
	Case 'confirmerInscription'  :
	{
				
	$msgErreurs = getErreursSaisieCommande($_REQUEST['nom'],$_REQUEST['prenom'],$_REQUEST['rue'],$_REQUEST['ville'],$_REQUEST['cp'],$_REQUEST['mail'],$_REQUEST['mdp']);
	if(count($msgErreurs)!=0){
			
	include("vues/v_erreurs.php");
	include ("vues/v_inscription.php");
	
	}else{
	$pdo->creerClient($_REQUEST['mdp'],$_REQUEST['prenom'],$_REQUEST['nom'],$_REQUEST['mail'],$_REQUEST['rue'],$_REQUEST['ville'],$_REQUEST['cp']);
	$message='Inscription du client confirmé';
	include("vues/v_message.php");
	}
	break;	
	}
	
	Case 'Connecter'  :
	{
		include ("vues/v_connecter.php");
		if(isset($_REQUEST['valider'])) {
		$message=$_REQUEST['valider'];
		include("vues/v_message.php");
		}
		
	break;	
	}
	Case 'ConfirmerConnecter'  :
	{
		$message=$pdo->VerifClient($_REQUEST['mdp'],$_REQUEST['mail']);
		
		
		
	break;	
	}
	Case 'Deconnecter'  :
	{
	deconnecter();
	header('Location:index.php');
	break;	
	}
	
	
	
}
?>