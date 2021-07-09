<?php
require_once ("_entete.inc.php");
if (isset($_GET["id"])) {
    $req = "SELECT * FROM intervenant WHERE id='".$_GET["id"]."'";
    $requete_exec = pg_query($cnx, $req);

?>
<h2>Pour modifier un intervenant</h2>
<fieldset>
	<legend>Pour modifier un intervenant</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
	<?php while($lIntervenant = pg_fetch_assoc($requete_exec)):?>
		<input type="hidden" name="id" value=<?php echo $_GET["id"]; ?>> <input type="text" name="nom" value="<?php echo $lIntervenant["nom"]; ?>"> <br>
		<input type="submit" name="modifierintervenant" value="&#128397;&#65039; Modifier"> &nbsp; <input type="submit" name="supprimerintervenant" onclick="return confirm('Etes-vous sûr de supprimer cet intervenant ?');" value="&#128465;&#65039; Supprimer">
	</form>
</fieldset>
<?php
    endwhile
    ;
    pg_close($cnx);
}
;
?>
<a href="consulterToutLesIntervenants.php">&#128269; Voir les intervenants</a>
<?php require_once("_piedpage.inc.php"); ?>