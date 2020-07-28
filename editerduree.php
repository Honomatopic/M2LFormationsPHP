<?php
require_once ("_entete.inc.php");
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$laduree = lireLaDureeParlId($id);
	$datedebut = $laduree["datedebut"];
	$datefin = $laduree["datefin"];
}
?>
<h2>Pour éditer une durée</h2>
<fieldset>
	<legend>Pour éditer une durée</legend>

	<form action="" method="post">
		<input type="hidden" name="id" value=<?php echo $id; ?>> <input type="date" name="datedebut" value="<?php echo $datedebut; ?>"> <br><input type="date" name="datefin" value="<?php echo $datefin; ?>"> <br>
		<input type="submit" name="editer" value="&#128397;&#65039; Editer"> &nbsp; <input type="submit" name="supprimer" onclick="return confirm('Etes-vous sûr de supprimer cette durée ?');" value="&#128465;&#65039; Supprimer">
	</form>
</fieldset>
<a href="liretouteslesdurees.php">&#128269; Voir les durées</a>
<?php require_once("_piedpage.inc.php"); ?>