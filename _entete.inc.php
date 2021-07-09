<?php
session_start();
$cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8")
or die("Pas de connexion à la base de données");
$_SESSION["prenom"] = (isset($_SESSION["prenom"])) ? $_SESSION["prenom"] :'';
$_SESSION["statut"] = (isset($_SESSION["statut"])) ? $_SESSION["statut"] :'';

require_once ("connecterLEmploye.traitement.php");
require_once ("deconnecterLEmploye.traitement.php");
require_once ("creerLEmploye.traitement.php");
require_once ("supprimerLEmploye.traitement.php");
require_once ("modifierLEmploye.traitement.php");
require_once ("creerLaFormation.traitement.php");
require_once ("supprimerLaFormation.traitement.php");
require_once ("modifierLaFormation.traitement.php");
require_once ("creerLaDuree.traitement.php");
require_once ("supprimerLaDuree.traitement.php");
require_once ("modifierLaDuree.traitement.php");
require_once ("creerLIntervenant.traitement.php");
require_once ("supprimerLIntervenant.traitement.php");
require_once ("modifierLIntervenant.traitement.php");
require_once ("creerLePrestataire.traitement.php");
require_once ("supprimerLePrestataire.traitement.php");
require_once ("modifierLePrestataire.traitement.php");
require_once ("creerLaSalle.traitement.php");
require_once ("supprimerLaSalle.traitement.php");
require_once ("modifierLaSalle.traitement.php");
require_once ("creerLaSession.traitement.php");
require_once ("supprimerLaSession.traitement.php");
require_once ("modifierLaSession.traitement.php");
require_once ("sInscrireALaSession.traitement.php");
require_once ("seDesinscrireDeMaSession.traitement.php");
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