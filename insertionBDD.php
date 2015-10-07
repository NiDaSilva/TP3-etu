<?php
	include_once('class/autoload.php');

$ConnexionBaseSIO = new Connexion();
$IDconnexion = $ConnexionBaseSIO->IDconnexion;

if (!$IDconnexion){
$pageInitiale->corps = "problème d'accès à la base de données
</article></section>";
}
else
{
$CollFormation = $IDconnexion->query("INSERT INTO etudiant (nom, prenom, departement, pays, date_naiss)
    VALUES ('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['departement']."','".$_POST['pays']."','".$_POST['date_naiss']."'");
?>