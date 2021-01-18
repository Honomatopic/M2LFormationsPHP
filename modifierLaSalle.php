<?php
include_once ("_entete.inc.php");
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$laSalle = consulterLaSalleParLId($id);
	$nom = $laSalle["nom"];
}
?>
<h2>Pour modifier une salle</h2>
<fieldset>
	<legend>Pour modifier une salle</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<input type="hidden" name="id" value=<?php echo $id; ?>> <input type="text" name="nom" value="<?php echo $nom; ?>"> <br>
		<input type="submit" name="modifiersalle" value="&#128397;&#65039; Modifier"> &nbsp; <input type="submit" name="supprimersalle" onclick="return confirm('Etes-vous sûr de supprimer cette salle ?');" value="&#128465;&#65039; Supprimer">
	</form>
</fieldset>
<a href="consulterToutesLesSalles.php">&#128269; Voir les salles</a>
<?php include_once("_piedpage.inc.php"); ?>