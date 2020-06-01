<?php
// Page d'édition du profil
require_once ("_entete.inc.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $lemploye = lireUnEmployeParlId($_GET["id"]);
    $nom = $lemploye["nom"];
    $prenom = $lemploye["prenom"];
    $email = $lemploye["email"];
    $motpasse = $lemploye["motpasse"];
    $statut = $lemploye["statut"];
}
?>

	<h2>Pour éditer votre profil</h2>
	<fieldset>
		<legend>Pour éditer votre profil</legend>
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<input type="hidden" name="id" value=<?php echo $id; ?>> <br>
			<input type="text" name="nom" value="<?php echo $nom; ?>"> <br> <input
				type="text" name="prenom" value="<?php echo $prenom; ?>"> <br> <input
				type="email" name="email" value="<?php echo $email; ?>"> <br> <input
				type="password" name="motpasse" value="<?php echo $motpasse; ?>"> <br>
			<select name="statut">
				<option value="<?php echo $statut; ?>"><?php echo $statut; ?></option>
				<option value="0">0</option>
				<option value="1">1</option>
			</select> <br> <input type="submit" name="editer" value="&#128397;&#65039; Editer"> <input
				type="submit" name="supprimer"
				onclick="return confirm('Etes-vous sûr de supprimer votre profil ?');"
				value="&#128465;&#65039; Supprimer">
		</form>
	</fieldset>
<a href="espaceemploye.php">Revenir à l'espace employé</a>
<?php
require_once ("_piedpage.inc.php");
?>