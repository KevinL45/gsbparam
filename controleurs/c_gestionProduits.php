<?php
// à vous de jouer !
// contrôleur qui gère l'affichage des produits
$action = $_REQUEST['action'];
switch($action)
{
case 'Connecter':
{
	include ("vues/v_administrateur.php");
if(isset($_REQUEST['valider'])) {
	$message=$_REQUEST['valider'];
	include("vues/v_message.php");
	}
	break;
}
case 'ConfirmerConnecter':
{
	$message=$pdo->VerifAdministrateur($_REQUEST['nom'],$_REQUEST['mdp']);
	break;
}
Case 'Deconnecter'  :
	{
	deconnecter();
	header('Location:index.php');
	break;	
	}

case 'modifierProduit' :
{
	if(isset($_SESSION['nom'])){
	
	$lesCategories = $pdo->getLesCategories();
	include("vues/v_modifproduit.php");
	
	if(isset($_REQUEST['valider'])) {
	$message=$_REQUEST['valider'];
	include("vues/v_message.php");
	}
	}else{
			$message = "Vous devez vous connecter en tant que administrateur.";
			include ("vues/v_message.php");
		}
	break;	
	}
case 'confirmeModif' :
	{
		
	$msgErreurs = getErreursSaisieModif($_REQUEST['description'],$_REQUEST['prix'],$_REQUEST['image'],$_REQUEST['categories']);
	if(count($msgErreurs)!=0){
			
	include("vues/v_erreurs.php");
	$lesCategories = $pdo->getLesCategories();
	include("vues/v_modifproduit.php");
	
	}else{
	$message=$pdo->modifProduit($_REQUEST['produit'],$_REQUEST['description'],$_REQUEST['prix'],$_REQUEST['image'],$_REQUEST['categories']);
	include("vues/v_message.php");
		}
	break;	
	}
case 'supprimerProduit' :
	{
	if(isset($_SESSION['nom'])){
	$message=$pdo->supProduit($_REQUEST['produit']);
	include("vues/v_message.php");
		}else{
			$message = "Vous devez vous connecter en tant que administrateur.";
			include ("vues/v_message.php");
		}
	break;
	}

case 'ajouterProduit' :
	{
		if(isset($_SESSION['nom'])){
	$lesCategories = $pdo->getLesCategories();
	include("vues/v_ajouteproduit.php");
	if(isset($_REQUEST['valider'])) {
	$message=$_REQUEST['valider'];
	include("vues/v_message.php");
	}
		}else{
			$message = "Vous devez vous connecter en tant que administrateur.";
			include ("vues/v_message.php");
		}
	
	break;
	}
case 'insertProduit' :
	{
		$msgErreurs = getErreursSaisieAjout($_REQUEST['id'],$_REQUEST['description'],$_REQUEST['prix'],$_REQUEST['image'],$_REQUEST['categories']);
	if(count($msgErreurs)!=0){
			
	include("vues/v_erreurs.php");
	$lesCategories = $pdo->getLesCategories();
	include("vues/v_ajouteproduit.php");	
	}else{
	$message=$pdo->creerProduit($_REQUEST['id'],$_REQUEST['description'],$_REQUEST['prix'],$_REQUEST['image'],$_REQUEST['categories']);
	include("vues/v_message.php");
	}
	break;
	}
case 'catalogue' :
{
	if(isset($_SESSION['nom'])){
	$lesCategories = $pdo->getLesCategories();
	include("vues/v_choixCatalogue.php");
	}else{
			$message = "Vous devez vous connecter en tant que administrateur.";
			include ("vues/v_message.php");
		}
 

break;	
}
case 'voirCatalogueProduit':
{
	if(isset($_SESSION['nom'])){
	$lesCategories = $pdo->getLesCategories();
	include("vues/v_catalogue.php");
	$categorie = $_REQUEST['categorie'];
	$lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
	include("vues/v_CatalogueProduits.php");
	
	
	}else{
			$message = "Vous devez vous connecter en tant que administrateur.";
			include ("vues/v_message.php");
		}
	
break;	
}
}







?>