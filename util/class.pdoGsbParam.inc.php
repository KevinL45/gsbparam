<?php

/** 
* fichier class.PdoGsbParam.inc.php
* contient la classe PdoGsbParam qui fournit 
* un objet pdo et des méthodes pour récupérer des données d'une BD
 */

 /** 
 * PdoGsbParam
 
 * classe PdoGsbParam : classe d'accès aux données. 
 * Utilise les services de la classe PDO
 * pour l'application GsbParam
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 
* @package  GsbParam\util
* @version 2019_v2
* @author M. Jouin
*/

class PdoGsbParam
{   	
		/**
		* type et nom du serveur de bdd
		* @var string $serveur
		*/
      	private static $serveur='mysql:host=localhost';
		/**
		* nom de la BD 
		* @var string $bdd
		*/
      	private static $bdd='dbname=gsbpara';
		/**
		* nom de l'utilisateur utilisé pour la connexion 
		* @var string $user
		*/   		
      	private static $user='kevin' ;   
		/**
		* mdp de l'utilisateur utilisé pour la connexion 
		* @var string $mdp
		*/  		
      	private static $mdp='lokoka45' ;
		/**
		* objet pdo de la classe Pdo pour la connexion 
		* @var string $monPdo
		*/ 	
		private static $monPdo=null;
		
