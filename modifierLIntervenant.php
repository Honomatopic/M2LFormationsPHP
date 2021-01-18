<?php
include_once ("_entete.inc.php");
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$lintervenant = consulterLIntervenantParLId($id);
	$nom = $lintervenant["nom"];
}
?>
<h2>Pour modifier un intervenant</h2>
<fieldset>
	<legend>Pour modifier un intervenant</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<input type="hidden" name="id" value=<?php echo $id; ?>> <input type="text" name="nom" value="<?php echo $nom; ?>"> <br>
		<input type="submit" name="modifierintervenant" value="&#128397;&#65039; Modifier"> &nbsp; <input type="submit" name="supprimerintervenant" onclick="return confirm('Etes-vous sûr de supprimer cet intervenant ?');" value="&#128465;&#65039; Supprimer">
	</form>
</fieldset>
<a href="consulterToutLesIntervenants.php">&#128269; Voir les intervenants</a>
<?php include_once("_piedpage.inc.php"); ?>