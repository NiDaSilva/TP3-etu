<?php
require_once('./Class/Connexion.class.php');
if(isset($_GET['IdFormation'])) {
	$json = array();
// on récupère l'Id de la région sélectionnée
	$idF = htmlentities(intval($_GET['IdFormation']));
// requête qui récupère les départements selon la région
	$requete = "SELECT IDspecialite, Libelle FROM specialite WHERE IDFormation= ".
	$idF.";" ;
// exécution de la requête
	$newConnexion = new Connexion();
	$idS = $newConnexion->IDconnexion;
	$resultat = $idS->query($requete);
	foreach($resultat as $donnees) {
		$valeur = $donnees->Libelle;
		$json[$donnees->IDspecialite] = utf8_encode($valeur);
	}
}
// envoi du résultat au success
echo json_encode($json);
?>