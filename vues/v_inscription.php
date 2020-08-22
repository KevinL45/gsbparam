<div id="Inscription,">
<form method="POST" action="index.php?uc=gestionConnexion&action=confirmerInscription">
   <fieldset>
     <legend>Inscription</legend>
		<p>
			<label for="mail">Mail</label>
			 <input id="mail" type="text" name="mail" size="30" maxlength="45">
		</p>
		<p>
			<label for="mdp">Mdp</label>
			 <input id="mdp" type="password" name="mdp"   size="30" maxlength="45">
		</p>
		<p>
			<label for="prenom">Prenom</label>
			 <input id="prenom" type="text" name="prenom"  size="30" maxlength="45">
		</p>
		<p>
         <label for="nom">Nom</label>
         <input id="nom" type="text" name="nom" size="10" maxlength="10">
      </p>
      <p>
         <label for="ville">Ville</label>
         <input id="ville" type="text" name="ville"   size="10" maxlength="10">
      </p>
      <p>
         <label for="cp">Cp</label>
         <input id="cp" type="text"  name="cp"   size ="25" maxlength="25">
      </p> 
	   <p>
         <label for="rue">Rue</label>
         <input id="rue" type="text"  name="rue"  size ="25" maxlength="25">
      </p> 
	  	<p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
	  </fieldset>
</form>
</div>