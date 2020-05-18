<?php require_once ("_entete.inc.php");?>
<header>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post"><?php
echo "Bienvenue <a href=\"editerprofil?id=" . $_SESSION["id"] . "\">" . $_SESSION["prenom"] . "</a>";
echo "<br>";
echo "<a href=\"espaceemploye.php\">&#128281; Revenir à l'espace employé</a>";
echo "<br>";
echo "<a href=\"sinscrireformation.php\">&#128281; Revenir aux formations disponibles</a>";
?>
<input type="submit" name="deconnecter"
			onclick="return confirm('Etes-vous sûr de vous déconnecter ?');"
			value="&#128272; Se déconnecter">
	</form>
</header>
<h2>Pour créer une formation</h2>
		<fieldset>
			<legend>Pour créer une formation</legend>

			<form action="" method="post">
				<input type="text" name="intitule" placeholder="L'intitulé"> <br> Du
				<input type="date" name="datedebut"
					value=<?php echo date("dd/MM/Y")?> min="2000-01-01"
					max="2021-12-31"> au <input type="date" name="datefin"
					value=<?php echo date("dd/MM/Y")?> min="2000-01-01"
					max="2021-12-31"> <br> <input type="text" name="lieu"
					placeholder="Le lieu"> <br> <select name="prestataire"
					placeholder="Le prestataire">
					<option value="AFPA">AFPA</option>
					<option value="inconnu">Inconnu</option>
					<option value="CNAM">CNAM</option>
					<option value="GRETA">GRETA</option>
					<option value="Privé">Privé</option>
				</select> <br> <input type="submit" name="creer" value="&#128271; Créer">
			</form>

		</fieldset>
<?php require_once ("_piedpage.inc.php");?>