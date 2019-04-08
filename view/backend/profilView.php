<?php 
//session_start();
?>
<?php ob_start(); ?>
<!DOCTYPE>
<html>
  <head>
    <title>Upload d'une image </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
  	<div class="container">	    
	    <div>
		    <center>
		    	<img src="././public/user_image/<?= $_SESSION['pseudo'] ?>.jpg" name="aboutme" width="120" height="120" border="0"></a><br>
		    	<button class="buttontest">Ajouter/changer</button>
		    	<center>
					<div class="add-pic">
		  				<p><strong>Cliquez sur parcourir pour ajouter ou modifier la photo de profil</strong></p>
		 				<form method="post" action="index.php?action=sendimage" enctype="multipart/form-data">	     
		     				<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
		     				<input type="file" name="monfichier" id="mon_fichier" /><br />
		     				<input type="submit" name="submit" value="Envoyer" />
						</form>
					</div>
				</center>
		        <h3><?= $_SESSION['pseudo'] ?></h3>
		        <span><strong>Date d'inscription: </strong></span>
		        <span><?= $resultat['date_inscription']?></span><br>
		        <span><strong>Nom: </strong></span>
		        <span><?= $resultat['nom']?></span><br>
		        <span><strong>Prenom: </strong></span>
		        <span><?= $resultat['prenom']?></span><br>
		        <span><strong>Email: </strong></span>
		        <span><?= $resultat['email']?></span><br>
		    </center>
		    
	        <hr>
	        <center>
	        	<p>
	        		<strong>Signature: </strong>
	        		<br>
	            	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem dui, tempor sit amet commodo a, vulputate vel tellus.
	        	</p>
	        	<br>
	        </center>
	    </div>                         
    </div>
</div>






<center>
	<div class="add-pic">
	  	<h2>Ajoutez une photo de profil</h2>
	 	<form method="post" enctype="multipart/form-data">
	     
	     <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
	     <input type="file" name="monfichier" id="mon_fichier" /><br />
	     <input type="submit" name="submit" value="Envoyer" />
		</form>
	</div>
</center>



<?php $content = ob_get_clean(); ?>
<?php require('templateBackend.php'); ?>


<script type="text/javascript">
	$('.add-pic').hide();
	$('.buttontest').one('click',function(){ 
        $('.add-pic').show('slow/400/fast');
	});
</script>


<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  </body>
</html>