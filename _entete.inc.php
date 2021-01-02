<?php
session_start();
$_SESSION["prenom"] = (isset($_SESSION["prenom"])) ? $_SESSION["prenom"] :'';
$_SESSION["statut"] = (isset($_SESSION["statut"])) ? $_SESSION["statut"] :'';
include_once ("_gestionBase.inc.php");
include_once ("connecteremploye.traitement.php");
include_once ("deconnecteremploye.traitement.php");
include_once ("creeremploye.traitement.php");
include_once ("supprimeremploye.traitement.php");
include_once ("editeremploye.traitement.php");
include_once ("creerformation.traitement.php");
include_once ("supprimerformation.traitement.php");
include_once ("editerformation.traitement.php");
include_once ("creerduree.traitement.php");
include_once ("supprimerduree.traitement.php");
include_once ("editerduree.traitement.php");
include_once ("creerintervenant.traitement.php");
include_once ("supprimerintervenant.traitement.php");
include_once ("editerintervenant.traitement.php");
include_once ("creerprestataire.traitement.php");
include_once ("supprimerprestataire.traitement.php");
include_once ("editerprestataire.traitement.php");
include_once ("creersalle.traitement.php");
include_once ("supprimersalle.traitement.php");
include_once ("editersalle.traitement.php");
include_once ("creersession.traitement.php");
include_once ("supprimersession.traitement.php");
include_once ("editersession.traitement.php");
include_once ("inscriresession.traitement.php");
include_once ("desinscriresession.traitement.php");
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
					<li><a href="liretouslesemployes.php">&#128395; Les employés</a></li>
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