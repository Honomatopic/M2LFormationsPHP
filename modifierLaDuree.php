<?php
require_once ("_entete.inc.php");
$cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
if (isset($_GET["id"])) {
    $req = "SELECT * FROM duree WHERE id='" . $_GET["id"] . "'";
    $requete_exec = pg_query($cnx, $req);
    ?>
<h2>Pour modifier une durée</h2>
<fieldset>
	<legend>Pour modifier une durée</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
	<?php while ($laduree = pg_fetch_assoc($requete_exec)) : ?>
		<input type="hidden" name="id" value=<?php echo $_GET["id"]; ?>> <input
			type="date" name="datedebut"
			value="<?php echo $laduree["datedebut"]; ?>"> <br> <input type="date"
			name="datefin" value="<?php echo $laduree["datefin"]; ?>"> <br> <input
			type="submit" name="modifierduree" value="&#128397;&#65039; Modifier">
		&nbsp; <input type="submit" name="supprimerduree"
			onclick="return confirm('Etes-vous sûr de supprimer cette durée ?');"
			value="&#128465;&#65039; Supprimer">
	</form>
</fieldset>
<?php endwhile ;  };?>
<a href="consulterToutesLesDurees.php">&#128269; Voir les durées</a>
<?php pg_close($cnx) ; require_once ("_piedpage.inc.php"); ?>