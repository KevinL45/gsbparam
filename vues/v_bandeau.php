<div id="bandeau">
<!-- Images En-tête -->
<img src="images/logo.jpg"	alt="GsbLogo" title="GsbLogo"/>
</div>
<!--  Menu haut-->
<ul id="menu">
	<li><a href="index.php?uc=accueil"> Accueil </a></li>
	<li><a href="index.php?uc=voirProduits&action=voirCategories">Nos produits par catégorie</a></li>
	<li><a href="index.php?uc=voirProduits&action=nosProduits"> Nos produits </a></li>
	
	
<?php	
if(isset($_SESSION['nom'])){
	echo'<li><a href="index.php?uc=administrer&action=catalogue"> Administration </a></li>';
}else{
	if(nbProduitsDuPanier()>0){
	echo'<li><a href="index.php?uc=gererPanier&action=voirPanier"> Voir son panier ('.nbProduitsDuPanier().' Articles) </a></li>';
	}else{
	echo'<li><a href="index.php?uc=gererPanier&action=voirPanier"> Voir son panier </a></li>';
	}
}
if(isset($_SESSION['mail']) OR isset($_SESSION['nom'])){
}else{
	echo'<li><a href="index.php?uc=gestionConnexion&action=Inscription"> Inscription </a></li>';
}
if(isset($_SESSION['mail']) OR isset($_SESSION['nom'])){
	echo'<li><a href="index.php?uc=gestionConnexion&action=Deconnecter"> Se deconnecter </a></li>';
	}else{
	echo'<li><a href="index.php?uc=gestionConnexion&action=Connecter"> Se connecter </a></li>';
	}
	if(isset($_SESSION['nom'])){
		
	echo'<li><a href="index.php?uc=administrer&action=ajouterProduit">Ajouter un produit</a></li>';
		
	}
	
?>
</ul>
