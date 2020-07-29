<?php
require_once ("_entete.inc.php");
?>

<?php 
$laSession = lirelaSessionAvecInformationParlId($_GET["id"]);
echo "<p>".$laSession["id"]."</p>";
echo "<p>".$laSession["intitule_formation"]."</p>";
echo "<p>".date("d/m/Y", strtotime($laSession["datedebut"]))."</p>";
echo "<p>".date("d/m/Y", strtotime($laSession["datefin"]))."</p>";
echo "<p>".$laSession["nom_salle"]."</p>";
echo "<p>".$laSession["prenom_intervenant"]." ".$laSession["nom_intervenant"]."</p>";
echo "<p>".$laSession["nom_prestataire"]."</p>";
echo "<td></td>";
;?>
<a href="lirelasession.php?employe_id=<?php echo $_SESSION["id"] ;?>&session_id=<?php echo $laSession["id"];?>"><button>&#128395;&#65039; M'inscrire de cette formation</button></a>
<a href="generersessionenpdf.php?id=<?php echo $laSession["id"];?>"><button>&#128195; Génerer le PDF</button></a>
<?php
require_once ("_piedpage.inc.php");

?>