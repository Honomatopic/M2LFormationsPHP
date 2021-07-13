<?php
require_once ("_entete.inc.php");
if (! isset($_SESSION["email"])) {
    header("location:index.php");
}
?>
<h2>Voici les employés crées</h2>
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
        $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
        $req = "SELECT * FROM employe";
        $requete_exec = pg_query($cnx, $req);
        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        while ($lEmploye = pg_fetch_assoc($requete_exec)) {
            echo "<tr>";
            echo "<td>" . $lEmploye["id"] . "</td>";
            echo "<td>" . $lEmploye["nom"] . "</td>";
            echo "<td>" . $lEmploye["prenom"] . "</td>";
            echo "<td>" . $lEmploye["email"] . "</td>";
            echo "<td>" . $lEmploye["motpasse"] . "</td>";
            echo "<td>" . $lEmploye["statut"] . "</td>";
            echo "<td><a href=\"modifierLEmploye.php?id=" . $lEmploye["id"] . "\">&#128465;&#65039; Supprimer</a></td>";
            echo "<td><a href=\"modifierLEmploye.php?id=" . $lEmploye["id"] . "\">&#128395;&#65039; Modifier</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        pg_close($cnx);
        ?>
    </tbody>
</table>
<br>
<a href="creerLEmploye.php">&#128395; Pour créer un employé, c'est ici</a>
<?php
require_once ("_piedpage.inc.php");
?>