<?php
session_start();
$_SESSION["prenom"] = (isset($_SESSION["prenom"])) ? $_SESSION["prenom"] :'';
$_SESSION["statut"] = (isset($_SESSION["statut"])) ? $_SESSION["statut"] :'';
require_once ("_gestionBase.inc.php");
require_once ("connecteremploye.traitement.php");
require_once ("deconnecteremploye.traitement.php");
require_once ("creerformation.traitement.php");
require_once ("supprimerformation.traitement.php");
require_once ("editerformation.traitement.php");
require_once ("creerduree.traitement.php");
require_once ("supprimerduree.traitement.php");
require_once ("editerduree.traitement.php");
require_once ("creerintervenant.traitement.php");
require_once ("supprimerintervenant.traitement.php");
require_once ("editerintervenant.traitement.php");
require_once ("creerprestataire.traitement.php");
require_once ("supprimerprestataire.traitement.php");
require_once ("editerprestataire.traitement.php");
require_once ("creersalle.traitement.php");
require_once ("supprimersalle.traitement.php");
require_once ("editersalle.traitement.php");
require_once ("creersession.traitement.php");
require_once ("supprimersession.traitement.php");
require_once ("editersession.traitement.php");
require_once ("inscriresession.traitement.php");
require_once ("desinscriresession.traitement.php");
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
					<li><a href="liretouteslesformations.php">&#128395; Les formations</a></li>
					<li><a href="liretouteslesdurees.php">&#128395; Les durées</a></li>
					<li><a href="liretouslesintervenants.php">&#128395; Les intervenants</a></li>
					<li><a href="liretouslesprestataires.php">&#128395; Les prestataires</a></li>
					<li><a href="liretouteslessalles.php">&#128395; Les salles</a></li>
					<li><a href="liretouteslessessions.php">&#128395; Les sessions</a></li>
			
			
				</ul>
				<?php endif;?>
				<?php if($_SESSION["prenom"]) : ?>
				<li><a href="consulterlessessions.php">&#128269; Consulter toutes les sessions de formations</a></li>
				
			</ul>
		</nav>
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"><?php
																				echo "Bienvenue " . $_SESSION["prenom"];

																				echo "<br>";
																				echo "<a href=\"espaceemploye.php\">&#128281; Revenir à l'espace employé</a>";
																			?>
			<input type="submit" name="deconnecter" onclick="return confirm('Etes-vous sûr de vous déconnecter ?');" value="&#128272; Se déconnecter">
		</form>
		<?php endif;?>
	</header>
	<section>
		<img alt="Logo" src="images/m2l.png">