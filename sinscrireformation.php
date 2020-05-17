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

<h2>Pour s'inscrire à une formation c'est ici </h2>
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
<td>
Inscription
</td>
<td>
Désinscription
</td>
<?php 
if ($_SESSION["statut"]==1) {
    echo "<td>Editer</td>";
    echo "<td>Supprimer</td>";
}
?>
</tr>
</thead>
<tbody>

<?php 
$lesFormations = selectionnerTouteslesFormations();

echo "<form action=\"".$_SERVER['PHP_SELF']." \"method=\"post\">";
foreach ($lesFormations as $laFormation) {
echo "<tr>";
echo "<td><input type=\"hidden\" name=\"idformation\" value=".$laFormation["id"].">".$laFormation["id"]."</td>";
echo $html = "<td><input type=\"hidden\" name=\"intitule\" value=\"".$laFormation["intitule"]."\">".$laFormation["intitule"]."</td>";
var_dump($html);
echo "<td><input type=\"hidden\" name=\"datedebut\" value=\"".$laFormation["datedebut"]."\">".$laFormation["datedebut"]."</td>";
echo "<td><input type=\"hidden\" name=\"datefin\" value=\"".$laFormation["datefin"]."\">".$laFormation["datefin"]."</td>";
echo "<td><input type=\"hidden\" name=\"lieu\" value=\"".$laFormation["lieu"]."\">".$laFormation["lieu"]."</td>";
echo "<td><input type=\"hidden\" name=\"prestataire\" value=\"".$laFormation["prestataire"]."\">".$laFormation["prestataire"]."</td>";
echo "<td><input type=\"submit\" name=\"inscrireformation\" value=\"S'inscrire\"></td>";
echo "<td><input type=\"submit\" name=\"desinscrireformation\" value=\"Se désinscrire\"></td>";
echo "<td><a href=\"editerformation.php?id=".$laFormation["id"]."\">Editer la formation</a></td>";
echo "<td><a href=\"editerformation.php?id=".$laFormation["id"]."\">Supprimer la formation</a></td>";
echo "<td><input type=\"hidden\" name=\"idsession\" value=".$_SESSION["id"]."></td>";
echo "</tr>";
}
echo "</form>";

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