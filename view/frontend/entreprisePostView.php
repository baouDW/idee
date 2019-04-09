
<?php ob_start(); ?>
    <!-- Page Content -->
    <style type="text/css">

      .post
      {
        border: solid;
        text-align: center;
        padding: 20px;
        background-color: white;
      }
      .avis
      {
        display: flex;
        justify-content: space-around;
      }
      .avis-item
      {
        margin: 10px;
      }
    </style>
    <div class="container">
      <h1 class="title-cat">Idée d'entreprise</h1>
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3"><?= htmlspecialchars($post['title']) ?>
        <small>de
          <a href="#"><?= htmlspecialchars($post['author']) ?></a>
        </small>
      </h1>
      <!-- Date/Time -->
          
      <ol class="breadcrumb">
        <?= htmlspecialchars($post['creation_date_fr']) ?>
      </ol>

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-12">
          <div class="post">         

            <!-- Post Content -->
            <p class="lead">
              <?= htmlspecialchars($post['content'])?>              
            </p>
          </div>
          
          <div class="avis-item"><a class="signaler" href="./index.php?action=signalEntreprise&amp;id=<?= $post['id'] ?>">signaler</a>
          </div>
          <hr>
          <?php
          if (isset($_SESSION['pseudo']) OR isset($_COOKIE['pseudo']))
          {
          ?>
          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Ecrire un commentaire:</h5>
            <div class="card-body">
              <form action="./index.php?action=addEntrepriseComment&amp;id=<?= $post['id'] ?>" method="post">
                <div class="form-group">
                  <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              
            </div>
          </div>
          <?php
          }
          else
          {
          ?>
          <a href="view/frontend/loginView.php">veuillez vous identifier pour ecrire un commentaire</a>
          <?php
          }
          ?>
          
          <button class="refresh btn btn-primary">rafraichir les commentaires</button>
          <!-- Single Comment -->
          <div class="allcomment">
              <?php
            while ($comment = $comments->fetch())
            {
            ?>
              <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="public/user_image/<?=$comment['author']?>.jpg" alt="" width="80" height="80" border="0">
                <div class="media-body">
                  <h5 class="mt-0"><?= htmlspecialchars($comment['author']) ?></h5>
                  <?= nl2br(htmlspecialchars($comment['comment'])) ?>
                </div><a class="signaler" href="./index.php?action=signalEntrepriseCo&amp;id=<?= $comment['id'] ?>">Signaler</a>
              </div>     
              <hr>     
              <?php
              }
              ?>
          </div>
            <?php $content = ob_get_clean(); ?>
            
            <?php require('templateFront.html'); ?>
          

        </div>

        

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->

    <?php 
     echo $_SERVER['REMOTE_ADDR'];
    echo $_GET['id'];
     echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      ?>

    <!-- Bootstrap core JavaScript -->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="public/js/avis.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script type="text/javascript">



    $('.refresh').on('click',function(){ 
      
      $('.allcomment').text('');
      var param = 'action=refreshEntreprisepost';
      $('.allcomment').load('index.php',param);
      //$.post('refresh.php',function(data){
        //$('.media').html(data);
      });
        
    
    </script>

    
  </body>
</html>
