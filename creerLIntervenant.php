<?php
require_once ("_entete.inc.php");
?>
<h2>Pour créer un intervenant</h2>
<fieldset>
	<legend>Pour créer un intervenant</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<input type="text" name="nom" placeholder="Le nom de l'intervenant"> <br>
		<input type="submit" name="creerintervenant" value="&#128395; Créer">
	</form>

</fieldset>
<br>
<a href="consulterToutLesIntervenants.php">&#128269; Voir toutes les
	intervenants</a>
<?php require_once ("_piedpage.inc.php"); ?>