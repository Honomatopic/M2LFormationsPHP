<?php
require_once ("_entete.inc.php");
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$lintervenant = lirelIntervenantParlId($id);
	$nom = $lintervenant["nom"];
	$prenom = $lintervenant["prenom"];
}
?>
<h2>Pour éditer un intervenant</h2>
<fieldset>
	<legend>Pour éditer un intervenant</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<input type="hidden" name="id" value=<?php echo $id; ?>> <input type="text" name="nom" value="<?php echo $nom; ?>"> <br><input type="text" name="prenom" value="<?php echo $prenom; ?>"> <br>
		<input type="submit" name="editerintervenant" value="&#128397;&#65039; Editer"> &nbsp; <input type="submit" name="supprimer" onclick="return confirm('Etes-vous sûr de supprimer cet intervenant ?');" value="&#128465;&#65039; Supprimer">
	</form>
</fieldset>
<a href="liretouslesintervenants.php">&#128269; Voir les intervenants</a>
<?php require_once("_piedpage.inc.php"); ?>