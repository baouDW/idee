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
    
var $carrousel = $('#carrousel'), // on cible le bloc du carrousel
    $img = $('#carrousel .text-slide'), // on cible les images contenues dans le carrousel
    indexImg = $img.length - 1, // on définit l'index du dernier élément
    i = 0, // on initialise un compteur
    $currentImg = $img.eq(i); // enfin, on cible l'image courante, qui possède l'index i (0 pour l'instant)

$img.css('display', 'none'); // on cache les images
$currentImg.css('display', 'block'); // on affiche seulement l'image courante



$('.next').click(function(){ // image suivante

    i++; // on incrémente le compteur

    if( i <= indexImg ){
        $img.css('display', 'none'); // on cache les images
        $currentImg = $img.eq(i); // on définit la nouvelle image
        $currentImg.css('display', 'block'); // puis on l'affiche
    }
    else{
        i = indexImg;
    }

});

$('.prev').click(function(){ // image précédente

    i--; // on décrémente le compteur, puis on réalise la même chose que pour la fonction "suivante"

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
    setTimeout(function(){ // on utilise une fonction anonyme
            
        if(i < indexImg){ // si le compteur est inférieur au dernier index
      i++; // on l'incrémente
  }
  else{ // sinon, on le remet à 0 (première image)
      i = 0;
  }

  $img.css('display', 'none');

  $currentImg = $img.eq(i);
  $currentImg.css('display', 'block');

  slideImg(); // on oublie pas de relancer la fonction à la fin

    }, 7000); // on définit l'intervalle à 7000 millisecondes (7s)
}

slideImg(); // enfin, on lance la fonction une première fois

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