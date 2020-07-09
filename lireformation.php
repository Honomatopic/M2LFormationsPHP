<?php
require_once ("_entete.inc.php");

?>
<header>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"><?php
                                                                        echo "Bienvenue ".$_SESSION["prenom"];
                                                                        ?>

        <input type="submit" name="deconnecter" onclick="return confirm('Etes-vous sûr de vous déconnecter ?');" value="&#128272; Se déconnecter">
    </form>
</header>
<?php 
$laformation = lireLaFormationParlId($_GET["id"]);
echo "<p>".$laformation["id"]."</p>";
echo "<p>".$laformation["intitule"]."</p>";
echo "<p>".$laformation["datedebut"]."</p>";
echo "<p>".$laformation["datefin"]."</p>";
echo "<p>".$laformation["lieu"]."</p>";
echo "<p>".$laformation["prestataire"]."</p>";
;?>
<a href="genererpdf.php?id=<?php echo $laformation["id"];?>"><button>&#128195; Génerer le PDF</button></a>
<?php
require_once ("_piedpage.inc.php");

?>