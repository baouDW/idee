<form method="post" action="reception.php" enctype="multipart/form-data">
     
     <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
     <input type="file" name="mon_fichier" id="mon_fichier" /><br />
     <label for="titre">Titre du fichier (max. 50 caractères) :</label><br />
     <input type="text" name="titre" value="Titre du fichier" id="titre" />
     <input type="submit" name="submit" value="Envoyer" />
</form>
