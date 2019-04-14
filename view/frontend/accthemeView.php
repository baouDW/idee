
<?php $title = 'Theme du jour'; ?>
<style type="text/css">
body
    {
      background-color: #5c3c3c;
    }  
</style>

<?php ob_start(); ?>
    
    <center class="container">      
      <h1 class="mt-4 mb-3">Theme du jour
      </h1>
      <p>Chaque jour un sujet de reflexion est proposer, tout types de theme sont aborder, n'hesitez pas a contribuer.<br> Vous avez a votre disposition une barre de recherche wikipedia pour ameliorer la comprehension des sujet sans avoir a quitter la page. </p>

      <div>
          <a class="link-theme" href="http://localhost/idee/index.php?action=themeV&id=5">Voir le theme du jour</a>        
      </div> 
    </center>

<?php $content = ob_get_clean(); ?>
<?php require('templateFront.html'); ?>

