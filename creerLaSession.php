<?php
require_once ("_entete.inc.php");
$cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
?>
<h2>Pour créer une session de formation</h2>
<fieldset>
	<legend>Pour créer une session de formation</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<select name="formation">
			<option value="">--Choisissez votre formation--</option>
			<?php

$reqformations = "SELECT * FROM formation";
$requete_exec = pg_query($cnx, $reqformations);
while ($laFormation = pg_fetch_assoc($requete_exec)) {
    echo "<option value=" . $laFormation["id"] . ">" . $laFormation["id"] . " - " . $laFormation["intitule"] . "</option>";
}
?>
		</select> <br> <select name="duree">
			<option value="">--Choisissez votre durée--</option>
			<?php

$reqdurees = "SELECT * FROM duree";
$requete_exec = pg_query($cnx, $reqdurees);
while ($laDuree = pg_fetch_assoc($requete_exec)) {
    echo "<option value=" . $laDuree["id"] . ">" . $laDuree["id"] . " - " . $laDuree["datedebut"] . " au " . $laDuree["datefin"] . "</option>";
}
;
?>
		</select> <br> <select name="salle">
			<option value="">--Choisissez votre salle--</option>
			<?php

$reqsalles = "SELECT * FROM salle";
$requete_exec = pg_query($cnx, $reqsalles);
while ($laSalle = pg_fetch_assoc($requete_exec)) {
    echo "<option value=" . $laSalle["id"] . ">" . $laSalle["id"] . " - " . $laSalle["nom"] . "</option>";
}
;
?>
		</select> <br> <select name="intervenant">
			<option value="">--Choisissez l'intervenant--</option>
			<?php

$reqintervenants = "SELECT * FROM intervenant";
$requete_exec = pg_query($cnx, $reqintervenants);
while ($lIntervenant = pg_fetch_assoc($requete_exec)) {
    echo "<option value=" . $lIntervenant["id"] . ">" . $lIntervenant["id"] . " - " . $lIntervenant["nom"] . "</option>";
}
;
?>
		</select> <br> <select name="prestataire">
			<option value="">--Choisissez le prestataire--</option>
			<?php
			$reqprestataires = "SELECT * FROM prestataire";
			$requete_exec = pg_query($cnx, $reqprestataires);
			while ($lePrestataire = pg_fetch_assoc($requete_exec)) {
			    echo "<option value=" . $lePrestataire["id"] . ">" . $lePrestataire["id"] . " - " . $lePrestataire["nom"] . "</option>";
			}
			;
?>
		</select> <br> <input type="submit" name="creersession"
			value="&#128395; Créer">
	</form>

</fieldset>
<br>
<a href="consulterLesSessions.php">&#128269; Voir toutes les sessions </a>
<?php require_once ("_piedpage.inc.php"); ?>