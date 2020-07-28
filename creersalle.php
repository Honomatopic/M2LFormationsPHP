<?php require_once ("_entete.inc.php"); ?>
<h2>Pour créer une salle</h2>
<fieldset>
	<legend>Pour créer une salle</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		 <input type="text" name="nom" placeholder="Le nom de la salle"> <br>
		<input type="submit" name="creersalle" value="&#128395; Créer">
	</form>

</fieldset>
<br>
<a href="liretouteslessalles.php">&#128269; Voir toutes les salles
</a>
<?php require_once ("_piedpage.inc.php"); ?>