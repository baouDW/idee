
<?php
session_start();

function login(){
	$manager = new Manager();
	$posts= $manager->getWorldPosts();
	$verifuser = $manager->verifUser($_POST['pseudo']);	
	$isPasswordCorrect = password_verify($_POST['pass'], $verifuser['pass']);
	

	if ((!$verifuser) OR (!$isPasswordCorrect))
	{
           
        header('Location: view/frontend/loginView.php?error=error');
	}
	else
	{
    	if (($isPasswordCorrect) && ($_POST['pseudo'] == 'admin') && (!isset($_POST['rapel']))){
    		session_destroy();
	        session_start();
	        $_SESSION['id'] = $verifuser['id'];
	        $_SESSION['pseudo'] = $_POST['pseudo'];
	        require('./view/backend/crudView.php');
	    }
	    elseif (($isPasswordCorrect) && ($_POST['pseudo'] == 'admin') && (isset($_POST['rapel']))) {
	    	setcookie('id', $verifuser['id'], time() + 365*24*3600, null, null, false, true); 
			setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
			require('/view/backend/crudView.php');
	    }
	    elseif (($isPasswordCorrect) && (!isset($_POST['rapel']))){
	    	session_start();
	        $_SESSION['id'] = $verifuser['id'];
	        $_SESSION['pseudo'] = $_POST['pseudo'];
	        header('Location: ./index.php');
	    }
	    elseif (($isPasswordCorrect) && (isset($_POST['rapel'])) && ($_POST['pseudo'] !== 'admin')) {
	    	setcookie('id', $verifuser['id'], time() + 365*24*3600, null, null, false, true); 
			setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
			header('Location: ./index.php');
	    }
	    else{
	    	throw new Exception('Mauvais identifiant ou mot de passe !!!');
	    }
	}
}