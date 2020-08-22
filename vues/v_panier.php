<div><img src="images/panier.gif"	alt="Panier" title="panier"/></div>
<div id="produits">
<?php

foreach( $lesProduitsDuPanier as $unProduit) 
{
	// récupération des données d'un produit
	$id = $unProduit['id'];
	$description = $unProduit['description'];
	$image = $unProduit['image'];
	$prix = $unProduit['prix'];

	// affichage
	?>
	<div class="card">
			<div class="photoCard"><img src="<?php echo $image ?>" alt="image descriptive" /></div>
	<div class="descrCard"><?php echo	$description;?>	</div>
	<div class="prixCard"><?php echo $prix."€" ?></div>
	<div class="imgCard"><a href="index.php?uc=gererPanier&produit=<?php echo $id ?>&action=supprimerUnProduit" onclick="return confirm('Voulez-vous vraiment retirer cet article ?');">
	<img src="images/retirerpanier.png" TITLE="Retirer du panier" alt="retirer du panier"></a></div>
	<input type="number" name="qte" value="1">
	</div>
	<?php
}
?>
<div class="commande">
<a href="index.php?uc=gererPanier&action=confirmerCommande"><img src="images/commander.jpg" title="Passer commande" alt="Commander"></a>

</div>
<div class="supprimerCommande">
<a href="index.php?uc=gererPanier&action=supprimerCommande"><img src="images/supprimer.png" title="supprimerCommande"width="40" height="40" onclick="return confirm('Voulez-vous vraiment retirer cet article ?');">
</div>
</div>
<br/>
