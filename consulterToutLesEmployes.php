<?php
include_once ("_entete.inc.php");
if (!isset($_SESSION["email"])) {
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
        $lesEmployes = lireTouslesEmployes();
        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        foreach ($lesEmployes as $lEmploye) {

            $idemploye = $lEmploye["id"];
            $nom = $lEmploye["nom"];
			$prenom = $lEmploye["prenom"];
			$email = $lEmploye["email"];
			$motpasse = $lEmploye["motpasse"];
			$statut = $lEmploye["statut"];
            echo "<tr>";
            echo "<td>$idemploye</td>";
            echo "<td>$nom</td>";
			echo "<td>$prenom</td>";
			echo "<td>$email</td>";
			echo "<td>$motpasse</td>";
			echo "<td>$statut</td>";
            echo "<td><a href=\"editeremploye.php?id=" . $idemploye . "\">&#128465;&#65039; Supprimer</a></td>";
            echo "<td><a href=\"editeremploye.php?id=" . $idemploye . "\">&#128395;&#65039; Editer</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        ?>
    </tbody>
</table>
<br>
<a href="creeremploye.php">&#128395; Pour créer un employé, c'est ici</a>
<?php
include_once ("_piedpage.inc.php");
?>