<?php require_once ("_entete.inc.php");?>
<h2>Pour créer une formation</h2>
<fieldset>
<legend>Pour créer une formation</legend>

<form action="" method="post">
<input type="text" name="intitule" placeholder="L'intitulé">
<br>
Du <input type="date" name="datedebut" value=<?php echo date("dd/MM/Y")?>
       min="2000-01-01" max="2021-12-31"> au <input type="date" name="datefin" value=<?php echo date("dd/MM/Y")?>
       min="2000-01-01" max="2021-12-31">
       <br>
       <input type="text" name="lieu" placeholder="Le lieu">
       <br>
       <select name="prestataire" placeholder="Le prestataire">
       <option value="AFPA">AFPA</option>
        <option value="inconnu">Inconnu</option>
       <option value="CNAM">CNAM</option>
       <option value="GRETA">GRETA</option>
       <option value="Privé">Privé</option>
       </select>
       <br>
       <input type="submit" name="creer" value="Créer">
</form>

</fieldset>
<?php require_once ("_piedpage.inc.php");?>