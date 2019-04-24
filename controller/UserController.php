<?php
//namespace idee;

//require './vendor/autoload.php';
require_once("Controller.php");

class UserController extends Controller
{

	public function membreView(){
		$user = $this->usermanager->getUser();
		require('./view/backend/userView.php');
	}

	public function signup(){
		$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$verifPseudo= $this->usermanager->verifPseudo($_POST['pseudo']);
		if ($verifPseudo)
			{          
	    		
	    		header('Location: view/frontend/signUpView.php?error=error');
			}
		else
			{
				$inscription= $this->usermanager->inscription($_POST['Nom'], $_POST['Prenom'], $_POST['pseudo'], $pass_hache, $_POST['email']);
				header('Location: ./index.php');
			}	
	}

	public function login(){
		$pseudoo=$_SESSION['pseudo'];
		$wposts= $this->postmanager->getWordlUserPosts($pseudoo);
		$eposts= $this->postmanager->getEntrepriseUserPosts($pseudoo);
		$pposts= $this->postmanager->getPolitiqueUserPosts($pseudoo);
		$sposts= $this->postmanager->getStoryUserPosts($pseudoo);
		$verifuser = $this->usermanager->verifUser($_POST['pseudo']);	
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
		$pseudoo=$_SESSION['pseudo'];
		$wposts= $this->postmanager->getAllWorldPosts();
		$eposts= $this->postmanager->getAllEntreprisePosts();
		$pposts= $this->postmanager->getAllPolitiquePosts();
		$sposts= $this->postmanager->getAllStoryPosts();
		require('./view/backend/crudView.php');
		
	}

	public function useraccess(){
		$pseudoo=$_SESSION['pseudo'];
		$wposts= $this->postmanager->getWordlUserPosts($pseudoo);
		$eposts= $this->postmanager->getEntrepriseUserPosts($pseudoo);
		$pposts= $this->postmanager->getPolitiqueUserPosts($pseudoo);
		$sposts= $this->postmanager->getStoryUserPosts($pseudoo);
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
		$SignalementPost= $this->signalmanager->SignalementMonde($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function signalWorldCo(){
		$SignalementPost= $this->signalmanager->SignalementWorldCom($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function signalEntreprise(){
		$SignalementPost= $this->signalmanager->SignalementEntreprise($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function signalEntrepriseCo(){
		$SignalementPost= $this->signalmanager->SignalementEntrepriseCom($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function signalPolitique(){
		$SignalementPost= $this->signalmanager->SignalementPolitique($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function signalPolitiqueCo(){
		$SignalementPost= $this->signalmanager->SignalementPolitiqueCom($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function signalStory(){
		$SignalementPost= $this->signalmanager->SignalementStory($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function signalStoryCo(){
		$SignalementPost= $this->signalmanager->SignalementStoryCom($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function signalthemeC(){
		$SignalemenThemeC= $this->signalmanager->SignalThemeCom($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

}