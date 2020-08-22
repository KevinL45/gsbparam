<div id="produits">

<?php
// parcours du tableau contenant les produits à afficherforeach( $lesProduits as $unProduit) 
{ 	// récupération des informations du produit
	$id = $unProduit['id'];
	$description = $unProduit['description'];
	$prix=$unProduit['prix'];
	$image = $unProduit['image'];
	// affichage d'un produit avec ses informations
	?>	
	<div class="card">
			<div class="photoCard"><img src="<?php echo $image ?>" alt=image /></div>
			<div class="descrCard"><?php echo $description ?></div>
			<div class="prixCard"><?php echo $prix."€" ?></div>
			<?php if (isset($_SESSION['nom'])) {?>
			<div class="imgCard">
			<a href="index.php?uc=administrer&produit=<?php echo $id ?>&action=modifierProduit"> 
			<img src="images/modifier.png" TITLE="Modifier le produit" width="40" height="40"> </a></div>
			
			<div class="supprimer">
			<a href="index.php?uc=administrer&produit=<?php echo $id ?>&action=supprimerProduit"> 
			<img src="images/supprimer.png" TITLE="Supprimer le produit" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?');" width="40" height="40" > </a></div>
			<?php }else{ ?>
			<div class="imgCard"><a href="index.php?uc=voirProduits&categorie=<?php echo $categorie ?>&produit=<?php echo $id ?>&action=ajouterAuPanier"> 
			<img src="images/mettrepanier.png" TITLE="Ajouter au panier" alt="Mettre au panier"> </a></div>
			<?php } ?>
			
			 
			
	</div>
<?php			
} // fin du foreach qui parcourt les produits
?>
</div>
