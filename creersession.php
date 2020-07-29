<?php require_once ("_entete.inc.php"); ?>
<h2>Pour créer une session de formation</h2>
<fieldset>
	<legend>Pour créer une session de formation</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<select name="formation">
			<option value="">--Choisissez votre formation--</option>
			<?php $lesFormations = lireTouteslesFormations();
			foreach ($lesFormations as $laFormation) {
				echo "<option value=".$laFormation["id"].">". $laFormation["id"]. " - ". $laFormation["intitule"]."</option>";
			}; ?>
		</select>
		<br>
		<select name="duree">
			<option value="">--Choisissez votre durée--</option>
			<?php $lesDurees = lireTouteslesDurees();
			foreach ($lesDurees as $laDuree) {
				echo "<option value=".$laDuree["id"].">Du " .date("d/m/Y", strtotime($laDuree["datedebut"])). " au " .date("d/m/Y", strtotime($laDuree["datefin"])) ."</option>";
			}; ?>
		</select>
		<br>
		<select name="salle">
			<option value="">--Choisissez votre salle--</option>
			<?php $lesSalles = lireTouteslesSalles();
			foreach ($lesSalles as $jeanlaSalle) {
				echo "<option value=".$jeanlaSalle["id"].">". $jeanlaSalle["id"]. " - " .$jeanlaSalle["nom"] ."</option>";
			}; ?>
		</select>
		<br>
		<select name="intervenant">
			<option value="">--Choisissez l'intervenant--</option>
			<?php $lesIntervenants = lireTouslesIntervenants();
			foreach ($lesIntervenants as $lIntervenant) {
				echo "<option value=".$lIntervenant["id"].">". $lIntervenant["id"]. " - " .$lIntervenant["prenom"]. " ".$lIntervenant["nom"]."</option>";
			}; ?>
		</select>
		<br>
		<select name="prestataire">
			<option value="">--Choisissez le prestataire--</option>
			<?php $lesPrestataires = lireTouslesPrestataires();
			foreach ($lesPrestataires as $lePrestataire) {
				echo "<option value=".$lePrestataire["id"].">". $lePrestataire["id"]. " - " .$lePrestataire["nom"]."</option>";
			}; ?>
		</select>
		<br>
		<input type="submit" name="creersession" value="&#128395; Créer">
	</form>

</fieldset>
<br>
<a href="liretouteslessessions.php">&#128269; Voir toutes les sessions
</a>
<?php require_once ("_piedpage.inc.php"); ?>