<?php
require_once ("_entete.inc.php");
if (!isset($_SESSION["email"])) {
    header("location:index.php");
}

?>


<h2>Voici les durées créées</h2>
<table>
    <thead>
        <tr>
            <td>Identifiant</td>
            <td>Date de début</td>
            <td>Date de fin</td>
            <td>Supprimer</td>
            <td>Editer</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $req = "SELECT * FROM duree";
        $requete_exec = pg_query($cnx, $req);
        
        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        while($laDuree = pg_fetch_assoc($requete_exec)) {
            echo "<tr>";
            echo "<td>".$laDuree["id"]."</td>";
            echo "<td>".date("d/m/Y", strtotime($laDuree["datedebut"]))."</td>";
            echo "<td>".date("d/m/Y", strtotime($laDuree["datefin"]))."</td>";
            echo "<td><a href=\"modifierLaDuree.php?id=" . $laDuree["id"] . "\">&#128465;&#65039; Supprimer</a></td>";
            echo "<td><a href=\"modifierLaDuree.php?id=" . $laDuree["id"] . "\">&#128395;&#65039; Modifier</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        pg_close($cnx);
        ?>
    </tbody>
</table>
<br>
<a href="creerLaDuree.php">&#128395; Pour créer une durée, c'est ici</a>
<?php
require_once ("_piedpage.inc.php");
?>