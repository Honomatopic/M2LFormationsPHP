<?php
include_once ("_entete.inc.php");
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$lePrestataire = lirelePrestataireParlId($id);
	$nom = $lePrestataire["nom"];
}
?>
<h2>Pour éditer un prestataire</h2>
<fieldset>
	<legend>Pour éditer un prestataire</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<input type="hidden" name="id" value=<?php echo $id; ?>> <input type="text" name="nom" value="<?php echo $nom; ?>"> <br>
		<input type="submit" name="editerprestataire" value="&#128397;&#65039; Editer"> &nbsp; <input type="submit" name="supprimerprestataire" onclick="return confirm('Etes-vous sûr de supprimer ce prestataire ?');" value="&#128465;&#65039; Supprimer">
	</form>
</fieldset>
<a href="liretouslesprestataires.php">&#128269; Voir les prestataires</a>
<?php include_once("_piedpage.inc.php"); ?>