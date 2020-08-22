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
			<div class="descrCard"><?php echo $id ?></div>
			<div class="descrCard"><?php echo $description ?></div>
			<div class="prixCard"><?php echo $prix."€" ?></div>	
	</div>
<?php			
} // fin du foreach qui parcourt les produits
?>
</div>