			private static $monPdoGsbParam = null;
	/**
	 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
	 * pour toutes les méthodes de la classe
	 */				
	private function __construct()
	{
    		PdoGsbParam::$monPdo = new PDO(PdoGsbParam::$serveur.';'.PdoGsbParam::$bdd, PdoGsbParam::$user, PdoGsbParam::$mdp); 
			PdoGsbParam::$monPdo->query('SET CHARACTER SET utf8');
	}
	/**
    * destructeur
    */
	public function _destruct(){
		PdoGsbParam::$monPdo = null;
	}
	/**
	 * Fonction statique qui crée l'unique instance de la classe
	 *
	 * Appel : $instancePdoGsbParam = PdoGsbParam::getPdoGsbParam();
	 * @return PdoGsbParam $monPdoGsbParam l'unique objet de la classe PdoGsbParam
	 */
	public static function getPdoGsbParam()
	{
		if(PdoGsbParam::$monPdoGsbParam == null)
		{
			PdoGsbParam::$monPdoGsbParam= new PdoGsbParam();
		}
		return PdoGsbParam::$monPdoGsbParam;  
	}
	/**
	 * Retourne toutes les catégories sous forme d'un tableau associatif
	 *
	 * @return array $lesLignes le tableau associatif des catégories 
	*/
	public function getLesCategories()
	{
		$req = 'select * from categorie';
		$res = PdoGsbParam::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	/**
	 * Retourne toutes les informations d'une catégorie passée en paramètre
	 *
	 * @param string $idCategorie l'id de la catégorie
	 * @return array $laLigne le tableau associatif des informations de la catégorie 
	*/
	public function getLesInfosCategorie($idCategorie)
	{
		$req = 'SELECT * FROM categorie WHERE id="'.$idCategorie.'"';
		$res = PdoGsbParam::$monPdo->query($req);
		$laLigne = $res->fetch();
		return $laLigne;
	}
/**
 * Retourne sous forme d'un tableau associatif tous les produits de la
 * catégorie passée en argument
 * 
 * @param string $idCategorie  l'id de la catégorie dont on veut les produits
 * @return array $lesLignes un tableau associatif  contenant les produits de la categ passée en paramètre
*/

	public function getLesProduitsDeCategorie($idCategorie)
	{
	    $req='select * from produit where idCategorie ="'.$idCategorie.'"';
		$res = PdoGsbParam::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	}
	/**
	 * Retourne toutes les produits sous forme d'un tableau associatif
	 *
	 * @return array $lesLignes le tableau associatif des produis
	*/
	public function getLesProduits(){
		
		$req = 'select * from produit';
		$res = PdoGsbParam::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
		
	}
/**
 * Retourne les produits concernés par le tableau des idProduits passée en argument
 *
 * @param array $desIdProduit tableau d'idProduits
 * @return array $lesProduits un tableau associatif contenant les infos des produits dont les id ont été passé en paramètre
*/
	public function getLesProduitsDuTableau($desIdProduit)
	{
		$nbProduits = count($desIdProduit);
		$lesProduits=array();
		if($nbProduits != 0)
		{
			foreach($desIdProduit as $unIdProduit)
			{
				$req = 'select * from produit where id = "'.$unIdProduit.'"';
				$res = PdoGsbParam::$monPdo->query($req);
				$unProduit = $res->fetch();
				$lesProduits[] = $unProduit;
			}
		}
		return $lesProduits;
	}
	/**
	 * Crée une commande 
	 *
	 * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
	 * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
	 * tableau d'idProduit passé en paramètre
	 * @param string $nom nom du client
	 * @param string $rue rue du client
	 * @param string $cp cp du client
	 * @param string $ville ville du client
	 * @param string $mail mail du client
	 * @param array $lesIdProduit tableau associatif contenant les id des produits commandés
	 
	*/
	public function creerCommande($numcli, $lesIdProduit)
	{
		// on récupère le dernier id de commande
		$req = 'select max(id) as maxi from commande';
		$res = PdoGsbParam::$monPdo->query($req);
		$laLigne = $res->fetch();
		$maxi = $laLigne['maxi'] ;// on place le dernier id de commande dans $maxi
		$idCommande = $maxi+1; // on augmente le dernier id de commande de 1 pour avoir le nouvel idCommande
		$date = date('Y/m/d'); // récupération de la date système
		$req = "insert into commande values ('$idCommande','$date','$numcli')";
		$res = PdoGsbParam::$monPdo->exec($req);
		// insertion produits commandés
		foreach($lesIdProduit as $unIdProduit)
		{
			$req = "insert into contenir values ('$idCommande','$unIdProduit')";
			$res = PdoGsbParam::$monPdo->exec($req);
		}
	}
	//Creation d'un client 
	public function creerClient($mdp,$prenom,$nom,$mail,$rue,$ville,$cp){
	//Mdp crypté
	$hash = password_hash($mdp, PASSWORD_DEFAULT);
	$req=PdoGsbParam::$monPdo -> prepare ("SELECT mail FROM client WHERE mail=:mail");
	$res=$req -> execute (array(
	'mail' => $mail
	));	
	$res=$req->fetch();
	if ($res==true){
		header('Location:index.php?uc=gestionConnexion&action=Inscription&valider=Le mail existe déja');
	}else{
	//Insertion du client 
	$req=PdoGsbParam::$monPdo -> prepare ("insert into client (mdp,prenom,nom,mail,rue,ville,cp) values ('$hash','$prenom','$nom','$mail','$rue','$ville','$cp')");
	$res2=$req -> execute (array(
	'$mdp' => $hash,
	'$prenom' => $prenom,
	'$nom' => $nom,
	'$mail' => $mail,
	'$rue' => $rue,
	'$ville' => $ville,
	'$cp' => $cp
	));	
	}
	}
	public function VerifClient($mdp,$mail){
	//Recherche le mail et le mot de passe du client
	$req=PdoGsbParam::$monPdo -> prepare ("SELECT mdp , mail, nom, prenom FROM client WHERE mail=:mail");
	$res=$req -> execute (array (
	'mail' => $mail
	));
	$res=$req->fetch();
	//Verification du mot de passe
	if($res==true){
		if(password_verify($mdp, $res['mdp'])){
			
					//Affectation
					$_SESSION['mail']=$mail;
					$_SESSION['prenomClient']=$res['prenom'];
					$_SESSION['nomClient']=$res['nom'];
					header('Location:index.php');
					
			}else{
					header('Location:index.php?uc=gestionConnexion&action=Connecter&valider=Erreur sur le mot de passe');
				
			}
	}else{
		
					header('Location:index.php?uc=gestionConnexion&action=Connecter&valider=Erreur sur le mail');
		
	}

	
	}
	public function trouveNumCli($mail){
	$req=PdoGsbParam::$monPdo -> prepare ("SELECT numcli, mail FROM client WHERE mail=:mail");
	$res=$req -> execute (array (
	'mail' => $mail
	));
	$res=$req->fetch();
	return $res['numcli'];
	
	}
	public function VerifAdministrateur($nom, $mdp){
	$req=PdoGsbParam::$monPdo -> prepare ("SELECT nom, mdp FROM administrateur WHERE nom=:nom");
	$res=$req -> execute (array (		
	'nom' => $nom
	));
	$res=$req->fetch();
	if($res==true){
		if($res['mdp']==$mdp){
			
					$_SESSION['nom']=$nom;
					header('Location: index.php?uc=voirProduits&action=voirCategories');
			}else{
				//$message='Votre mot de passe est incorrect';
				//return $message;
				header('Location: index.php?uc=administrer&action=Connecter&valider=Erreur sur le mot de passe');
			}	
		}else{
				//$message='Votre pseudo est incorrect';
				//return $message;
				header('Location: index.php?uc=administrer&action=Connecter&valider=Erreur sur le pseudo');
			
		}
	}
	public function supProduit($id){
		$req=PdoGsbParam::$monPdo -> prepare ("SELECT idproduit FROM contenir WHERE idproduit=:id");
		$res=$req -> execute (array (		
		'id' => $id
		));
		$res=$req->fetch();
		if($res==true){
		$req=PdoGsbParam::$monPdo -> prepare (" DELETE FROM contenir WHERE idProduit=:id");
		$res2=$req -> execute (array (		
		'id' => $id
		));
		$res2=$req->fetch();
		}
		$req=PdoGsbParam::$monPdo -> prepare (" DELETE FROM produit WHERE id=:id");
		$res3=$req -> execute (array (		
		'id' => $id
		));
		$res3=$req->fetch();
		$message="Le produit est supprimé";
		return $message;
		
	}
	public function modifProduit($idproduit, $description, $prix, $image, $idCategorie){
	
			$req=PdoGsbParam::$monPdo -> prepare ("UPDATE produit SET description=:description, prix=:prix, image=:image, idCategorie=:idCategorie WHERE id=:id ");
			$res=$req -> execute (array (		
			'id' => $idproduit,
			'description' => $description,
			'prix' => $prix,
			'image' => $image,
			'idCategorie' => $idCategorie
			));
			$res=$req->fetch();
			
			if($res=true){
			$message="Le produit a été modifié";
			return $message;
		}
		
		
	}
	public function creerProduit($idproduit, $description, $prix, $image, $idCategorie){
		$req=PdoGsbParam::$monPdo -> prepare ("SELECT id FROM produit WHERE id=:id");
		$res=$req -> execute (array (		
			'id' => $idproduit,
			));
			$res=$req->fetch();
			if($res==true){
					header('Location: index.php?uc=administrer&action=ajouterProduit&valider=Le produit existe déja');
			}else{
			$req=PdoGsbParam::$monPdo -> prepare ("INSERT INTO produit (id,description,prix,image,idCategorie) VALUES (:id,:description,:prix,:image,:idCategorie) ");
			$res2=$req -> execute (array (		
			'id' => $idproduit,
			'description' => $description,
			'prix' => $prix,
			'idCategorie' => $idCategorie,
			'image' => $image
			));
			$res2=$req->fetch();
			$message='Le produit a été ajouté';
			return $message;
			}
		
	}

	
}
?>