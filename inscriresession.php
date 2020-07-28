<?php
require_once ("_entete.inc.php");
if (! isset($_SESSION["email"])) {
    header("location:index.php");
}

?>


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
            <td>Intervenant</td>
            <td>S'inscrire</td>
            <td>Lire</td>

</tr>
	</thead>
	<tbody>

<?php
$lesSessions = lireTouteslesSessions();
echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
foreach ($lesSessions as $laSession) {

    $idformation =  $laSession["id"];
    $intitule =  $laSession["intitule"];
    $datedebut =  $laSessionn["datedebut"];
    $datefin =  $laSession["datefin"];
    $lieu =  $laSession["lieu"];
    $prestataire =  $laSession["prestataire"];
    $intervenant = $laSession["intervenant"];
    echo "<tr>";
    echo "<td>$idformation</td>";
    echo "<td>$intitule</td>";
    echo "<td>".date("d/m/Y", strtotime($datedebut))."</td>";
    echo "<td>".date("d/m/Y", strtotime($datefin))."</td>";
    echo "<td>$lieu</td>";
    echo "<td>$prestataire</td>";
    echo "<td>$intervenant</td>";
    echo "<td><a href=\"inscriressession.php?employe_id=" . $_SESSION["id"] . "&formation_id=" . $idformation .  "\">&#128395;&#65039; M'inscrire de cette formation</a></td>";
    echo "<td><a href=\"lireformation.php?id=" . $idformation . "\">&#128270; Lire la formation</a></td>";
    echo "<td><a href=\"editerformation.php?id=" . $idformation . "\">&#128465;&#65039; Supprimer</a></td>";
    echo "<td><a href=\"editerformation.php?id=" . $idformation . "\">&#128395;&#65039; Editer</a></td>";
    echo "</tr>";
}
echo "</form>";
?>
</tbody>
</table>
<a href="creersession.php">&#128395; Pour créer une session, c'est ici</a>
<br>

<?php
require_once ("_piedpage.inc.php");
?>