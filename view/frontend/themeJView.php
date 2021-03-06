<?php $title = 'Theme du jour'; ?>
<?php ob_start(); ?>
<style type="text/css">
.well
{
  color: black;
}
.well:hover
{
  color: #A2B70D;
}
</style>
<div class="bgded overlay" style="background-image:url('././public/images/demo/backgrounds/05.jpg');"> 
  <section id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Theme du jour</h6>
    <ul>
      <li><a href="index.php">Accueil</a></li>
      <li><a href="index.php?action=acctheme">Accueil theme</a></li>
      <li><a href="index.php?id=<?= $_GET['id'] ?>&action=themeV">Theme du jour</a></li>
    </ul>
  </section>
</div>
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <div class="content">       
      <div class="texte">
        <h1>Theme du jour</h1>
        <span>Le <?= $theme['creation_date_fr'] ?></span>
        <p><?=$theme['content']?> </p> 
      </div>
      
<!---------------------     wiki         ---------------------------->
      <center><h3 style="margin-top: 20px">Recherche wikipedia</h3></center>
      <hr>
      <div class="col-lg-12" id="div">
        <center>
          <input type="text" id="fetch" style="border: 1px solid #a0a0a0; padding:5px;" placeholder="Ecole de Copenhague" /><br>
          <button type="submit" class="btn btn-primary ml-2 p-1"  onclick="search()"> rechercher </button>
          <hr> 
        </center>
      </div>
      <div class="col-lg-12" id="div" >
        <div id="showdata" style=" display:none;">
          <h5 class="mt-2 text-center">
          Resultats
          </h5>
          <hr>
          <center>
            <div class="text-center col-lg-8 " style=" max-height: 400px;  overflow:auto; " >     
              <!-- balise ou sont affiché les resultats -->
              <div id="res_row" >
              </div>        
            </div>
          </center>
        </div>
       </div>
<!-------------------------------------------------------------->      
      <div id="comments">
        <?php
          if (isset($_SESSION['pseudo']) OR isset($_COOKIE['pseudo']))
          {
          ?>
          <br>
          <h2>Ecrire un commentaire</h2>
          <form action="./index.php?action=addthemeComment&amp;id=<?=$_GET['id']?>" method="post">
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
        while ($comment = $themeCom->fetch())
        {
        ?>
        <li>
          <article>
            <header>
              <figure class="avatar">
                <img class="img-prof" src="public/user_image/<?=$comment['author']?>.jpg" width="80" height="80" border="0" alt="">
              </figure>
              <address>
              By <a href="#"><?= htmlspecialchars($comment['author']) ?></a>
              </address>
              <p>Le <?=$comment['comment_date_fr']?></p>
            </header>
            <div class="comcont">
              <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
              <a class="signaler" href="./index.php?action=signalthemecomm&amp;id=<?= $comment['id'] ?>">Signaler</a>
              <hr> 
              <span class="signaturecom">
                <strong>Signature:</strong> <?= nl2br(htmlspecialchars($comment['signature'])) ?>
              </span>
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
     
<!---------------- Script ------------------------------->

<script src="https://code.jquery.com/jquery-1.12.3.js"   integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc="   crossorigin="anonymous">  
</script>

<script type="text/javascript">  
 
function apelWiki(keyword){  
  var url="https://fr.wikipedia.org/w/api.php";
  //requete Ajax
  $.ajax({
            type:"GET",
            url:url,
            data:{action:"opensearch",format:"json",search:keyword},
            dataType:"jsonp",
            success: function (data){                            
                var result=data;
                $("#showdata").show();
                $("#res_row").empty();
                // boucle pour afficher les données de l'api
                for (i=1;i<result[1].length;i++){                 
                    $("#res_row").append("<div><div><a class='well 'href="+result[3][i]+"><h2>" + result[1][i]+ "</h2>" + "<p>" + result[2][i] + "</p></a></div></div>");
                }
              },
            error: function (error) 
                  {
                    alert(JSON.stringify(error));
                  }                 
  });

}
 
function search()
{
// Recupere la valeur entré dans l'input  
var fetch= $("#fetch").val();
// Lance apelWiki avec la valeur a rechercher
apelWiki (fetch);
}

</script>



