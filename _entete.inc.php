<?php
session_start();
$_SESSION["prenom"] = (isset($_SESSION["prenom"])) ? $_SESSION["prenom"] :'';
$_SESSION["statut"] = (isset($_SESSION["statut"])) ? $_SESSION["statut"] :'';
include_once ("_gestionBase.inc.php");
include_once ("connecterLEmploye.traitement.php");
include_once ("deconnecterLEmploye.traitement.php");
include_once ("creerLEmploye.traitement.php");
include_once ("supprimerLEmploye.traitement.php");
include_once ("modifierlEmploye.traitement.php");
include_once ("creerLaFormation.traitement.php");
include_once ("supprimerLaFormation.traitement.php");
include_once ("modifierLaFormation.traitement.php");
include_once ("creerLaDuree.traitement.php");
include_once ("supprimerLaDuree.traitement.php");
include_once ("modifierLaDuree.traitement.php");
include_once ("creerLIntervenant.traitement.php");
include_once ("supprimerLIntervenant.traitement.php");
include_once ("modifierLIntervenant.traitement.php");
include_once ("creerLePrestataire.traitement.php");
include_once ("supprimerLePrestataire.traitement.php");
include_once ("modifierLePrestataire.traitement.php");
include_once ("creerLaSalle.traitement.php");
include_once ("supprimerLaSalle.traitement.php");
include_once ("modifierLaSalle.traitement.php");
include_once ("creerLaSession.traitement.php");
include_once ("supprimerLaSession.traitement.php");
include_once ("modifierLaSession.traitement.php");
include_once ("sInscrireALaSession.traitement.php");
include_once ("seDesinscrireDeMaSession.traitement.php");
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<title>M2L Formations</title>
</head>

<body>

	<header>
		
		<nav>
			<ul>
			<?php if($_SESSION["statut"]==1) : ?>
				<li class="deroulant">Gérer</li>
				<ul class="sous">
                                    <li><a href="consulterToutLesEmployes.php">&#128395; Les employés</a></li>
                                    <li><a href="consulterToutesLesFormations.php">&#128395; Les formations</a></li>
                                    <li><a href="consulterToutesLesDurees.php">&#128395; Les durées</a></li>
                                    <li><a href="consulterToutLesIntervenants.php">&#128395; Les intervenants</a></li>
                                    <li><a href="consulterToutLesPrestataires.php">&#128395; Les prestataires</a></li>
                                    <li><a href="consulterToutesLesSalles.php">&#128395; Les salles</a></li>
                                    <li><a href="consulterToutesLesSessions.php">&#128395; Les sessions</a></li>
			
			
				</ul>
				<?php endif;?>
				<?php if($_SESSION["prenom"]) : ?>
                                <li><a href="consulterLesSessions.php">&#128269; Consulter toutes les sessions de formations</a></li>
				
			</ul>
		</nav>
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"><?php
																				echo "Bienvenue " . $_SESSION["prenom"];

																				echo "<br>";
																				echo "<a href=\"espaceDeLEmploye.php\">&#128281; Revenir à l'espace employé</a>";
																			?>
			<input type="submit" name="deconnecter" onclick="return confirm('Etes-vous sûr de vous déconnecter ?');" value="&#128272; Se déconnecter">
		</form>
		<?php endif;?>
	</header>
	<section>
		<img alt="Logo" src="images/m2l.png">