

<style type="text/css">
body
    {
      background-color: #5c3c3c;
    }
  
</style>

<?php ob_start(); ?>
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Les dernières idées politiques
      </h1>

      <ol class="breadcrumb">
        Les dernières penssées
      </ol>
      

      <?php

      while ($data = $politiqueposts->fetch())
      {
      ?> 
      <!-- Blog Post -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <a href="#">
                <img class="img-fluid rounded img-post" src="view/frontend/images/book.jpg" alt="">
              </a>
            </div>
            <div class="col-lg-6">
              <h2 ><?= $data['title'] ?></h2>
              <p ><?= substr($data['content'], 0, 100); ?></p>
              <a href="index.php?id=<?= $data['id'] ?>&action=politiquepost" >Lire la suite &rarr;</a>
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
      $politiqueposts->closeCursor();
      ?>

      
      <?php
      $donner = $nbrpost->fetch();
      $nbrpage= ceil($donner['nbr']/4);         
      for ($i=1; $i<=$nbrpage; $i++){        
      ?>
        <a href="http://localhost/idee/index.php?action=listepolitique&page=<?= $i?>"><?= $i ?>/</a>
        
      <?php
        }
      ?>

  

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<?php $content = ob_get_clean(); ?>
<?php require('templateFront.html'); ?>