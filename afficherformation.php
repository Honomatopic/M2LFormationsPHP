<?php
require_once ("_entete.inc.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $laformation = selectionnerLaFormationParlId($id);
    $intitule = $laformation["intitule"];
    $datedebut = $laformation["datedebut"];
    $datefin = $laformation["datefin"];
    $lieu = $laformation["lieu"];
    $prestataire = $laformation["prestataire"];

    ?>
<header>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post"><?php
    echo "Bienvenue <a href=\"editerprofil?id=" . $_SESSION["id"] . "\">" . $_SESSION["prenom"] . "</a>";
    ?>
    <input type="submit" name="deconnecter"
			onclick="return confirm('Etes-vous sûr de vous déconnecter ?');"
			value="&#128272; Se déconnecter">
	</form>
</header>
<?php 
    echo "<a href=\"espaceemploye.php\">&#128281; Revenir à l'espace employé</a>";
    $idinscris = $_SESSION["id"];
    ?>
    
<h2>Voici les informations concernant la formation</h2>
		<fieldset>
			<legend>Voici les informations concernant la formation</legend>
			<form action="" method="post">
				<input type="hidden" name="id" value=<?php echo $id;?>><?php echo $id;?>
<br> <input type="hidden" name="intitule"
					value="<?php echo $intitule;?>"><?php echo $intitule;?>
<br> Du <input type="hidden" name="datedebut"
					value=<?php echo $datedebut;?>> <?php echo $datedebut;?> au <input
					type="hidden" name="datefin" value=<?php echo $datefin;?>><?php echo $datefin;?>
       <br> <input type="hidden" name="lieu" value="<?php echo $lieu;?>"><?php echo $lieu;?>
       <br> <input type="hidden" name="prestataire"
					value="<?php echo $prestataire;?>"><?php echo $prestataire;?>
       <br> <input type="hidden" name="inscris"
					value="<?php echo $idinscris;?>"> <br> <input type="submit"
					name="inscrireformation" value="&#128395; S'inscrire"> <input type="submit"
					name="desinscrireformation"
					onclick="return confirm('Etes-vous sûr de vous désinscrire cette formation ?');"
					value="&#128395; Se désinscrire">
			</form>
<?php };?>
</fieldset>
		<a href="sinscrireformation.php">&#128281; Revenir à la page d'inscription des
			formation</a>
<?php require_once ("_piedpage.inc.php");?>