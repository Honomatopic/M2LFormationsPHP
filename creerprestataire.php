<?php require_once ("_entete.inc.php"); ?>
<h2>Pour créer un prestataire</h2>
<fieldset>
	<legend>Pour créer un prestataire</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		 <input type="text" name="nom" placeholder="Le nom du prestataire"> <br>
		<input type="submit" name="creerprestataire" value="&#128395; Créer">
	</form>

</fieldset>
<br>
<a href="liretouslesprestataires.php">&#128269; Voir tous les prestataires
</a>
<?php require_once ("_piedpage.inc.php"); ?>