<?php
require('controller/controller.php');
$id=44;
if ($_GET["action"] == "refreshEntreprisepost")
{
  //echo "<u>Proverbe chinois N° </u><br><br>";
  echo "<b>jjj</b>".$id;
	refreshEntreprisepost();
}    
else
  echo "<font color=red>Entrez un nombre compris entre 1 et 10 !</font>";  
  
?>
