<head>
  <meta charset="utf-8" />
  <title>Ecrire une idée</title>
  <link rel="stylesheet" href="../public/css/tinycss.css">
  <script src="../public/js/editeur.js"></script> 
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>  
</head>
<style>
.space
{
  margin-left: 50px;
}
</style>
<?php $title = 'Ecrire une idée'; ?>
<?php ob_start(); ?>
<h1>Ecrire une nouvelle idée pour le monde</h1>
<div class="space">
    <form method="post" action="index.php?action=insertworldPost">        
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



