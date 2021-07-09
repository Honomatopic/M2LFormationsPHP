<?php
require_once ("_entete.inc.php");
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
        $req = "SELECT * FROM intervenant";
        $requete_exec = pg_query($cnx, $req);
        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        while ($lintervenant = pg_fetch_assoc($requete_exec)) {
            echo "<tr>";
            echo "<td>".$lintervenant["id"]."</td>";
            echo "<td>".$lintervenant["nom"]."</td>";
            echo "<td><a href=\"modifierLIntervenant.php?id=" . $lintervenant["id"] . "\">&#128465;&#65039; Supprimer</a></td>";
            echo "<td><a href=\"modifierLIntervenant.php?id=" . $lintervenant["id"]. "\">&#128395;&#65039; Modifier</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        pg_close($cnx);
        ?>
    </tbody>
</table>
<br>
<a href="creerLIntervenant.php">&#128395; Pour créer un intervenant, c'est ici</a>
<?php
require_once ("_piedpage.inc.php");
?>