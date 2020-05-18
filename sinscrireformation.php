<?php
require_once ("_entete.inc.php");
if (! isset($_SESSION["email"])) {
    header("location:index.php");
}

?>
<header>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post"><?php
echo "Bienvenue <a href=\"editerprofil?id=" . $_SESSION["id"] . "\">" . $_SESSION["prenom"] . "</a>";
echo "<br>";
echo "<a href=\"espaceemploye.php\">&#128281; Revenir à l'espace employé</a>";
?> 

<input type="submit" name="deconnecter"
			onclick="return confirm('Etes-vous sûr de vous déconnecter ?');"
			value="&#128272; Se déconnecter">
	</form>
</header>

<h2>Pour s'inscrire à une formation c'est ici</h2>
<table>
	<thead>
		<tr>
			<td>Identifiant</td>
			<td>Nom de la formation</td>
			<td>Date de début</td>
			<td>Date de fin</td>
			<td>Lieu</td>
			<td>Prestataire</td>
			<td>S'inscrire</td>
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
$lesFormations = selectionnerTouteslesFormationsOuJeNeSuisPasInscris($idinscris);
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
    echo "<td><a href=\"afficherformation.php?id=" . $laFormation["id"] . "\">&#128395; S'inscrire à cette formation</a></td>";
    echo "<td><a href=\"editerformation.php?id=" . $laFormation["id"] . "\">&#x270F;&#xFE0F; Editer la formation</a></td>";
    echo "<td><a href=\"editerformation.php?id=" . $laFormation["id"] . "\">&#x1F5D1;&#xFE0F; Supprimer la formation</a></td>";
    echo "<td><input type=\"hidden\" name=\"idsession\" value=" . $idinscris . "></td>";
    echo "</tr>";
}
echo "</form>";

if ($_SESSION["statut"] == "1") {
    echo "<a href=\"creerformation.php\">&#128271; Pour créer une formation</a>";
    echo "<br>";
}
?>
</tbody>
</table>
<br>

<?php
require_once ("_piedpage.inc.php");
?>