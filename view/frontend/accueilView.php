<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Accueil</title>
<link href="https://fonts.googleapis.com/css?family=Oswald:300,400|Roboto:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


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
  <div id="carrousel"> 
    <a href="index.php?action=themeV&id=4">         
      <div class="text-slide">
        <?php
        while ($data = $theme->fetch())
        {
        ?>                  
        <h3>Theme du jour</h3>
        <p><?= nl2br($data['content']) ?></p>
        <?php
        }
        ?>
      </div>
    </a>
    <a href="">                          
      <div class="text-slide">                                 
        <h3>Les dernieres idée</h3>
        <p>
          consultez les derniers posts ou publiez une idée dans les differentes categories. 
        </p>                
      </div> 
    </a>        
    <a href="">                          
      <div class="text-slide">                                 
        <h3>Dernière idée politique</h3>
        <p>
          Donnez votre avis, reagissez et participer aux idées.
        </p>                
      </div> 
    </a>    
  </div>

  <div class="controls"> 
    <span class="prev">Precedent</span> <span class="next">Suivant</span> 
  </div>
</body>
<?php $content = ob_get_clean(); ?>
<?php require('templateFront.html'); ?>
</html>