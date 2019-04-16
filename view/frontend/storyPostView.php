<?php $title = 'Idée histoire'; ?>
<?php ob_start(); ?>
<div class="bgded overlay" style="background-image:url('././public/images/demo/backgrounds/05.jpg');"> 
  <section id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Idée histoire</h6>
    <ul>
      <li><a href="index.php">Accueil</a></li>
      <li><a href="index.php?action=listestory">Liste story</a></li>
      <li><a href="index.php?id=<?= $_GET['id'] ?>&action=storypost"><?= htmlspecialchars($post['title']) ?></a></li>
    </ul>
  </section>
</div>
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <div class="content"> 
      <h1><?= htmlspecialchars($post['title']) ?></h1>de <?= htmlspecialchars($post['author']) ?>
      <span>Le <?= htmlspecialchars($post['creation_date_fr']) ?></span>
      <img class="imgr borderedbox inspace-5" src="././public/images/demo/livre.jpg" alt="">
      <p><?= htmlspecialchars($post['content'])?> </p>      
      <div id="comments">
        <?php
          if (isset($_SESSION['pseudo']) OR isset($_COOKIE['pseudo']))
          {
          ?>
          <br>
        <h2>Ecrire un commentaire</h2>
        <form action="./index.php?action=addStoryComment&amp;id=<?= $post['id'] ?>" method="post">
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
                  <p>Le <?=$comment['comment_date_fr']?></p>
                </header>
                <div class="comcont">
                  <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                  <a class="signaler" href="./index.php?action=signalStoryCo&amp;id=<?= $comment['id'] ?>">Signaler</a>
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