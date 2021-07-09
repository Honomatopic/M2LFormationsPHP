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
        $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8")
        or die("Pas de connexion à la base de données");
        $req = "SELECT * FROM prestataire";
        $requete_exec = pg_query($cnx, $req);
        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        while ($lePrestataire = pg_fetch_assoc($requete_exec)) {
            echo "<tr>";
            echo "<td>".$lePrestataire["id"]."</td>";
            echo "<td>".$lePrestataire["nom"]."</td>";
            echo "<td><a href=\"modifierLePrestataire.php?id=" . $lePrestataire["id"] . "\">&#128465;&#65039; Supprimer</a></td>";
            echo "<td><a href=\"modifierLePrestataire.php?id=" . $lePrestataire["id"]. "\">&#128395;&#65039; Modifier</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        pg_close($cnx);
        ?>
    </tbody>
</table>
<br>
<a href="creerLePrestataire.php">&#128395; Pour créer un prestataire, c'est ici</a>
<?php
require_once ("_piedpage.inc.php");
?>