<?php 
require_once ("_entete.inc.php");
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $laformation = selectionnerLaFormationParlId($id);
    $intitule = $laformation["intitule"];
    $datedebut = $laformation["datedebut"];
    $datefin = $laformation["datefin"];
    $lieu = $laformation["lieu"];
    $prestataire = $laformation["prestataire"];
}
?>

<h2>Pour éditer une formation</h2>
<fieldset>
<legend>Pour éditer une formation</legend>

<form action="" method="post">
<input type="hidden" name="id" value=<?php echo $id;?>>
<input type="text" name="intitule" value="<?php echo $intitule;?>">
<br>
Du <input type="date" name="datedebut" 
       min="2000-01-01" max="2021-12-31" value=<?php echo $datedebut;?>> au <input type="date" name="datefin" 
       min="2000-01-01" max="2021-12-31" value=<?php echo $datefin;?>>
       <br>
       <input type="text" name="lieu" value="<?php echo $lieu;?>">
       <br>
       <select name="prestataire" value="<?php echo $prestataire;?>">
       <option value="AFPA">AFPA</option>
       <option value="inconnu">Inconnu</option>
       <option value="CNAM">CNAM</option>
       <option value="GRETA">GRETA</option>
       <option value="Privé">Privé</option>
       </select>
       <br>
       <input type="submit" name="editerformation" value="Editer">
       <br>
       <input type="submit" name="supprimerformation" onclick="return confirm('Etes-vous sûr de supprimer cette formation ?');" value="Supprimer">
</form>

</fieldset>
<?php require_once ("_piedpage.inc.php");?>