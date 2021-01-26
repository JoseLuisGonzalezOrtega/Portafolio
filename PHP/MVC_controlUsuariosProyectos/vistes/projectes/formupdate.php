<h3>Actualitzar Projecte</h3>

<form method="POST" action="index.php?control=controlprojectes&operacio=update&codi=<?php echo $projecte['codi']; ?>">
  Nom <input type="text" name="nom" value="<?php echo $projecte['nom']; ?>"><br>
  Descripcio <input type="text" name="descripcio" value="<?php echo $projecte['descripcio']; ?>" ><br>
  Data Inici <input type="date" name="dataInici" value="<?php echo $projecte['dataInici']; ?>"><br>
  Data Fi <input type="date" name="dataFi" value="<?php echo $projecte['dataFi']; ?>"><br>
  <select name="estat">
    <option value="0" <?php  if($projecte['estat']==0) echo 'SELECTED'; ?> >Obert</option>
    <option value="1" <?php  if($projecte['estat']==1) echo 'SELECTED'; ?>>Tancat</option>
  </select><br>
  <input type="submit" value="Actualitzar">
</form>
