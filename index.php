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
$CollFormation = $IDconnexion->query("SELECT * FROM formation");
// suite du code permettant de créer le form

$pageInitiale = new page_base("Formulaire");


	$pageInitiale->corps .= ' bd connectée </br>
			<form method="post" action="recap.php" name="formulaire" onsubmit="return valider ();">
<fieldset>
	<legend>Inscription</legend>
	<div>
		<label for="email">Votre  Email</label>
			<input type="text" id="email" name="email" onblur ="verifMail(this)"/>
	</div>
	<div>
		<label for="motpasse">Votre  mot de passe</label>
		<input type="password" id="motpasse" name="motpasse" onblur ="verifMDP(this)" />
	</div>
</fieldset>
<fieldset id="informations_complementaires">
	<legend>Informations complémentaires</legend>
	<div class="afficher"><a href="#informations_complementaires">Informations complémentaires</a></div>
	<div class="masquer"><a href="#">Fermer</a></div>
	<div>
		<label for="nom">Nom</label>
		<input type="text" id="nom" name="nom" onblur ="verifChaine(this)" />
	</div>
	<div>
		<label for="prenom">Prénom</label>
		<input type="text" id="prenom" name="prenom" onblur ="verifChaine(this)" />
	</div>
	<div>
		<label for="dept">Département</label>
		<input type="number" id="age" name="age" min="1" max="101"/>
	</div>	
	<div>
		<label for="pays">Pays</label>
		<select name="pays" size="1">
		<option value = "France"> France</option>
		<option value = "Angleterre"> Angleterre</option>
		<option value = "Allemagne"> Allemagne</option>
		<option value = "Espagne"> Espagne</option>
		<option value = "AutreEurope"> Autre pays européen</option>
		<option value = "Autre"> Autre pays monde</option>
		</select>
	</div>
	<div>
		<label for="dateN">Né(e) le : </label>
		<input type="text" id="datepicker"/>
	</div>	
	<div>
		<input type="radio" id="sexeH" name="sexe" value="femme"/>Femme
		<input type="radio" id="sexeF" name="sexe" value="homme"/>Homme
	</div>	
	<div>
		<label for="tel">Téléphone</label>
		<!--<input type="tel" id="tel" name="tel" pattern="^0[0-9]{9}"/>-->
		<input type="text" id="tel" name="tel" onblur="verifTel(this)"/>
	</div>
	<div>
		<label for="competences">Compétences informatiques</label>
	</div>
	<div>
		HTML5<input type="checkbox" id="competent[]" name="competent[]" value="HTML5"/>
		CSS3<input type="checkbox" id="competent[]" name="competent[]" value="CSS3"/>
		PHP<input type="checkbox" id="competent[]" name="competent[]" value="PHP"/>
		JavaScript<input type="checkbox" id="competent[]" name="competent[]" value="Javascript"/>
	</div>
	<div><label for="maFor">Formation</label>
		<select id="maFor" name="maFor" >';
		foreach($CollFormation as $uneF)
	{
		$pageInitiale->corps .='
		<option value='.$uneF->IdFormation.'>'.$uneF->Intitule.''.'</option>';
	}
		$pageInitiale->corps .='</select></div>';
		$CollFormation -> closeCursor(); 
		$CollFormation = null ; // pour une autre exécution avec cette variable
		$pageInitiale->corps.='
	<div><label for="maSpe">Spécialité</label>
		<select id="maSpe" name="maSpe" >
		<option value=" ">-- les spécialités --</option>
		</select>
</fieldset>
<input type="submit" value="Je m\'inscris" name="inscription" id="inscription" />
<input type="reset" value="Effacer" name="effacer" id="effacer" />
</form>';
	

		
}
	$pageInitiale->afficher();
