<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirPanier':
	{
		if(isset($_SESSION['mail'])){
		$n= nbProduitsDuPanier();
		if($n >0)
		{
			$desIdProduit = getLesIdProduitsDuPanier();
			$lesProduitsDuPanier = $pdo->getLesProduitsDuTableau($desIdProduit);
			include("vues/v_panier.php");
		}
		else
		{
			$message = "panier vide !!";
			include ("vues/v_message.php");
		}
		}else{
			$message = "Vous devez vous connecter pour voir le panier.";
			include ("vues/v_message.php");
		}
		break;
	}
	case 'supprimerUnProduit':
	{
	if(isset($_SESSION['mail'])){
		$idProduit=$_REQUEST['produit'];
		retirerDuPanier($idProduit);
		$desIdProduit = getLesIdProduitsDuPanier();
		$lesProduitsDuPanier = $pdo->getLesProduitsDuTableau($desIdProduit);
		include("vues/v_panier.php");
		}else{
			$message = "Vous devez vous connecter pour supprimer le produit.";
			include ("vues/v_message.php");
		}
		break;
	}
	case 'passerCommande' :
	    $n= nbProduitsDuPanier();
		if($n>0)
		{   // les variables suivantes servent à l'affectation des attributs value du formulaire
			// ici le formulaire doit être vide, quand il est erroné, le formulaire sera réaffiché pré-rempli
			$nom ='';$rue='';$ville ='';$cp='';$mail='';
			include ("vues/v_commande.php");
		}
		else
		{
			$message = "panier vide !!";
			include ("vues/v_message.php");
		}
		break;
	case 'confirmerCommande'	:
	{
			$lesIdProduit = getLesIdProduitsDuPanier();
			$numcli=$pdo->trouveNumCli($_SESSION['mail']);
			$pdo->creerCommande($numcli, $lesIdProduit);
			$message = "Commande enregistrée";
			supprimerPanier();
			include ("vues/v_message.php");
		
		break;
	}
	case'supprimerCommande' : 
	{
	if(isset($_SESSION['mail'])){
		$message = "Commande supprimée";
		supprimerPanier();
		include ("vues/v_message.php");
		}else{
			$message = "Vous devez vous connecter pour supprimer la commande.";
			include ("vues/v_message.php");
		}
	break;
	}
	
	}



?>


