<?php $title = 'Ecrire un article'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />    
    <link rel="stylesheet" href="../public/css/tinycss.css">
    <script src="../public/js/editeur.js"></script>    
  </head>
  <body>
    <style>
      .space
      {
        margin-left: 50px;
      }
    </style>

<?php ob_start(); ?>
<h1>Ecrire une nouvelle idée politique</h1>
<div class="space">
    <form method="post" action="index.php?action=insertpolitiquePost">
        <p>
           <label for="titre">
          Titre
           </label>
           <br />           
           <input type="text" name="titre">       
       </p>       
       <p>
           <label for="texte">
          Texte
           </label>
           <br />           
           <textarea name="texte" id="texte" rows="10" cols="50"></textarea>       
       </p>
       <p><input type="submit" name="ajouter" value="Ajouter un article"></p>
    </form>
</div>
<h2 class="space">Mes publications précédentes</h2>
<?php
while ($data = $posts->fetch())
{
?>    
 <div class="space">
    <h3>
        <?= $data['title'] ?>
    </h3>
            
    <p>
        <?= nl2br($data['content']) ?>            
    </p>
</div> 
<?php
}
$posts->closeCursor();
?> 
<?php $content = ob_get_clean(); ?>
<?php require('templateBackend.php'); ?>
  </body>
</html>

