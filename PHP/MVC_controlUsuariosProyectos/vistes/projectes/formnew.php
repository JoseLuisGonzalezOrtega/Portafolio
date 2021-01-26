<h3>Nou Projecte</h3>
<form method="POST" action="index.php?control=controlprojectes&operacio=store">
  Nom <input type="text" name="nom"><br>
  Descripcio <input type="text" name="descripcio"><br>
  Data Inici <input type="date" name="dataInici"><br>
  Data Fi <input type="date" name="dataFi"><br>
  <select name="estat">
    <option value="0">Obert</option>
    <option value="1">Tancat</option>
  </select><br>
  <input type="submit" value="Nou">
<form>
