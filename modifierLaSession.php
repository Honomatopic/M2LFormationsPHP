<?php
require_once ("_entete.inc.php");
$cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
$req = "SELECT * FROM session WHERE id='" . $_GET["id"] . "'";
if (isset($_GET["id"])) {
    $requete_exec = pg_query($cnx, $req);
    ?>
<h2>Pour modifier la session</h2>
<fieldset>
	<legend>Pour modifier la session</legend>

	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<input type="hidden" name="id" value=<?php echo $_GET["id"]; ?>> <select
			name="formation">
			<?php
    while ($laSession = pg_fetch_assoc($requete_exec)) {
        $reqformation = "SELECT * FROM formation WHERE id='" . $laSession["formation_id"] . "'";
        $requete_exec = pg_query($cnx, $reqformation);
        while ($laFormation = pg_fetch_assoc($requete_exec)) {
            echo "<option value=" . $laFormation["id"] . ">" . $laFormation["id"] . " - " . $laFormation["intitule"] . "</option>";
        }

        $reqformations = "SELECT * FROM formation";
        $requete_exec = pg_query($cnx, $reqformations);
        while ($laFormation = pg_fetch_assoc($requete_exec)) {
            echo "<option value=" . $laFormation["id"] . ">" . $laFormation["id"] . " - " . $laFormation["intitule"] . "</option>";
        }
        ;
        ?>
		</select> <br> <select name="duree">
		<?php
        $reqduree = "SELECT * FROM duree WHERE id='" . $laSession["duree_id"] . "'";
        $requete_exec = pg_query($cnx, $reqduree);
        while ($laDuree = pg_fetch_assoc($requete_exec)) {
            echo "<option value=" . $laDuree["id"] . ">" . $laDuree["id"] . " - " . $laDuree["datedebut"] . " au " . $laDuree["datefin"] . "</option>";
        }

        $reqdurees = "SELECT * FROM duree";
        $requete_exec = pg_query($cnx, $reqdurees);
        while ($laDuree = pg_fetch_assoc($requete_exec)) {
            echo "<option value=" . $laDuree["id"] . ">" . $laDuree["id"] . " - " . $laDuree["datedebut"] . " au " . $laDuree["datefin"] . "</option>";
        }
        ;
        ?>
		</select> <br> <select name="salle">
			<?php

        $reqsalle = "SELECT * FROM salle WHERE id='" . $laSession["salle_id"] . "'";
        $requete_exec = pg_query($cnx, $reqsalle);
        while ($laSalle = pg_fetch_assoc($requete_exec)) {
            echo "<option value=" . $laSalle["id"] . ">" . $laSalle["id"] . " - " . $laSalle["nom"] . "</option>";
        }
        $reqsalles = "SELECT * FROM salle";
        $requete_exec = pg_query($cnx, $reqsalles);
        while ($laSalle = pg_fetch_assoc($requete_exec)) {
            echo "<option value=" . $laSalle["id"] . ">" . $laSalle["id"] . " - " . $laSalle["nom"] . "</option>";
        }
        ;
        ?>
		</select> <br> <select name="intervenant">
				<?php

        $reqintervenant = "SELECT * FROM intervenant WHERE id='" . $laSession["intervenant_id"] . "'";
        $requete_exec = pg_query($cnx, $reqintervenant);
        while ($lIntervenant = pg_fetch_assoc($requete_exec)) {
            echo "<option value=" . $lIntervenant["id"] . ">" . $lIntervenant["id"] . " - " . $lIntervenant["nom"] . "</option>";
        }
        $reqintervenants = "SELECT * FROM intervenant";
        $requete_exec = pg_query($cnx, $reqintervenants);
        while ($lIntervenant = pg_fetch_assoc($requete_exec)) {
            echo "<option value=" . $lIntervenant["id"] . ">" . $lIntervenant["id"] . " - " . $lIntervenant["nom"] . "</option>";
        }
        ;
        ?>
		</select> <br> <select name="prestataire">
			<?php

        $reqprestataire = "SELECT * FROM prestataire WHERE id='" . $laSession["prestataire_id"] . "'";
        $requete_exec = pg_query($cnx, $reqprestataire);

        while ($lePrestataire = pg_fetch_assoc($requete_exec)) {
            echo "<option value=" . $lePrestataire["id"] . ">" . $lePrestataire["id"] . " - " . $lePrestataire["nom"] . "</option>";
        }
        $reqprestataires = "SELECT * FROM prestataire";
        $requete_exec = pg_query($cnx, $reqprestataires);
        while ($lePrestataire = pg_fetch_assoc($requete_exec)) {
            echo "<option value=" . $lePrestataire["id"] . ">" . $lePrestataire["id"] . " - " . $lePrestataire["nom"] . "</option>";
        }
    }
    ;
    ?>
		</select> <br> <input type="submit" name="modifiersession"
			value="&#128397;&#65039; Modifier"> &nbsp; <input type="submit"
			name="supprimersession"
			onclick="return confirm('Etes-vous sûr de supprimer cette session de formation ?');"
			value="&#128465;&#65039; Supprimer">
	</form>
</fieldset>
<a href="consulterToutesLesSessions.php">&#128269; Voir les sessions</a>
<?php } require_once("_piedpage.inc.php"); pg_close($cnx); ?>