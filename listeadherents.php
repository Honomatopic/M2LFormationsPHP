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
                                                                    echo "<a href=\"espaceadherent.php\">&#128281; Revenir à l'espace adhérent</a>";
                                                                    ?>

        <input type="submit" name="deconnecter" onclick="return confirm('Etes-vous sûr de vous déconnecter ?');" value="&#128272; Se déconnecter">
    </form>
</header>

<h2>Voici la liste des adhérents</h2>
<table>
    <thead>
        <tr>
            <td>Identifiant</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Email</td>
            <td>Mot de passe</td>
            <td>Statut</td>
            <td>Supprimer</td>
            <td>Editer</td>
        </tr>
    </thead>
    <tbody>

        <?php
        $lesAdherents = lireTouslesAdherents();
        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        foreach ($lesAdherents as $lAdherent) {

            $idadherent = $lAdherent["id"];
            $nom = $lAdherent["nom"];
            $prenom = $lAdherent["prenom"];
            $email = $lAdherent["email"];
            $motpasse = $lAdherent["motpasse"];
            $statut = $lAdherent["statut"];
            echo "<tr>";
            echo "<td>$idadherent</td>";
            echo "<td>$nom</td>";
            echo "<td>$prenom</td>";
            echo "<td>$email</td>";
            echo "<td>$motpasse</td>";
            echo "<td>$statut</td>";
            echo "<td><a href=\"editionprofil.php?id=" . $idadherent . "\">&#128465;&#65039; Supprimer</a></td>";
            echo "<td><a href=\"editionprofil.php?id=" . $idadherent . "\">&#128395;&#65039; Editer</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        ?>
    </tbody>
</table>
<br>

<?php
require_once("_piedpage.inc.php");
?>