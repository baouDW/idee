<?php
//namespace idee;

//use idee\PostsManager;
//require './vendor/autoload.php';
require_once("Controller.php");

class CrudController extends Controller
{

	public function insertworldP(){
		$insertPost= $this->postmanager->insertWorldPost($_POST['titre'], $_POST['texte'], $_SESSION['pseudo']);	
		header('Location: ./index.php?action=createworldView');
	}
	public function insertentrepriseP(){
		$insertPost= $this->postmanager->insertEntreprisePost($_POST['titre'], $_POST['texte'], $_SESSION['pseudo']);	
		header('Location: ./index.php?action=createentrepriseView');
	}
	public function insertpolitiqueP(){
		$insertPost= $this->postmanager->insertPolitiquePost($_POST['titre'], $_POST['texte'], $_SESSION['pseudo']);	
		header('Location: ./index.php?action=createpolitiqueView');
	}
	public function insertstoryP(){
		$insertPost= $this->postmanager->insertStoryPost($_POST['titre'], $_POST['texte'], $_SESSION['pseudo']);	
		header('Location: ./index.php?action=createstoryView');
	}
	public function insertT(){
		$insertTheme= $this->postmanager->insertTheme($_POST['texte']);	
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}



	// Aller a la page pour modifier les posts-----------
	public function updateworldView(){
		$post= $this->postmanager->getWorldPost($_GET['id']);
		require('./view/backend/updateView.php');
	}

	public function updateentrepriseView(){
		$post= $this->postmanager->getEntreprisePost($_GET['id']);
		require('./view/backend/updateView.php');
	}

	public function updatepolitiqueView(){
		$post= $this->postmanager->getPolitiquePost($_GET['id']);
		require('./view/backend/updateView.php');
	}

	public function updatestoryView(){
		$post= $this->postmanager->getStoryPost($_GET['id']);
		require('./view/backend/updateView.php');
	}


	// crée les posts-----------------------------------
	public function createworldView(){
		$pseudoo=$_SESSION['pseudo'];
		$posts= $this->postmanager->getWordlUserPosts($pseudoo);
		require('./view/backend/createworldView.php');
	}
	public function createentrepriseView(){
		$pseudoo=$_SESSION['pseudo'];
		$posts= $this->postmanager->getEntrepriseUserPosts($pseudoo);
		require('./view/backend/createentrepriseView.php');
	}
	public function createpolitiqueView(){
		$pseudoo=$_SESSION['pseudo'];
		$posts= $this->postmanager->getPolitiqueUserPosts($pseudoo);
		require('./view/backend/createpolitiqueView.php');
	}
	public function createstoryView(){
		$pseudoo=$_SESSION['pseudo'];
		$posts= $this->postmanager->getStoryUserPosts($pseudoo);
		require('./view/backend/createstoryView.php');
	}
	public function createTheme(){
		$theme= $this->postmanager->getTheme();
		require('./view/backend/createthemeView.php');
	}

	public function profilView(){
		$pseudo=$_SESSION['pseudo'];
		$resultat = $this->usermanager->getOneUser($pseudo);
		require('./view/backend/profilView.php');
	}

	// modifier les posts--------------------------------
	public function update(){
		$update= $this->postmanager->UptdatePost($_POST['titre'], $_POST['texte'], $_GET['id']);
		header('Location: ./index.php?action=adminaccess');
	}
	public function updateworld(){
		$post= $this->postmanager->UptdatePost($_POST['titre'], $_POST['texte'], $_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function updateentreprise(){
		$post= $this->postmanager->UptdateEntreprisePost($_POST['titre'], $_POST['texte'], $_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function updatepolitique(){
		$post= $this->postmanager->UptdatePolitiquePost($_POST['titre'], $_POST['texte'], $_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function updatestory(){
		$post= $this->postmanager->UptdateStoryPost($_POST['titre'], $_POST['texte'], $_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function upSignature(){
		$post= $this->usermanager->addSignature($_POST['sign'], $_GET['id']);
		header('Location: ./index.php?action=profilview');
	}

	//ajout de commentaire---------------------------------

	public function addWorldComment()
	{
		$user= $this->usermanager-> getOneUser($_SESSION['pseudo']);
	    $affectedLines = $this->commentmanager->worldPostComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment'], $user['signature']);
	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
	    }
	}
	public function addEntrepriseComment()
	{
		$user= $this->usermanager-> getOneUser($_SESSION['pseudo']);
	    $affectedLines = $this->commentmanager->EntreprisePostComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment'], $user['signature']);
	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
	    }
	}

	public function addPolitiqueComment()
	{
		$user= $this->usermanager-> getOneUser($_SESSION['pseudo']);
	    $affectedLines = $this->commentmanager->politiquePostComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment'], $user['signature']);
	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
	    }
	}

	public function addStoryComment()
	{
		$user= $this->usermanager-> getOneUser($_SESSION['pseudo']);
	    $affectedLines = $this->commentmanager->storyPostComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment'], $user['signature']);
	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
	    }
	}

	public function addthemeComment()
	{
		$user= $this->usermanager-> getOneUser($_SESSION['pseudo']);
	    $affectedLines = $this->commentmanager->themeComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment'], $user['signature']);
	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
	    }
	}

	

	//suppression de posts----------------------------------
	public function delete(){
		$delete= $this->postmanager->deletePost($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );;
	}

	public function deletewolrd(){
		$deletewolrd= $this->postmanager->deleteWorldPost($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );;
	}

	public function deleteentreprise(){
		$deleteentreprise= $this->postmanager->deleteEntreprisePost($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );;
	}

	public function deletepolitique(){
		$deletepolitique= $this->postmanager->deletePolitiquePost($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );;
	}

	public function deletestory(){
		$deletestory= $this->postmanager->deleteStoryPost($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );;
	}

		
}