<?php require_once ("_entete.inc.php"); 
if(isset($_POST)) {
	var_dump($_POST);
}

?>
<h2>Pour créer une durée</h2>
<fieldset>
	<legend>Pour créer une durée</legend>

	<form action="" method="post">
		 <input type="date" name="datedebut" placeholder="La date de début"> <br>
		 <input type="date" name="datefin" placeholder="La date de fin"> <br>
		<input type="submit" name="creerduree" value="&#128395; Créer">
	</form>

</fieldset>
<br>
<a href="liretouteslesdurees.php">&#128269; Voir toutes les durées</a>
<?php require_once ("_piedpage.inc.php"); ?>