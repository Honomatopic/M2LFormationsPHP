<?php
include_once("_entete.inc.php");
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
            <td>Intervenant</td>
            <td>Prestataire</td>
            <td>Voir le détail</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $mesSessions = consulterMesSessions($_SESSION["id"]);
        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        
            foreach ($mesSessions as $maSession) {
                $idsession = $maSession["id"];
                $intitule = $maSession["intitule_formation"];
                $datedebut = $maSession["datedebut"];
                $datefin = $maSession["datefin"];
                $salle = $maSession["nom_salle"];
                $nomintervenant = $maSession["nom_intervenant"];
                $prestataire = $maSession["nom_prestataire"];
                echo "<tr>";
                echo "<td>$idsession</td>";
                echo "<td>$intitule</td>";
                echo "<td>" . date("d/m/Y", strtotime($datedebut)) . "</td>";
                echo "<td>" . date("d/m/Y", strtotime($datefin)) . "</td>";
                echo "<td>$salle</td>";
                echo "<td>$nomintervenant</td>";
                echo "<td>$prestataire</td>";
                echo "<td><a href=\"consulterMaSession.php?id=" . $idsession . "\">&#128270; Voir le détail</a></td>";
                echo "</tr>";
            }
        
        echo "</form>";
        ?>
    </tbody>
</table>
<?php
include_once("_piedpage.inc.php");
?>