<?php
include_once ("_entete.inc.php");
if (!isset($_SESSION["email"])) {
    header("location:index.php");
}

?>


<h2>Voici les formations créées</h2>
<table>
    <thead>
        <tr>
            <td>Identifiant</td>
            <td>Nom de la formation</td>
            <td>Supprimer</td>
            <td>Editer</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $lesFormations = consulterToutesLesFormations();
        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        foreach ($lesFormations as $laFormation) {

            $idformation = $laFormation["id"];
            $intitule = $laFormation["intitule"];
            echo "<tr>";
            echo "<td>$idformation</td>";
            echo "<td>$intitule</td>";
            echo "<td><a href=\"modifierLaFormation.php?id=" . $idformation . "\">&#128465;&#65039; Supprimer</a></td>";
            echo "<td><a href=\"modifierLaFormation.php?id=" . $idformation . "\">&#128395;&#65039; Modifier</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        ?>
    </tbody>
</table>
<br>
<a href="creerLaFormation.php">&#128395; Pour créer une formation, c'est ici</a>
<?php
include_once ("_piedpage.inc.php");
?>