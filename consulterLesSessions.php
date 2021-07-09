<?php
require_once ("_entete.inc.php");
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
        $req = "SELECT session.id, formation.intitule AS intitule_formation,
        duree.datedebut, duree.datefin,
        salle.nom AS nom_salle,
        intervenant.nom AS nom_intervenant,
        prestataire.nom AS nom_prestataire
        FROM session
        JOIN formation ON session.formation_id = formation.id
        JOIN duree ON session.duree_id = duree.id
        JOIN salle ON session.salle_id = salle.id
        JOIN intervenant ON session.intervenant_id = intervenant.id
        JOIN prestataire ON session.prestataire_id = prestataire.id";
        $requete_exec = pg_query($cnx, $req);
        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        while ($laSession = pg_fetch_assoc($requete_exec)) {

            echo "<tr>";
            echo "<td>".$laSession["id"]."</td>";
            echo "<td>".$laSession["intitule_formation"]."</td>";
            echo "<td>". date("d/m/Y", strtotime($laSession["datedebut"]))."</td>";
            echo "<td>". date("d/m/Y", strtotime($laSession["datefin"]))."</td>";
            echo "<td>".$laSession["nom_salle"]."</td>";
            echo "<td>".$laSession["nom_intervenant"]."</td>";
            echo "<td>".$laSession["nom_prestataire"]."</td>";
            echo "<td><a href=\"consulterLaSession.php?id=" . $laSession["id"] . "\">&#128269; Voir le détail</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        pg_close($cnx);
        ?>
    </tbody>
</table>
<?php
require_once ("_piedpage.inc.php");
?>