<div id="Connecter">
<form method="POST" action="index.php?uc=administrer&action=ConfirmerConnecter">
   <fieldset>
     <legend>Connexion</legend>
		<p>
			<label for="nom">Pseudo</label>
			 <input id="nom" type="text" name="nom" size="30" maxlength="45">
		</p>
		<p>
			<label for="mdp">Mdp</label>
			 <input id="mdp" type="password" name="mdp" size="30" maxlength="45">
		</p>
	  	<p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
	  </fieldset>
</form>
</div>