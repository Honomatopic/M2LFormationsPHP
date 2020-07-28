<?php require_once ("_entete.inc.php"); ?>
<h2>Pour créer une formation</h2>
<fieldset>
	<legend>Pour créer une formation</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<input type="text" name="intitule" placeholder="L'intitulé"> <br> 
		<input type="submit" name="creerformation" value="&#128395; Créer">
	</form>

</fieldset>
<br>
<a href="liretouteslesformations.php">&#128269; Voir toutes les formations</a>
<?php require_once ("_piedpage.inc.php"); ?>