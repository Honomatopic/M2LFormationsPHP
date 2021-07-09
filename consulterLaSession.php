<?php
require_once ("_entete.inc.php");
?>

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
        JOIN prestataire ON session.prestataire_id = prestataire.id
        WHERE session.id='" . $_GET["id"] . "'";
$requete_exec = pg_query($cnx, $req);
while ($laSession = pg_fetch_assoc($requete_exec)) {
    // $laSession = consulterLesInformationsDeLaSessionParLId();
    echo "<p>" . $laSession["id"] . "</p>";
    echo "<p>" . $laSession["intitule_formation"] . "</p>";
    echo "<p>" . date("d/m/Y", strtotime($laSession["datedebut"])) . "</p>";
    echo "<p>" . date("d/m/Y", strtotime($laSession["datefin"])) . "</p>";
    echo "<p>" . $laSession["nom_salle"] . "</p>";
    echo "<p>" . $laSession["nom_intervenant"] . "</p>";
    echo "<p>" . $laSession["nom_prestataire"] . "</p>";
    echo "<td></td>";



echo "<a href=consulterLaSession.php?employe_id=".$_SESSION["id"]."&session_id=".$laSession["id"]."><button>&#128395;&#65039;
		M'inscrire de cette session de formation</button></a>";
echo "<a href=genererLaSessionEnPdf.php?id=".$laSession["id"]."><button>&#128195;
		Génerer le PDF</button></a>";
}
pg_close($cnx);
require_once ("_piedpage.inc.php");

?>