<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Accueil</title>
<link rel="icon" type="image/ico" href="favicon.ico" />
<link href="https://fonts.googleapis.com/css?family=Oswald:300,400|Roboto:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php $title = 'accueil'; ?>
<style type="text/css">

#carrousel
{
  position:relative;
  height:400px;
  width:700px;
  margin:auto;
  margin-top: 10%;
  background-color:white ;
}


.text-slide
{
  padding: 10%;
}
.controls
{
  text-align: center;
}
.masthead
{
  margin-top: -25px;
  height: 600px;
}
</style>

<script type="text/javascript">
  $(document).ready(function(){
    
  var $carrousel = $('#carrousel'), 
    $img = $('#carrousel .text-slide'), 
    indexImg = $img.length - 1, 
    i = 0, 
    $currentImg = $img.eq(i); 

  $img.css('display', 'none');
  $currentImg.css('display', 'block');

  $('.next').click(function(){ 

    i++; 

    if( i <= indexImg ){
      $img.css('display', 'none'); 
      $currentImg = $img.eq(i); 
      $currentImg.css('display', 'block'); 
    }
    else{
      i = indexImg;
    }

});

  $('.prev').click(function(){ 
    i--; 
    if( i >= 0 ){
      $img.css('display', 'none');
      $currentImg = $img.eq(i);
      $currentImg.css('display', 'block');
    }
    else{
      i = 0;
    }
});

  function slideImg(){
    setTimeout(function(){ 
            
      if(i < indexImg){ 
        i++; 
      }
      else{ 
        i = 0;
      }

  $img.css('display', 'none');

  $currentImg = $img.eq(i);
  $currentImg.css('display', 'block');

  slideImg();
  
  }, 7000); 
}

slideImg(); 

});
</script>


</head>
<?php ob_start(); ?>
<body>
  <div class="bgded overlay" style="background-image:url('images/demo/backgrounds/06.jpg');"> 
   <section id="pageintro" class="hoc clear">
    <div> 
      <!-- ################################################################################################ -->
      <h2 class="heading">Inspire le monde</h2>
      <p>Venez partager vos idée et inspirez le monde</p>
      <footer><a class="btn" href="index.php?action=acctheme">Theme du jour</a></footer>
      <!-- ################################################################################################ -->
    </div>
  </section>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h6 class="heading">Categories</h6>
      <p>Accedez aux differentes sections du site.</p>
    </div>
    <ul class="nospace group services">
      <li class="one_quarter first">
        <article><a href="#"><i class="fa fa-3x fa-500px"></i></a>
          <h6 class="heading font-x1"><a href="index.php?action=listworldpost">Histoires</a></h6>
          <p>Partager vos idées de livre, scenarios, films et de romans</p>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="#"><i class="fa fa-3x fa-lastfm"></i></a>
          <h6 class="heading font-x1"><a href="index.php?action=listeentreprise">Entreprise</a></h6>
          <p>Partager vos idées d'entreprise innovante ou testez votre idée en la presentant a la communauté</p>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="#"><i class="fa fa-3x fa-puzzle-piece"></i></a>
          <h6 class="heading font-x1"><a href="index.php?action=listepolitique">Politique</a></h6>
          <p>Recreez la politique en partageant des idées nouvelles</p>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="#"><i class="fa fa-3x fa-ravelry"></i></a>
          <h6 class="heading font-x1"><a href="index.php?action=listestory">Planete</a></h6>
          <p>Proposez et venez debatre d'idée pour un monde meilleur.</p>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </section>
</div>
  
</body>
<?php $content = ob_get_clean(); ?>
<?php require('templateFront.html'); ?>
</html>