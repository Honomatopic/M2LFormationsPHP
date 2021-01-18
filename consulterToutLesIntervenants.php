<?php
include_once ("_entete.inc.php");
if (!isset($_SESSION["email"])) {
    header("location:index.php");
}

?>


<h2>Voici les intervenants crées</h2>
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
        $lesIntervenants = consulterToutLesIntervenants();
        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        foreach ($lesIntervenants as $lintervenant) {

            $idintervenant = $lintervenant["id"];
            $nom = $lintervenant["nom"];
            echo "<tr>";
            echo "<td>$idintervenant</td>";
            echo "<td>$nom</td>";
            echo "<td><a href=\"modifierLIntervenant.php?id=" . $idintervenant . "\">&#128465;&#65039; Supprimer</a></td>";
            echo "<td><a href=\"modifierLIntervenant.php?id=" . $idintervenant. "\">&#128395;&#65039; Modifier</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        ?>
    </tbody>
</table>
<br>
<a href="creerLIntervenant.php">&#128395; Pour créer un intervenant, c'est ici</a>
<?php
include_once ("_piedpage.inc.php");
?>