<?php
include_once("_entete.inc.php");
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$laformation = lireLaFormationParlId($_GET["id"]);
	$intitule = $laformation["intitule"];
}
?>
<h2>Pour éditer une formation</h2>
<fieldset>
	<legend>Pour éditer une formation</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<input type="hidden" name="id" value=<?php echo $id; ?>> <input type="text" name="intitule" value="<?php echo $intitule; ?>"> <br>
		<input type="submit" name="editerformation" value="&#128397;&#65039; Editer"> &nbsp; <input type="submit" name="supprimerformation" onclick="return confirm('Etes-vous sûr de supprimer cette formation ?');" value="&#128465;&#65039; Supprimer">
	</form>
</fieldset>
<a href="liretouteslesformations.php">&#128269; Voir les formations</a>
<?php include_once("_piedpage.inc.php"); ?>