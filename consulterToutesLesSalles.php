<?php
include_once ("_entete.inc.php");
if (!isset($_SESSION["email"])) {
    header("location:index.php");
}

?>


<h2>Voici les salles créées</h2>
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
        $lesSalles = consulterToutesLesSalles();
        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        foreach ($lesSalles as $jeanLaSalle) {
            $idsalle = $jeanLaSalle["id"];
            $nom = $jeanLaSalle["nom"];
            echo "<tr>";
            echo "<td>$idsalle</td>";
            echo "<td>$nom</td>";
            echo "<td><a href=\"modifierLaSalle.php?id=" . $idsalle . "\">&#128465;&#65039; Supprimer</a></td>";
            echo "<td><a href=\"modifierLaSalle.php?id=" . $idsalle . "\">&#128395;&#65039; Modifier</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        ?>
    </tbody>
</table>
<br>
<a href="creerLaSalle.php">&#128395; Pour créer une salle, c'est ici</a>
<?php
include_once ("_piedpage.inc.php");
?>