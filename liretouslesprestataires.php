<?php
require_once ("_entete.inc.php");
if (!isset($_SESSION["email"])) {
    header("location:index.php");
}

?>


<h2>Voici les prestataires crées</h2>
<table>
    <thead>
        <tr>
            <td>Identifiant</td>
            <td>Son nom</td>
            <td>Supprimer</td>
            <td>Editer</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $lesPrestataires = lireTouslesPrestataires();
        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        foreach ($lesPrestataires as $lePrestataire) {

            $idprestataire = $lePrestataire["id"];
            $nom = $lePrestataire["nom"];
            echo "<tr>";
            echo "<td>$idprestataire</td>";
            echo "<td>$nom</td>";
            echo "<td><a href=\"editerprestataire.php?id=" . $idprestataire . "\">&#128465;&#65039; Supprimer</a></td>";
            echo "<td><a href=\"editerprestataire.php?id=" . $idprestataire. "\">&#128395;&#65039; Editer</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        ?>
    </tbody>
</table>
<br>
<a href="creerprestataire.php">&#128395; Pour créer un prestataire, c'est ici</a>
<?php
require_once ("_piedpage.inc.php");
?>