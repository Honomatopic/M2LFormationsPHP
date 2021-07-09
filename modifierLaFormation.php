<?php
require_once ("_entete.inc.php");
if (isset($_GET["id"])) {
    $req = "SELECT * FROM formation WHERE id='" . $_GET["id"] . "'";
    $requete_exec = pg_query($cnx, $req);
    ?>
<h2>Pour éditer une formation</h2>
<fieldset>
	<legend>Pour éditer une formation</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
	<?php while ($laformation = pg_fetch_assoc($requete_exec)) : ?>
		<input type="hidden" name="id" value=<?php echo $_GET["id"]; ?>> <input
			type="text" name="intitule"
			value="<?php echo $laformation["intitule"]; ?>"> <br> <input
			type="submit" name="modifierformation"
			value="&#128397;&#65039; Modifier"> &nbsp; <input type="submit"
			name="supprimerformation"
			onclick="return confirm('Etes-vous sûr de supprimer cette formation ?');"
			value="&#128465;&#65039; Supprimer">
	</form>
</fieldset>
<?php
endwhile ;
    pg_close($cnx);
}
;
?>
<a href="liretouteslesformations.php">&#128269; Voir les formations</a>
<?php require_once("_piedpage.inc.php"); ?>