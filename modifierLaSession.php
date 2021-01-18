<?php
include_once("_entete.inc.php");
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$laSession = consulterLesSessionsParLId($id);
	$formation = $laSession["formation_id"];
	$duree = $laSession["duree_id"];
	$salle = $laSession["salle_id"];
	$intervenant = $laSession["intervenant_id"];
	$prestataire = $laSession["prestataire_id"];
}
?>
<h2>Pour modifier la session</h2>
<fieldset>
	<legend>Pour modifier la session</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<input type="hidden" name="id" value=<?php echo $id; ?>>
		<select name="formation">
			<?php $laFormationEditee = consulterLaFormationParLId($formation);
			echo "<option value=" . $laFormationEditee["id"] . ">" . $laFormationEditee["id"] . " - " . $laFormationEditee["intitule"] . "</option>";
			$lesFormations = consulterToutesLesFormations();
			foreach ($lesFormations as $laFormation) {
				echo "<option value=" . $laFormation["id"] . ">" . $laFormation["id"] . " - " . $laFormation["intitule"] . "</option>";
			}; ?>
		</select>
		<br>
		<select name="duree">
			<?php $laDureeEditee = consulterLaDureeParLId($duree);
			echo "<option value=" . $laDureeEditee["id"] . ">" . $laDureeEditee["id"] . " - Du " . date("d/m/Y", strtotime($laDureeEditee["datedebut"])) . " au " . date("d/m/Y", strtotime($laDureeEditee["datefin"])) . "</option>";
			$lesDurees = consulterToutesLesDurees();
			foreach ($lesDurees as $laDuree) {
				echo "<option value=" . $laDuree["id"] . ">Du " . date("d/m/Y", strtotime($laDuree["datedebut"])) . " au " . date("d/m/Y", strtotime($laDuree["datefin"])) . "</option>";
			}; ?>
		</select>
		<br>
		<select name="salle">
			<?php $laSalleEditee = consulterLaSalleParLId($salle);
			echo "<option value=" . $laSalleEditee["id"] . ">" . $laSalleEditee["id"] . " - " . $laSalleEditee["nom"] . "</option>";
			$lesSalles = consulterToutesLesSalles();
			foreach ($lesSalles as $jeanlaSalle) {
				echo "<option value=" . $jeanlaSalle["id"] . ">" . $jeanlaSalle["id"] . " - " . $jeanlaSalle["nom"] . "</option>";
			}; ?>
		</select>
		<br>
		<select name="intervenant">
			<?php $lIntervenantEdite = consulterLIntervenantParLId($intervenant);
			echo "<option value=" . $lIntervenantEdite["id"] . ">" . $lIntervenantEdite["id"] . " - " . $lIntervenantEdite["nom"] . "</option>";
			$lesIntervenants = consulterToutLesIntervenants();
			foreach ($lesIntervenants as $lIntervenant) {
				echo "<option value=" . $lIntervenant["id"] . ">" . $lIntervenant["id"] . " - " . $lIntervenant["nom"] . "</option>";
			}; ?>
		</select>
		<br>
		<select name="prestataire">
			<?php $lePrestataireEdite = consulterLePrestataireParLId($prestataire);
			echo "<option value=" . $lePrestataireEdite["id"] . ">" . $lePrestataireEdite["id"] . " - " . $lePrestataireEdite["nom"] . "</option>";
			$lesPrestataires = consulterToutLesPrestataires();
			foreach ($lesPrestataires as $lePrestataire) {
				echo "<option value=" . $lePrestataire["id"] . ">" . $lePrestataire["id"] . " - " . $lePrestataire["nom"] . "</option>";
			}; ?>
		</select> <br>
		<input type="submit" name="modifiersession" value="&#128397;&#65039; Modifier"> &nbsp; <input type="submit" name="supprimersession" onclick="return confirm('Etes-vous sûr de supprimer cette session de formation ?');" value="&#128465;&#65039; Supprimer">
	</form>
</fieldset>
<a href="consulterToutesLesSessions.php">&#128269; Voir les sessions</a>
<?php include_once("_piedpage.inc.php"); ?>