<?php $title = 'Theme du jour'; ?>
<?php
ob_start();
?>

<style type="text/css">
    body
    {
    	background-color: #fff;
    }
    .container
    {
    	border-color: red;
    }
    .theme-j
    {
    	text-align: center;
    	margin-bottom: 50px;
    	border: solid;
    	width: 100%;
    	margin: auto;
      background-color: white;
    }
    .commentaire
    {
    	margin:auto;
      margin-top: 100px;
    	border: solid;
    	width: 70%;
    }
    .media
      {
        margin-left: auto;
      }
      h1
      {
        text-align: center;
      }
</style>
</head>
<body>
  <h1>Theme du jour</h1>
	<div class="container">
		<div class="row theme-j">
			<div class="col-lg-12 citation">
    <?php
    while ($data = $theme->fetch())
    {
    ?>    
     <div class="space">                       
        <p>
            <?= nl2br($data['content']) ?>            
        </p>
    </div> 
	   <?php
     }
     ?>
			</div>
		</div>

<!--------------------- Recherche Wikipedia  ----------------------------->
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
 <!------------------------ commentaire ----------------------->
		<div class="row commentaire">
			<div class="col-lg-12 ">commentaire
				<form action="./index.php?action=addthemeComment&amp;id=<?=$_GET['id']?>" method="post">
	         <div class="form-group">
	           <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
	         </div>
	         <button type="submit" class="btn btn-primary">Submit</button>
        </form>
			</div>
		</div>
		<hr>
    <div class="allcomment">
    <?php
    while ($comment = $themeCom->fetch())
    {
    ?>
    <div class ="singlecom">
      <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="public/user_image/<?=$comment['author']?>.jpg" alt="" width="80" height="80" border="0">
        <div class="media-body">
          <h5 class="mt-0"><?= htmlspecialchars($comment['author']) ?></h5>
          <?= nl2br(htmlspecialchars($comment['comment'])) ?>
        </div><a class="signaler" href="./index.php?action=signalthemecomm&amp;id=<?= $comment['id'] ?>">Signaler</a>
      </div>
      <hr> 
      <span class="signaturecom"><?= nl2br(htmlspecialchars($comment['signature'])) ?></span> 
    </div>
      <?php
      }
      ?>
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
                  
                    $("#res_row").append("<div><div class='well'><a href="+result[3][i]+"><h2>" + result[1][i]+ "</h2>" + "<p>" + result[2][i] + "</p></a></div></div>");
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
</body>


