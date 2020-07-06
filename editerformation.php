<?php
require_once("_entete.inc.php");
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$laformation = lireLaFormationParlId($_GET["id"]);
	$intitule = $laformation["intitule"];
	$datedebut = $laformation["datedebut"];
	$datefin = $laformation["datefin"];
	$lieu = $laformation["lieu"];
	$prestataire = $laformation["prestataire"];
}
?>
<header>
	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"><?php
																		echo "Bienvenue <a href=\"editerprofil?id=" . $_SESSION["id"] . "\">" . $_SESSION["prenom"] . "</a>";
																		echo "<br>";
																		echo "<a href=\"espaceadherent.php\">Revenir à l'espace adhérent</a>";
																		?>
		<input type="submit" name="deconnecter" onclick="return confirm('Etes-vous sûr de vous déconnecter ?');" value="&#128272; Se déconnecter">
	</form>
</header>
<h2>Pour éditer une formation</h2>
<fieldset>
	<legend>Pour éditer une formation</legend>

	<form action="" method="post">
		<input type="hidden" name="id" value=<?php echo $id; ?>> <input type="text" name="intitule" value="<?php echo $intitule; ?>"> <br>
		Du <input type="date" name="datedebut" min="2000-01-01" max="2021-12-31" value=<?php echo $datedebut; ?>> au <input type="date" name="datefin" min="2000-01-01" max="2021-12-31" value=<?php echo $datefin; ?>> <br> <input type="text" name="lieu" value="<?php echo $lieu; ?>"> <br> <select name="prestataire" value="<?php echo $prestataire; ?>">
			<option value="AFPA">AFPA</option>
			<option value="inconnu">Inconnu</option>
			<option value="CNAM">CNAM</option>
			<option value="GRETA">GRETA</option>
			<option value="Privé">Privé</option>
		</select> <br> <input type="submit" name="editerformation" value="&#128397;&#65039; Editer"> <br> <input type="submit" name="supprimerformation" onclick="return confirm('Etes-vous sûr de supprimer cette formation ?');" value="&#128465;&#65039; Supprimer">
	</form>
	<br>
	<a href="sinscrireformation.php">&#128269; Voir les formations</a>
</fieldset>

<?php require_once("_piedpage.inc.php"); ?>