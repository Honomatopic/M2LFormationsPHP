<?php 
// Page d'accueil de l'application M2L
require_once ("_entete.inc.php");
?>
<section>
<img src="images/m2l.png">
<h1>Bienvenue sur la plateforme M2L</h1>

<fieldset>
<legend>Pour vous connecter</legend>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<input type="email" name="email" placeholder="Votre email">
<br>
<input type="password" name="motpasse" placeholder="Votre mot de passe">
<br>
<input type="submit" name="connecter" value="Se connecter">
</form>
</fieldset>
<a href="inscriptionutilisateur.php">Pour s'inscrire</a>
</section>
<?php 
require_once ("_piedpage.inc.php");
?>