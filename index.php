<?php
// Page d'accueil de l'application M2L
require_once ("_entete.inc.php");
?>


<h1>Bienvenue sur la plateforme M2L</h1>

<fieldset>
	<legend>Pour vous connecter</legend>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<input type="email" name="email" placeholder="Votre email"> <br> <input
			type="password" name="motpasse" placeholder="Votre mot de passe"> <br>
		<input type="submit" name="connecter" value="&#128477; Se connecter">
	</form>
</fieldset>
<a href="inscriptionemploye.php">&#128395; Pour s'inscrire</a>
</section>
<?php
require_once ("_piedpage.inc.php");
?>