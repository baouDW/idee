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
<div class="bgded overlay" style="background-image:url('././images/demo/backgrounds/05.jpg');"> 
  <section id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Theme du jour</h6>
    <ul>
      <li><a href="index.php">Accueil</a></li>
      <li><a href="http://localhost/idee/index.php?action=acctheme">Accueil theme</a></li>
      <li><a href="index.php?id=<?= $_GET['id'] ?>&action=themeV">Theme du jour</a></li>
    </ul>
  </section>
</div>
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <div class="content"> 
      <?php
      while ($data = $theme->fetch())
      {
      ?>
      <div class="texte">
        <h1>Theme du jour</h1>
        <span>Le <?= $data['creation_date_fr'] ?></span>
        <p><?=$data['content']?> </p> 
      </div>
      <?php
       }
       ?>
<!---------------------     wiki         ---------------------------->
     <center><h3 style="margin-top: 20px">Recherche wikipedia</h3></center>
    <hr>
    <div class="col-lg-12" id="div">
      <center>
        <input type="text" id="fetch" style="border: 1px solid #a0a0a0; padding:5px;" placeholder="École de Copenhague" /><br>
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
                <figure class="avatar"><img class="img-prof" src="public/user_image/<?=$comment['author']?>.jpg" width="80" height="80" border="0" alt=""></figure>
                <address>
                By <a href="#"><?= htmlspecialchars($comment['author']) ?></a>
                </address>
                <p>Le <?=$comment['comment_date_fr']?></p>
              </header>
              <div class="comcont">
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                <a class="signaler" href="./index.php?action=signalthemecomm&amp;id=<?= $comment['id'] ?>">Signaler</a>
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
         
      
     


<script src="https://code.jquery.com/jquery-1.12.3.js"   integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc="   crossorigin="anonymous"></script>
<script type="text/javascript">  
 
function apelWiki(keyword){  
  var url="https://fr.wikipedia.org/w/api.php";

  $.ajax({
            type:"GET",
            url:url,
            data:{action:"opensearch",format:"json",search:keyword},
            dataType:"jsonp",
            success: function (data){                
                var result=data;
                $("#showdata").show();
                $("#res_row").empty();
                for (i=1;i<result[1].length;i++){
                  
                    $("#res_row").append("<div><div><a class='well 'href="+result[3][i]+"><h2>" + result[1][i]+ "</h2>" + "<p>" + result[2][i] + "</p></a></div></div>");
                }
                $("#res_row").append("</tr>");
              },
            error: function (error) 
                  {
                    alert(JSON.stringify(error));
                  }                 
  });

}
 
function search()
{
 var fetch= $("#fetch").val();
 apelWiki (fetch);
 }

</script>



