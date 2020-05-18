<?php
require_once ("_entete.inc.php");
if (! isset($_SESSION["email"])) {
    header("location:index.php");
}
/*
 * $_SESSION["nom"] = (isset($_SESSION["nom"])) ? $_SESSION["nom"] : "";
 * $_SESSION["prenom"] = (isset($_SESSION["prenom"])) ? $_SESSION["nom"] : "";
 * $_SESSION["email"] = (isset($_SESSION["email"])) ? $_SESSION["email"] : "";
 * $_SESSION["motpasse"] = (isset($_SESSION["motpasse"])) ? $_SESSION["motpasse"] : "";
 * $_SESSION["statut"] = (isset($_SESSION["statut"])) ? $_SESSION["statut"] : "";
 */
?>
<header>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post"><?php
echo "Bienvenue <a href=\"editerprofil?id=" . $_SESSION["id"] . "\">" . $_SESSION["prenom"] . "</a>";
?> 

<input type="submit" name="deconnecter"
			onclick="return confirm('Etes-vous sûr de vous déconnecter ?');"
			value="&#128272; Se déconnecter">
	</form>
</header>

<h2>Bienvenue. Voici l'ensemble des formations où vous êtes inscris</h2>
<table>
	<thead>
		<tr>
			<td>Identifiant</td>
			<td>Nom de la formation</td>
			<td>Date de début</td>
			<td>Date de fin</td>
			<td>Lieu</td>
			<td>Prestataire</td>
			<td>Se désinscrire</td>
<?php
if ($_SESSION["statut"] == 1) {
    echo "<td>Editer</td>";
    echo "<td>Supprimer</td>";
}
?>
</tr>
	</thead>
	<tbody>
<?php
$idinscris = $_SESSION["id"];
$lesFormations = selectionnerTouteslesFormationsOuJeSuisInscris($idinscris);
echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
foreach ($lesFormations as $laFormation) {

    $idformation = $laFormation["id"];
    $intitule = $laFormation["intitule"];
    $datedebut = $laFormation["datedebut"];
    $datefin = $laFormation["datefin"];
    $lieu = $laFormation["lieu"];
    $prestataire = $laFormation["prestataire"];
    echo "<tr>";
    echo "<td><input type=\"hidden\" name=\"idformation\" value=\"" . $idformation . "\">" . $idformation . "</td>";
    echo "<td><input type=\"hidden\" name=\"intitule\" value=\"" . $intitule . "\">" . $intitule . "</td>";
    echo "<td><input type=\"hidden\" name=\"datedebut\" value=\"" . $datedebut . "\">" . $datedebut . "</td>";
    echo "<td><input type=\"hidden\" name=\"datefin\" value=\"" . $datefin . "\">" . $datefin . "</td>";
    echo "<td><input type=\"hidden\" name=\"lieu\" value=\"" . $lieu . "\">" . $lieu . "</td>";
    echo "<td><input type=\"hidden\" name=\"prestataire\" value=\"" . $prestataire . "\">" . $prestataire . "</td>";
    echo "<td><a href=\"afficherformation.php?id=" . $laFormation["id"] . "\">Se désinscrire de cette formation</a></td>";
    echo "<td><a href=\"editerformation.php?id=" . $laFormation["id"] . "\">Editer la formation</a></td>";
    echo "<td><a href=\"editerformation.php?id=" . $laFormation["id"] . "\">Supprimer la formation</a></td>";
    echo "<td><input type=\"hidden\" name=\"idsession\" value=" . $idinscris . "></td>";
    echo "</tr>";
}
echo "</form>";

if ($_SESSION["statut"] == "1") {
    echo "<a href=\"creerformation.php\">&#128271; Pour créer une formation</a>";
    echo "<br>";
}
;
?>
</tbody>
</table>
<br>
<a href="sinscrireformation.php">&#128395;&#65039; Pour m'inscrire à une formation</a>

<?php
require_once ("_piedpage.inc.php");
?>
<?php
require_once ("_piedpage.inc.php");
?>