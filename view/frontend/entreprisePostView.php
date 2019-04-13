<?php $title = 'Idée entreprise'; ?>
<?php ob_start(); ?>
 <!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('http://www.panoram-art.com/galerie/voyage/6451-voyage-maroc-Ciel-marocain-panorama-sentucq.h.jpg');"> 
  <!-- ################################################################################################ -->
  
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <section id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <h6 class="heading">Idée entreprise</h6>
    <!-- ################################################################################################ -->
    <ul>
      <li><a href="#">Accueil</a></li>
      <li><a href="#">Liste Entreprise</a></li>
      <li><a href="#"><?= htmlspecialchars($post['title']) ?></a></li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="content"> 
      <!-- ################################################################################################ -->
      <h1><?= htmlspecialchars($post['title']) ?> de <?= htmlspecialchars($post['author']) ?></h1>
      <span>Le <?= htmlspecialchars($post['creation_date_fr']) ?></span>
      <img class="imgr borderedbox inspace-5" src="././images/demo/livre.jpg" alt="">
      <p><?= htmlspecialchars($post['content'])?> </p>
      
      <div id="comments">

        <?php
          if (isset($_SESSION['pseudo']) OR isset($_COOKIE['pseudo']))
          {
          ?>
        <h2>Ecrire un commentaire</h2>
        <form action="./index.php?action=addEntrepriseComment&amp;id=<?= $post['id'] ?>" method="post">
          <!-- <div class="one_third first">
            <label for="name">Name <span>*</span></label>
            <input type="text" name="name" id="name" value="" size="22" required>
          </div>
          <div class="one_third">
            <label for="email">Mail <span>*</span></label>
            <input type="email" name="email" id="email" value="" size="22" required>
          </div>
          <div class="one_third">
            <label for="url">Website</label>
            <input type="url" name="url" id="url" value="" size="22">
          </div> -->
          <div class="block clear">
            <label for="comment">Votre Commentaire</label>
            <textarea name="comment" id="comment" cols="25" rows="10"></textarea>
          </div>
          <div>
            <input type="submit" name="submit" value="Envoyer">
            &nbsp;
            
          </div>
        </form>

        <?php
          }
          else
          {
          ?>
          <a href="view/frontend/loginView.php">veuillez vous identifier pour ecrire un commentaire</a>
          <?php
          }
          ?> 

      </div>



        <h2>Commentaires</h2>
        <ul>
            <?php
            while ($comment = $comments->fetch())
            {
            ?>
          <li>
            <article>
              <header>
                <figure class="avatar"><img class="img-prof" src="public/user_image/<?=$comment['author']?>.jpg" width="80" height="80" border="0" alt=""></figure>
                <address>
                By <a href="#"><?= htmlspecialchars($comment['author']) ?></a>
                </address>
                <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
              </header>
              <div class="comcont">
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                <a class="signaler" href="./index.php?action=signalEntrepriseCo&amp;id=<?= $comment['id'] ?>">Signaler</a>
                <hr> 
              <span class="signaturecom"><strong>Signature:</strong> <?= nl2br(htmlspecialchars($comment['signature'])) ?></span>

              <hr>
              </div>
            </article>
          </li> 
              <?php
              }
              ?>
        </ul>
    </div>
    <div class="clear"></div>
  </main>
</div>

  
    

      
      
<?php $content = ob_get_clean(); ?>            
<?php require('templateFront.html'); ?>         
         
      
    