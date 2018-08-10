
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

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3"><?= $post['title'] ?>
        <small>de
          <a href="#"><?= $post['author'] ?></a>
        </small>
      </h1>
      <!-- Date/Time -->
          
      <ol class="breadcrumb">
        <?= $post['creation_date_fr'] ?>
      </ol>

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
          <div class="post">         

            <!-- Post Content -->
            <p class="lead">
              <?= $post['content']?>              
            </p>
          </div>
          <div class="avis">
            <p>
              <div class="avis-item"></div>
                <div>
                  <iframe src="http://www.facebook.com/plugins/like.php?href=http://localhost/projet5/index.php?id=39&action=comm/page.html&layout=box_count&show_faces=true&width=65&action=like&font=arial&colorscheme=light&height=65" 
  scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:65px; height:65px; margin-top:3px;" allowTransparency="true"></iframe>
                </div>
                <div>
                  <a href="http://twitter.com/share" class="twitter-share-button" 
  data-count="vertical" data-via="InfoWebMaster">Tweet</a>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
                </div>

              <script type="text/javascript" src="https://apis.google.com/js/plusone.js">
{lang: 'fr'}
</script>
                <!-- <span class="avis-jaime">j'aime</span>
                <span class="nbr-jaime"><?= $post['jaime']?></span> -->
              
              <div class="avis-item"><a href="./index.php?action=signalPost&amp;id=<?= $post['id'] ?>">signaler</a></div>
            </p>
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
              <form action="./index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
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
          
          <?php
          while ($comment = $comments->fetch())
          {
          ?>
          <!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?= htmlspecialchars($comment['author']) ?></h5>
              <?= nl2br(htmlspecialchars($comment['comment'])) ?>
            </div><a href="./index.php?action=signal&amp;id=<?= $comment['id'] ?>">Signaler</a>
          </div>
            <?php
            }
            ?>
            <?php $content = ob_get_clean(); ?>
            
            <?php require('templateFront.html'); ?>
          

        </div>

        

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php 
     echo $_SERVER['REMOTE_ADDR'];
     //echo"hhhhhh";
     echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      ?>

    <!-- Bootstrap core JavaScript -->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="public/js/avis.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    
    <script type="text/javascript">



      $('.avis-jaime').one('click',function(){        
        var e= Number($('.nbr-jaime').text());
        console.log(e);
        $('.nbr-jaime').text(e+1);
        var param = 'action=' + 'jaimes' +'&'+ 'nbrjaime=' + (e+1) +'&'+ 'id=' + <?= $_GET['id'] ?>;
        $('.nbr-jaime').load('index.php',param);
});
    </script>

    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partager</a></div>

<a href="https://twitter.com/share?url=http://<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">;<img src="tweet.png" alt="tweet"/>;</a>;


<a href="http://www.facebook.com/share.php?u=http://<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>r"><img src="like.png" alt="like"/></a>

<a href="https://plus.google.com/share?url=http://<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>&amp;hl=fr"><img src="plusone.png" alt="plusone"/></a>
  </body>
</html>
