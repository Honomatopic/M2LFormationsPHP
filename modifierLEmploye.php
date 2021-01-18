<?php
include_once("_entete.inc.php");
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$lemploye = consulterLEmployeParLId($id);
	$nom = $lemploye["nom"];
	$prenom = $lemploye["prenom"];
	$email = $lemploye["email"];
	$motpasse = $lemploye["motpasse"];
	$statut = $lemploye["statut"];
}
?>
<h2>Pour modifier un employé</h2>
<fieldset>
	<legend>Pour modifier un employé</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<input type="hidden" name="id" value=<?php echo $id; ?>> <input type="text" name="nom" value=<?php echo $nom?>> <br> 
		<input type="text" name="prenom" value=<?php echo $prenom?>> <br> 
		<input type="email" name="email" value=<?php echo $email?>> <br> 
		<input type="password" name="motpasse" value=<?php echo $motpasse?>> <br>
		<select name="statut">
			<option><?php echo $statut;?></option>
			<option>--Sélectionner son statut--</option>
			<option>0</option>
			<option>1</option> 
		</select><br>
		<input type="submit" name="modifieremploye" value="&#128397;&#65039; Modifier"> &nbsp; <input type="submit" name="supprimeremploye" onclick="return confirm('Etes-vous sûr de supprimer cet employé ?');" value="&#128465;&#65039; Supprimer">
	</form>
</fieldset>
<a href="consulterToutLesEmployes.php">&#128269; Voir les employés</a>
<?php include_once("_piedpage.inc.php"); ?>