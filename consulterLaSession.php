<?php
include_once ("_entete.inc.php");
?>

<?php 
$laSession = consulterLesInformationsDeLaSessionParLId($_GET["id"]);
echo "<p>".$laSession["id_session"]."</p>";
echo "<p>".$laSession["intitule_formation"]."</p>";
echo "<p>".date("d/m/Y", strtotime($laSession["datedebut"]))."</p>";
echo "<p>".date("d/m/Y", strtotime($laSession["datefin"]))."</p>";
echo "<p>".$laSession["nom_salle"]."</p>";
echo "<p>".$laSession["nom_intervenant"]."</p>";
echo "<p>".$laSession["nom_prestataire"]."</p>";
echo "<td></td>";
;?>
<a href="consulterLaSession.php?employe_id=<?php echo $_SESSION["id"] ;?>&session_id=<?php echo $laSession["id_session"];?>"><button>&#128395;&#65039; M'inscrire de cette session de formation</button></a>
<a href="genererLaSessionEnPdf.php?id=<?php echo $laSession["id_session"];?>"><button>&#128195; Génerer le PDF</button></a>
<?php
include_once ("_piedpage.inc.php");

?>