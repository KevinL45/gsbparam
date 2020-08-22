<?php
// contrôleur qui gère l'affichage des produits
initPanier(); // se charge de réserver un emplacement mémoire pour le panier si pas encore fait
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirCategories':
	{
  		$lesCategories = $pdo->getLesCategories();
		include("vues/v_choixCategorie.php");
  		break;
	}
	case 'voirProduits' :
	{
		$lesCategories = $pdo->getLesCategories();
		include("vues/v_categories.php");
  		$categorie = $_REQUEST['categorie'];
		$lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
		include("vues/v_produitsDeCategorie.php");
		break;
	}
	case 'ajouterAuPanier' :
	{
			if(isset($_SESSION['mail'])){
		$idProduit=$_REQUEST['produit'];
		
		$ok = ajouterAuPanier($idProduit);
		if(!$ok)
		{
			$message = "Cet article est déjà dans le panier !!";
			include("vues/v_message.php");
		}
		else{
		// on recharge la même page ( NosProduits si pas categorie passée dans l'url')
		if (isset($_REQUEST['categorie'])){
			$categorie = $_REQUEST['categorie'];
			header('Location:index.php?uc=voirProduits&action=voirProduits&categorie='.$categorie);
		}
		else 
			header('Location:index.php?uc=voirProduits&action=nosProduits');
		}
		}else{
			$message = "Vous devez vous connecter pour ajouter un produit.";
			include ("vues/v_message.php");
		}
		break;
	}
	case 'nosProduits'  :
		{
		$lesProduits = $pdo->getLesProduits();
		include("vues/v_produits.php");
		break;
	}
		
		
		
}
?>

