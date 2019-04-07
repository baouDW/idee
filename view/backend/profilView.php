<!--
<form method="post" action="reception.php" enctype="multipart/form-data">
     
     <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
     <input type="file" name="mon_fichier" id="mon_fichier" /><br />
     <label for="titre">Titre du fichier (max. 50 caractères) :</label><br />
     <input type="text" name="titre" value="Titre du fichier" id="titre" />
     <input type="submit" name="submit" value="Envoyer" />
</form>
-->


<!DOCTYPE>
<html>
  <head>
    <title>Upload d'une image </title>
  </head>
  <body>
 	<form method="post" enctype="multipart/form-data">
     
     <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
     <input type="file" name="monfichier" id="mon_fichier" /><br />
     <label for="titre">Titre du fichier (max. 50 caractères) :</label><br />
     <input type="text" name="titre" value="Titre du fichier" id="titre" />
     <input type="submit" name="submit" value="Envoyer" />
</form>




<?php

$maxSize = 1023680;

var_dump($_FILES);
if (isset($_POST['submit']))
{
	echo "ya un fichier";


	if ($_FILES['monfichier']['error'])
	{
		echo "une erreur est survenue";
		die;
	}
	
	$fileSize = $_FILES['monfichier']['size'];

	if ($fileSize > $maxSize)
	{
		echo "Fichier trop gros";
		die;
	}
	
	
	$fileExt = strtolower(substr(strrchr($_FILES['monfichier']['name'], '.'),1));	
	$extention_accepter = array('jpg', 'jpeg', 'gif', 'png');

	if (in_array($fileExt,$extention_accepter))
	{
		echo "Extension correcte";
	} 

	//{$id_membre}
	
	$nom = "user_avatars/id_membre.".$fileExt;
	$resultat = move_uploaded_file($_FILES['monfichier']['tmp_name'],$nom);
	if ($resultat) 
	{
		echo "Transfert réussi";

	}
}

?>
  </body>
</html>