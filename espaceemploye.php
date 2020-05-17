<?php
require_once ("_entete.inc.php");
if (!isset($_SESSION["email"])){
    header("location:index.php");
}
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

<h2> Bienvenue. Voici l'ensemble des formations où vous êtes inscris  </h2>
<table>
<thead>
<tr>
<td>
Identifiant
</td>
<td>
Nom de la formation
</td>
<td>
Date de début
</td>
<td>
Date de fin
</td>
<td>
Lieu
</td>
<td>
Prestataire
</td>
</tr>
</thead>
<tbody>

<?php 
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "</tr>";
if ($_SESSION["statut"]=="1") {
    echo "<a href=\"creerformation.php\">Pour créer une formation</a>";
    echo "<br>";
}
?>
</tbody>
</table>
<br>
<a href="sinscrireformation.php">Pour m'inscrire à une formation</a>

<?php 
require_once ("_piedpage.inc.php");
?>