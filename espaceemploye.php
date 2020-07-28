<?php
require_once ("_entete.inc.php");
if (!isset($_SESSION["email"])) {
    header("location:index.php");
}

?>

<h2>Bienvenue. Voici l'ensemble des sessions de formations où vous êtes inscris</h2>
<table>
    <thead>
        <tr>
            <td>Identifiant</td>
            <td>Nom de la formation</td>
            <td>Date de début</td>
            <td>Date de fin</td>
            <td>Salle</td>
            <td>Prestataire</td>
            <td>Intervenant</td>
            <td>Voir</td>
            <td>Se désinscrire</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $lesSessions = lireMesSessions($_SESSION["id"]);
        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        foreach ($lesSessions as $laSession) {

            $idsession = $laSession["id"];
            $intitule = $laSession["intitule"];
            $datedebut = $laSession["datedebut"];
            $datefin = $laSession["datefin"];
            $salle = $laSession["lieu"];
            $intervenant = $laSession["intervenant"];
            $prestataire = $laSession["prestataire"];
            echo "<tr>";
            echo "<td>$idformation</td>";
            echo "<td>$intitule</td>";
            echo "<td>".date("d/m/Y", strtotime($datedebut))."</td>";
            echo "<td>".date("d/m/Y", strtotime($datefin))."</td>";
            echo "<td>$salle</td>";
            echo "<td>$intervenant</td>";
            echo "<td>$prestataire</td>";
            echo "<td><a href=\"lireformation.php?id=" . $idsession . "\">&#128270; Voir la formation</a></td>";
            echo "<td><a href=\"espaceemploye.php?eemploye_id=" . $_SESSION["id"] . "&fformation_id=" . $idsession . "\">&#128465;&#65039; Me désinscrire de cette formation</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        ?>
    </tbody>
    </table>
<br>
<a href="inscriresession.php">&#128269; Voir toutes les sessions de formations</a>
<?php
require_once ("_piedpage.inc.php");
?>