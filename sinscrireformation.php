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
echo "<a href=\"espaceadherent.php\">&#128281; Revenir à l'espace employé</a>";
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
            <td>Lire</td>

</tr>
	</thead>
	<tbody>

<?php
$lesFormations = lireTouteslesFormations();
echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
foreach ($lesFormations as $laFormation) {

    $idformation = $laFormation["id"];
    $intitule = $laFormation["intitule"];
    $datedebut = $laFormation["datedebut"];
    $datefin = $laFormation["datefin"];
    $lieu = $laFormation["lieu"];
    $prestataire = $laFormation["prestataire"];
    echo "<tr>";
    echo "<td>$idformation</td>";
    echo "<td>$intitule</td>";
    echo "<td>$datedebut</td>";
    echo "<td>$datefin</td>";
    echo "<td>$lieu</td>";
    echo "<td>$prestataire</td>";
    echo "<td><a href=\"sinscrireformation.php?adherent_id=" . $_SESSION["id"] . "&formation_id=" . $laFormation["id"] . "\">&#128395;&#65039; M'inscrire de cette formation</a></td>";
    echo "<td><a href=\"lireformation.php?id=" . $laFormation["id"] . "\">&#128270; Lire la formation</a></td>";
    echo "</tr>";
}
echo "</form>";
?>
</tbody>
</table>
<br>

<?php
require_once ("_piedpage.inc.php");
?>