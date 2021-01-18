<?php
include_once ("_entete.inc.php");
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
        $lesDurees = consulterToutesLesDurees();
        echo "<form action=\"" . $_SERVER['PHP_SELF'] . " \"method=\"post\">";
        foreach ($lesDurees as $laDuree) {

            $idduree = $laDuree["id"];
            $datedebut = $laDuree["datedebut"];
            $datefin = $laDuree["datefin"];
            echo "<tr>";
            echo "<td>$idduree</td>";
            echo "<td>".date("d/m/Y", strtotime($datedebut))."</td>";
            echo "<td>".date("d/m/Y", strtotime($datefin))."</td>";
            echo "<td><a href=\"modifierLaDuree.php?id=" . $idduree . "\">&#128465;&#65039; Supprimer</a></td>";
            echo "<td><a href=\"modifierLaDuree.php?id=" . $idduree . "\">&#128395;&#65039; Modifier</a></td>";
            echo "</tr>";
        }
        echo "</form>";
        ?>
    </tbody>
</table>
<br>
<a href="creerLaDuree.php">&#128395; Pour créer une durée, c'est ici</a>
<?php
include_once ("_piedpage.inc.php");
?>