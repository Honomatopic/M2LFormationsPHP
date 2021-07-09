<?php
require_once ("_entete.inc.php");
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
        $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8")
        or die("Pas de connexion à la base de données");
        $req = "SELECT * FROM formation";
        $requete_exec = pg_query($cnx, $req);
        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        while ($laFormation = pg_fetch_assoc($requete_exec)) {
            echo "<tr>";
            echo "<td>".$laFormation["id"]."</td>";
            echo "<td>".$laFormation["intitule"]."</td>";
            echo "<td><a href=\"modifierLaFormation.php?id=" . $laFormation["id"] . "\">&#128465;&#65039; Supprimer</a></td>";
            echo "<td><a href=\"modifierLaFormation.php?id=" . $laFormation["id"] . "\">&#128395;&#65039; Modifier</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        pg_close($cnx);
        ?>
    </tbody>
</table>
<br>
<a href="creerLaFormation.php">&#128395; Pour créer une formation, c'est ici</a>
<?php
require_once ("_piedpage.inc.php");
?>