<?php
require_once("_entete.inc.php");
if (!isset($_SESSION["email"])) {
    header("location:index.php");
}

?>
<header>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"><?php
                                                                    echo "Bienvenue <a href=\"editionprofil?id=" . $_SESSION["id"] . "\">" . $_SESSION["prenom"] . "</a>";
                                                                    echo "<br>";
                                                                    echo "<a href=\"espaceemploye.php\">&#128281; Revenir à l'espace employé</a>";
                                                                    ?>

        <input type="submit" name="deconnecter" onclick="return confirm('Etes-vous sûr de vous déconnecter ?');" value="&#128272; Se déconnecter">
    </form>
</header>

<h2>Voici la liste des formations</h2>
<table>
    <thead>
        <tr>
            <td>Identifiant</td>
            <td>Intitulé</td>
            <td>Date de début</td>
            <td>Date de fin</td>
            <td>Lieu</td>
            <td>Prestataire</td>
            <td>Supprimer</td>
            <td>Editer</td>
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
            echo "<td><a href=\"editerformation.php?id=" . $idformation . "\">&#128465;&#65039; Supprimer</a></td>";
            echo "<td><a href=\"editerformation.php?id=" . $idformation . "\">&#128395;&#65039; Editer</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        ?>
    </tbody>
</table>
<br>
<?php if($_SESSION["statut"] = 1) : ?>
    <?php echo "<a href=\"creerformation.php\">&#128395; Pour créer une formation, c'est ici</a>";?>
   <?php endif ;?>
   <br>
<a href="sinscrireformation.php">&#128269; Voir mes formations</a>
<?php
require_once("_piedpage.inc.php");
?>