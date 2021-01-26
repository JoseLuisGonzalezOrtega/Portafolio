<?php
        echo "<a href='index.php?control=controlprojectes&operacio=showformnew'>Nou</a>";
	echo "<table border=1>";
    	foreach($res as $projecte) {
		echo "<tr>"; 
		echo "<td>".$projecte['codi']."</td>";
		echo "<td>".$projecte['nom']."</td>";
		echo "<td>".$projecte['descripcio']."</td>";
		echo "<td>".$projecte['dataInici']."</td>";
		echo "<td>".$projecte['dataFi']."</td>";
		echo "<td>".$projecte['estat']."</td>";
		
		echo "<td><a href='index.php?control=controlprojectes&operacio=delete&codi=".$projecte['codi']."'>
                     Esborrar</td>";
		echo "<td><a href='index.php?control=controlprojectes&operacio=showformupdate&codi=".$projecte['codi']."'>
                     Actualitzar</td>";
		echo "</tr>";
        }
        echo "</table>";

        if(isset($_SESSION['missatge'])) {
			echo $_SESSION['missatge'];
			unset($_SESSION['missatge']);
		}
?>
