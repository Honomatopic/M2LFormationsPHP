<?php
require_once ("_entete.inc.php");
if (! isset($_SESSION["email"])) {
    header("location:index.php");
}

?>

<h2>Bienvenue. Voici l'ensemble des sessions de formations où vous êtes
	inscris</h2>
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
;
        $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
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
    JOIN inscrire ON session.id = inscrire.session_id
    JOIN employe ON inscrire.employe_id = employe.id
    WHERE employe.id = '".$_SESSION["id"]."'";
        $requete_exec = pg_query($cnx, $req);

        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        while ($maSession = pg_fetch_assoc($requete_exec)) {
            echo "<tr>";
            echo "<td>".$maSession["id"]."</td>";
            echo "<td>".$maSession["intitule_formation"]."</td>";
            echo "<td>" . date("d/m/Y", strtotime($maSession["datedebut"])) . "</td>";
            echo "<td>" . date("d/m/Y", strtotime($maSession["datefin"])) . "</td>";
            echo "<td>".$maSession["nom_salle"]."</td>";
            echo "<td>".$maSession["nom_intervenant"]."</td>";
            echo "<td>".$maSession["nom_prestataire"]."</td>";
            echo "<td><a href=\"consulterMaSession.php?id=" . $maSession["id"] . "\">&#128270; Voir le détail</a></td>";
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