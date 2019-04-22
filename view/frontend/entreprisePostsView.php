<?php $title = 'Idée entreprise'; ?>

<?php ob_start(); ?>
<!-- Page Content -->
<div class="container">
  <h1 class="mt-4 mb-3">Les dernières idées entreprise
  </h1>      
  <?php
  while ($data = $entrepriseposts->fetch())
  {
  ?> 
  <!-- Blog Post -->
  <div>
    <div class="card mb-4 post-preview">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <a href="#">
              <img class="img-fluid rounded img-post" src="public/images/book.jpg" alt="">
            </a>
          </div>
          <div class="col-lg-6">
            <h2 ><?= $data['title'] ?></h2>
            <p ><?= substr($data['content'], 0, 100); ?></p>
            <a href="index.php?id=<?= $data['id'] ?>&action=entreprisepost" >Lire la suite &rarr;</a>
          </div>
        </div>
      </div>
      <div class="card-footer text-muted">
       Poster le <?= $data['creation_date_fr'] ?> par
        <a href="#"><?= $data['author'] ?></a>
      </div>
    </div>
  </div>
  <?php
  }
  $entrepriseposts->closeCursor();
  ?>

  <?php
  // compte le nombre de poste ds la base dd
  $donner = $nbrpost->fetch();
  // calcule le nombre de page nbr post diviser par 4
  $nbrpage= ceil($donner['nbr']/4);  
  //boucle pour afficher la pagination en fonction du nbr de page.       
  for ($i=1; $i<=$nbrpage; $i++){        
  ?>
    <a href="index.php?action=listeentreprise&page=<?= $i?>"><?= $i ?>/</a>         
  <?php
    }
  ?>     
   
<?php $content = ob_get_clean(); ?>
<?php require('templateFront.html'); ?>

