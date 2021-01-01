<?php
include_once ("_entete.inc.php");
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$laSalle = lirelaSalleParlId($id);
	$nom = $laSalle["nom"];
}
?>
<h2>Pour éditer une salle</h2>
<fieldset>
	<legend>Pour éditer une salle</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<input type="hidden" name="id" value=<?php echo $id; ?>> <input type="text" name="nom" value="<?php echo $nom; ?>"> <br>
		<input type="submit" name="editersalle" value="&#128397;&#65039; Editer"> &nbsp; <input type="submit" name="supprimersalle" onclick="return confirm('Etes-vous sûr de supprimer cette salle ?');" value="&#128465;&#65039; Supprimer">
	</form>
</fieldset>
<a href="liretouteslessalles.php">&#128269; Voir les salles</a>
<?php include_once("_piedpage.inc.php"); ?>