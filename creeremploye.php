<?php include_once ("_entete.inc.php"); ?>
<h2>Pour créer une employé</h2>
<fieldset>
	<legend>Pour créer un employé</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<input type="text" name="nom" placeholder="Le nom de l'employé"> <br> 
		<input type="text" name="prenom" placeholder="Le prénom de l'employé"> <br> 
		<input type="email" name="email" placeholder="L'adresse email de l'employé"> <br> 
		<input type="password" name="motpasse" placeholder="Le mot de passe de l'employé"> <br>
		<select name="statut">
			<option>--Sélectionner son statut--</option>
			<option>0</option>
			<option>1</option> 
		</select></br>
		<input type="submit" name="creeremploye" value="&#128395; Créer">
	</form>

</fieldset>
<br>
<a href="liretouslesemployes.php">&#128269; Voir toutes les employés</a>
<?php include_once ("_piedpage.inc.php"); ?>