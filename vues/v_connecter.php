<div id="Connecter">
<form method="POST" action="index.php?uc=gestionConnexion&action=ConfirmerConnecter">
   <fieldset>
     <legend>Connexion</legend>
		<p>
			<label for="mail">Mail</label>
			 <input id="mail" type="text" name="mail" size="30" maxlength="45">
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