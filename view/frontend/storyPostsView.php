<?php $title = 'Idée histoire'; ?>
<style type="text/css">
body
{
  background-color: #5c3c3c;
}  
.post-preview
{
  display: flex;
  margin-bottom: 30px;
  border: solid;
  width: 80%;
}
</style>
<?php ob_start(); ?>
    <!-- Page Content -->
    <div class="container">      
      <h1 class="mt-4 mb-3">Les dernières idées d'histoires
      </h1>    
      <?php
      while ($data = $storyposts->fetch())
      {
      ?> 
      <!-- Blog Post -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="row post-preview">
            <div class="col-lg-6">
              <a href="#">
                <img class="img-fluid rounded img-post" src="public/images/book.jpg" alt="">
              </a>
            </div>
            <div class="col-lg-6">
              <h2 ><?= $data['title'] ?></h2>
              <p ><?= substr($data['content'], 0, 100); ?></p>
              <a href="index.php?id=<?= $data['id'] ?>&action=storypost" >Lire la suite &rarr;</a>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted">
         Poster le <?= $data['creation_date_fr'] ?> par
          <a href="#"><?= $data['author'] ?></a>
        </div>
      </div>
      <?php
      }
      $storyposts->closeCursor();
      ?>
      <?php
      $donner = $nbrpost->fetch();
      $nbrpage= ceil($donner['nbr']/4);         
      for ($i=1; $i<=$nbrpage; $i++){        
      ?>
        <a href="http://localhost/idee/index.php?action=listestory&page=<?= $i?>"><?= $i ?>/</a>         
      <?php
        }
      ?>
<?php $content = ob_get_clean(); ?>
<?php require('templateFront.html'); ?>