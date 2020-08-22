<div id="Connecter">
<form method="POST" action="index.php?uc=administrer&action=insertProduit">
   <fieldset>
     <legend>Ajouter un produit </legend>
		<p>
			<label for="id">Code du produit</label>
			 <input id="id" type="text" name="id" size="30" maxlength="45">
		</p>
		<p>
			<label for="description">Description</label>
			 <input id="description" type="text" name="description" size="30" maxlength="45">
		</p>
		<p>
			<label for="prix">Prix</label>
			 <input id="prix" type="money_format" name="prix" size="30" maxlength="100">
		</p>
		<p>
			<label for="image">Image</label>
			 <input id="image" type="text" name="image" size="30" maxlength="45">
		</p>
		<p>
		<label for="categories">Choix catégories</label>
		<SELECT name="categories" size="1">
		<?php 
		foreach( $lesCategories as $uneCategorie) 
		{
		$idCategorie = $uneCategorie['id'];
		$libCategorie = $uneCategorie['libelle'];
		echo"<OPTION value=".$idCategorie.">".$libCategorie;
		}
		?>
		</SELECT>
		</p>
	  	<p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
	  </fieldset>
</form>
</div>