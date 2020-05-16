<?php
require_once ("_entete.inc.php");

/*$_SESSION["nom"] = (isset($_SESSION["nom"])) ? $_SESSION["nom"] : "";
$_SESSION["prenom"] = (isset($_SESSION["prenom"])) ? $_SESSION["nom"] : "";
$_SESSION["email"] = (isset($_SESSION["email"])) ? $_SESSION["email"] : "";
$_SESSION["motpasse"] = (isset($_SESSION["motpasse"])) ? $_SESSION["motpasse"] : "";
$_SESSION["statut"] = (isset($_SESSION["statut"])) ? $_SESSION["statut"] : "";*/
?>
<header><form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post"><?php 
echo "Bienvenue <a href=\"editerprofil?id=".$_SESSION["id"]."\">". $_SESSION["prenom"]."</a>";
?> 

<input type="submit" name="deconnecter" onclick="return confirm('Etes-vous sûr de vous déconnecter ?');" value="Se déconnecter"></form></header>

<section>
<?php 
echo "<h2> Bienvenue. Voici  </h2>";
?>
</section>

<?php 
require_once ("_piedpage.inc.php");
?>