<?php
//namespace idee\controller;

require './vendor/autoload.php';

class UserController
{
	public function membreView(){
		$usermanager = new idee\UsersManager();
		$user = $usermanager->getUser();
		require('./view/backend/userView.php');
	}

	public function signup(){
		$usermanager = new idee\UsersManager();
		$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$verifPseudo= $usermanager->verifPseudo($_POST['pseudo']);
		if ($verifPseudo)
			{          
	    		
	    		header('Location: view/frontend/signUpView.php?error=error');
			}
		else
			{
				$inscription= $usermanager->inscription($_POST['Nom'], $_POST['Prenom'], $_POST['pseudo'], $pass_hache, $_POST['email']);
				header('Location: ./index.php');
			}	
	}

	public function login(){
		$usermanager = new idee\UsersManager();
		$postmanager = new idee\PostsManager();
		$pseudoo=$_SESSION['pseudo'];
		$wposts= $postmanager->getWordlUserPosts($pseudoo);
		$eposts= $postmanager->getEntrepriseUserPosts($pseudoo);
		$pposts= $postmanager->getPolitiqueUserPosts($pseudoo);
		$sposts= $postmanager->getStoryUserPosts($pseudoo);
		$verifuser = $usermanager->verifUser($_POST['pseudo']);	
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
		        header('Location: ./index.php');
		    }
		    elseif (($isPasswordCorrect) && ($_POST['pseudo'] == 'admin') && (isset($_POST['rapel']))) {
		    	setcookie('id', $verifuser['id'], time() + 365*24*3600, null, null, false, true); 
				setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
				header('Location: ./index.php');
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

	public function adminaccess(){
		$postmanager = new idee\PostsManager();
		$pseudoo=$_SESSION['pseudo'];
		$wposts= $postmanager->getAllWorldPosts();
		$eposts= $postmanager->getAllEntreprisePosts();
		$pposts= $postmanager->getAllPolitiquePosts();
		$sposts= $postmanager->getAllStoryPosts();
		require('./view/backend/crudView.php');
		
	}

	public function useraccess(){
		$postmanager = new idee\PostsManager();
		$pseudoo=$_SESSION['pseudo'];
		$wposts= $postmanager->getWordlUserPosts($pseudoo);
		$eposts= $postmanager->getEntrepriseUserPosts($pseudoo);
		$pposts= $postmanager->getPolitiqueUserPosts($pseudoo);
		$sposts= $postmanager->getStoryUserPosts($pseudoo);
		require('./view/backend/userbackView.php');
	}

	public function deconexion(){
			
		session_start();
		
		$_SESSION = array();
		session_destroy();
		
		setcookie('id', '');
		setcookie('pseudo', '');
		header('Location: ./index.php');
	}


//Signalements--------------------------------------

	public function signalMonde(){
		$signalmanager = new idee\SignalManager();
		$SignalementPost= $signalmanager->SignalementMonde($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function signalWorldCo(){
		$signalmanager = new idee\SignalManager();
		$SignalementPost= $signalmanager->SignalementWorldCom($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function signalEntreprise(){
		$signalmanager = new idee\SignalManager();
		$SignalementPost= $signalmanager->SignalementEntreprise($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function signalEntrepriseCo(){
		$signalmanager = new idee\SignalManager();
		$SignalementPost= $signalmanager->SignalementEntrepriseCom($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function signalPolitique(){
		$signalmanager = new idee\SignalManager();
		$SignalementPost= $signalmanager->SignalementPolitique($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function signalPolitiqueCo(){
		$signalmanager = new idee\SignalManager();
		$SignalementPost= $signalmanager->SignalementPolitiqueCom($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function signalStory(){
		$signalmanager = new idee\SignalManager();
		$SignalementPost= $signalmanager->SignalementStory($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function signalStoryCo(){
		$signalmanager = new idee\SignalManager();
		$SignalementPost= $signalmanager->SignalementStoryCom($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function signalthemeC(){
		$signalmanager = new idee\SignalManager();
		$SignalemenThemeC= $signalmanager->SignalThemeCom($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

}