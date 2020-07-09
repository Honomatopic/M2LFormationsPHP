<?php
require_once("_entete.inc.php");
if (!isset($_SESSION["email"])) {
    header("location:index.php");
}

?>
<header>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"><?php
                                                                        echo "Bienvenue " . $_SESSION["prenom"];
                                                                        ?>

        <input type="submit" name="deconnecter" onclick="return confirm('Etes-vous sûr de vous déconnecter ?');" value="&#128272; Se déconnecter">
    </form>
</header>

<h2>Bienvenue. Voici l'ensemble des formations où vous êtes inscris</h2>
<table>
    <thead>
        <tr>
            <td>Identifiant</td>
            <td>Nom de la formation</td>
            <td>Date de début</td>
            <td>Date de fin</td>
            <td>Lieu</td>
            <td>Prestataire</td>
            <td>Voir</td>
            <td>Se désinscrire</td>
            <td>Supprimer</td>
            <td>Editer</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $lesFormations = lireMesFormations($_SESSION["id"]);
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
            echo "<td><a href=\"lireformation.php?id=" . $idformation . "\">&#128270; Voir la formation</a></td>";
            echo "<td><a href=\"espaceemploye.php?eemploye_id=" . $_SESSION["id"] . "&fformation_id=" . $idformation . "\">&#128465;&#65039; Me désinscrire de cette formation</a></td>";
            echo "<td><a href=\"editerformation.php?id=" . $idformation . "\">&#128465;&#65039; Supprimer</a></td>";
            echo "<td><a href=\"editerformation.php?id=" . $idformation . "\">&#128395;&#65039; Editer</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        ?>
    </tbody>
</table>
<br>
<a href="creerformation.php">&#128395; Pour créer une formation, c'est ici</a>
<br>
<a href="sinscrireformation.php">&#128269; Voir toutes les formations</a>
<?php
require_once("_piedpage.inc.php");
?>
<?php
require_once("_piedpage.inc.php");
?>