<?php
require_once ("_entete.inc.php");

?>

<?php 
$laSession = lireLaFormationParlId($_GET["id"]);
echo "<p>".$laSession["id"]."</p>";
echo "<p>".$laSession["intitule"]."</p>";
echo "<p>".date("d/m/Y", strtotime($laSession["datedebut"]))."</p>";
echo "<p>".date("d/m/Y", strtotime($laSession["datefin"]))."</p>";
echo "<p>".$laSession["salle"]."</p>";
echo "<p>".$laSession["prestataire"]."</p>";
echo "<p>".$laSession["intervenant"]."</p>";
;?>
<a href="generersessionenpdf.php?id=<?php echo $laSession["id"];?>"><button>&#128195; Génerer le PDF</button></a>
<?php
require_once ("_piedpage.inc.php");

?>