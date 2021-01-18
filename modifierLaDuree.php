<?php
include_once ("_entete.inc.php");
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$laduree = consulterLaDureeParLId($id);
	$datedebut = $laduree["datedebut"];
	$datefin = $laduree["datefin"];
}
?>
<h2>Pour modifier une durée</h2>
<fieldset>
	<legend>Pour modifier une durée</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<input type="hidden" name="id" value=<?php echo $id; ?>> <input type="date" name="datedebut" value="<?php echo $datedebut; ?>"> <br><input type="date" name="datefin" value="<?php echo $datefin; ?>"> <br>
		<input type="submit" name="modifierduree" value="&#128397;&#65039; Modifier"> &nbsp; <input type="submit" name="supprimerduree" onclick="return confirm('Etes-vous sûr de supprimer cette durée ?');" value="&#128465;&#65039; Supprimer">
	</form>
</fieldset>
<a href="consulterToutesLesDurees.php">&#128269; Voir les durées</a>
<?php include_once ("_piedpage.inc.php"); ?>