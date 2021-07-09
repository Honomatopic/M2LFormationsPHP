<?php
require_once ("_entete.inc.php");
if (isset($_GET["id"])) {
    $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
    $req = "SELECT * FROM salle WHERE id='".$_GET["id"]."'";
    $requete_exec = pg_query($cnx, $req);
    ?>
<h2>Pour modifier une salle</h2>
<fieldset>
	<legend>Pour modifier une salle</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
	<?php while($laSalle = pg_fetch_assoc($requete_exec)):?>
		<input type="hidden" name="id" value=<?php echo $_GET["id"]; ?>> <input type="text" name="nom" value="<?php echo $laSalle["nom"]; ?>"> <br>
		<input type="submit" name="modifiersalle" value="&#128397;&#65039; Modifier"> &nbsp; <input type="submit" name="supprimersalle" onclick="return confirm('Etes-vous sûr de supprimer cette salle ?');" value="&#128465;&#65039; Supprimer">
	</form>
</fieldset>
<?php
endwhile ;
    pg_close($cnx);
}
;
?>
<a href="consulterToutesLesSalles.php">&#128269; Voir les salles</a>
<?php require_once("_piedpage.inc.php"); ?>