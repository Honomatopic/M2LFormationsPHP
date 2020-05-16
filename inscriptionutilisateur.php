<?php
// Page d'inscription des utilisateurs
require_once ("_entete.inc.php");
?>
<section>
<h2>Pour vous inscrire</h2>
<fieldset>
<legend>Pour vous inscrire</legend>
<form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
<input type="text" name="nom" placeholder="Votre nom">
<br>
<input type="text" name="prenom" placeholder="Votre prenom">
<br>
<input type="email" name="email" placeholder="Votre email">
<br>
<input type="password" name="motpasse" placeholder="Votre mot de passe">
<br>
<select name="statut">
<option value="0">0</option>
<option value="1">1</option>
</select>
<br>
<input type="submit" name="inscrire" value="S'inscrire">
</form>
</fieldset>
</section>
<?php 
require_once ("_piedpage.inc.php");
?>