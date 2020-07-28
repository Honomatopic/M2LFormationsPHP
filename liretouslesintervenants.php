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
            <td>Son prénom</td>
            <td>Supprimer</td>
            <td>Editer</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $lesIntervenants = lireTouslesIntervenants();
        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        foreach ($lesIntervenants as $lintervenant) {

            $idintervenant = $lintervenant["id"];
            $nom = $lintervenant["nom"];
            $prenom = $lintervenant["prenom"];
            echo "<tr>";
            echo "<td>$idintervenant</td>";
            echo "<td>$nom</td>";
            echo "<td>$prenom</td>";
            echo "<td><a href=\"editerintervenant.php?id=" . $idintervenant . "\">&#128465;&#65039; Supprimer</a></td>";
            echo "<td><a href=\"editerintervenant.php?id=" . $idintervenant. "\">&#128395;&#65039; Editer</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        ?>
    </tbody>
</table>
<br>
<a href="creerintervenant.php">&#128395; Pour créer un intervenant, c'est ici</a>
<?php
require_once ("_piedpage.inc.php");
?>