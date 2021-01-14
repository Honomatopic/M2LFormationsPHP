<?php
include_once ("_entete.inc.php");
if (!isset($_SESSION["email"])) {
    header("location:index.php");
}

?>


<h2>Voici les sessions de formation proposées</h2>
<table>
    <thead>
        <tr>
            <td>Identifiant</td>
            <td>Le nom de la formation</td>
            <td>Le date de début</td>
            <td>Le date de fin</td>
            <td>La salle</td>
            <td>L'intervenant</td>
            <td>Le prestataire</td>
            <td>Voir le détail</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $lesSessions = lireTouteslesSessions();
        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        foreach ($lesSessions as $laSession) {

            $idsession = $laSession["id"];
            $formation = $laSession["intitule_formation"];
            $datedebut = $laSession["datedebut"];
            $datefin = $laSession["datefin"];
            $salle = $laSession["nom_salle"];
            $nomintervenant = $laSession["nom_intervenant"];
            $prestataire = $laSession["nom_prestataire"];
            echo "<tr>";
            echo "<td>$idsession</td>";
            echo "<td>$formation</td>";
            echo "<td>". date("d/m/Y", strtotime($datedebut))."</td>";
            echo "<td>". date("d/m/Y", strtotime($datefin))."</td>";
            echo "<td>$salle</td>";
            echo "<td>$nomintervenant</td>";
            echo "<td>$prestataire</td>";
            echo "<td><a href=\"lirelasession.php?id=" . $idsession . "\">&#128269; Voir le détail</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        ?>
    </tbody>
</table>
<?php
include_once ("_piedpage.inc.php");
?>