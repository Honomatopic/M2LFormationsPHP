<?php
require_once ("_entete.inc.php");
if (isset($_GET["id"])) {
    $req = "SELECT * FROM employe WHERE id='" . $_GET["id"] . "'";
    $requete_exec = pg_query($cnx, $req);
    ?>
<h2>Pour modifier un employé</h2>
<fieldset>
	<legend>Pour modifier un employé</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
	<?php while($lemploye = pg_fetch_assoc($requete_exec)) :?>
		<input type="hidden" name="id" value=<?php echo $_GET["id"]; ?>> <input
			type="text" name="nom" value=<?php echo $lemploye["nom"]?>> <br> <input
			type="text" name="prenom" value=<?php echo $lemploye["prenom"]?>> <br>
		<input type="email" name="email" value=<?php echo $lemploye["email"]?>>
		<br> <input type="password" name="motpasse"
			value=<?php echo $lemploye["motpasse"]?>> <br> <select name="statut">
			<option><?php echo $lemploye["statut"];?></option>
			<option>--Sélectionner son statut--</option>
			<option>0</option>
			<option>1</option>
		</select><br> <input type="submit" name="modifieremploye"
			value="&#128397;&#65039; Modifier"> &nbsp; <input type="submit"
			name="supprimeremploye"
			onclick="return confirm('Etes-vous sûr de supprimer cet employé ?');"
			value="&#128465;&#65039; Supprimer">
	</form>
</fieldset>
<?php
    endwhile
    ;
    pg_close($cnx);
}
;
?>
<a href="consulterToutLesEmployes.php">&#128269; Voir les employés</a>
<?php  require_once("_piedpage.inc.php"); ?>