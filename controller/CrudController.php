<?php
//namespace idee;

require './vendor/autoload.php';

class CrudController
{

	public function insertworldP(){
		$postmanager = new idee\PostsManager();
		$insertPost= $postmanager->insertWorldPost($_POST['titre'], $_POST['texte'], $_SESSION['pseudo']);	
		header('Location: ./index.php?action=createworldView');
	}
	public function insertentrepriseP(){
		$postmanager = new idee\PostsManager();
		$insertPost= $postmanager->insertEntreprisePost($_POST['titre'], $_POST['texte'], $_SESSION['pseudo']);	
		header('Location: ./index.php?action=createentrepriseView');
	}
	public function insertpolitiqueP(){
		$postmanager = new idee\PostsManager();
		$insertPost= $postmanager->insertPolitiquePost($_POST['titre'], $_POST['texte'], $_SESSION['pseudo']);	
		header('Location: ./index.php?action=createpolitiqueView');
	}
	public function insertstoryP(){
		$postmanager = new idee\PostsManager();
		$insertPost= $postmanager->insertStoryPost($_POST['titre'], $_POST['texte'], $_SESSION['pseudo']);	
		header('Location: ./index.php?action=createstoryView');
	}
	public function insertT(){
		$postmanager = new idee\PostsManager();
		$insertTheme= $postmanager->insertTheme($_POST['texte']);	
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}



	// Aller a la page pour modifier les posts-----------
	public function updateworldView(){
		$postmanager = new idee\PostsManager();
		$post= $postmanager->getWorldPost($_GET['id']);
		require('./view/backend/updateView.php');
	}

	public function updateentrepriseView(){
		$postmanager = new idee\PostsManager();
		$post= $postmanager->getEntreprisePost($_GET['id']);
		require('./view/backend/updateView.php');
	}

	public function updatepolitiqueView(){
		$postmanager = new idee\PostsManager();
		$post= $postmanager->getPolitiquePost($_GET['id']);
		require('./view/backend/updateView.php');
	}

	public function updatestoryView(){
		$postmanager = new idee\PostsManager();
		$post= $postmanager->getStoryPost($_GET['id']);
		require('./view/backend/updateView.php');
	}


	// crée les posts-----------------------------------
	public function createworldView(){
		$postmanager = new idee\PostsManager();
		$pseudoo=$_SESSION['pseudo'];
		$posts= $postmanager->getWordlUserPosts($pseudoo);
		require('./view/backend/createworldView.php');
	}
	public function createentrepriseView(){
		$postmanager = new idee\PostsManager();
		$pseudoo=$_SESSION['pseudo'];
		$posts= $postmanager->getEntrepriseUserPosts($pseudoo);
		require('./view/backend/createentrepriseView.php');
	}
	public function createpolitiqueView(){
		$postmanager = new idee\PostsManager();
		$pseudoo=$_SESSION['pseudo'];
		$posts= $postmanager->getPolitiqueUserPosts($pseudoo);
		require('./view/backend/createpolitiqueView.php');
	}
	public function createstoryView(){
		$postmanager = new idee\PostsManager();
		$pseudoo=$_SESSION['pseudo'];
		$posts= $postmanager->getStoryUserPosts($pseudoo);
		require('./view/backend/createstoryView.php');
	}
	public function createTheme(){
		$postmanager = new idee\PostsManager();
		$theme= $postmanager->getTheme();
		require('./view/backend/createthemeView.php');
	}

	public function profilView(){
		$usermanager = new idee\UsersManager();
		$pseudo=$_SESSION['pseudo'];
		$resultat = $usermanager->getOneUser($pseudo);
		require('./view/backend/profilView.php');
	}

	// modifier les posts--------------------------------
	public function update(){
		$postmanager = new idee\PostsManager();
		$update= $postmanager->UptdatePost($_POST['titre'], $_POST['texte'], $_GET['id']);
		header('Location: ./index.php?action=adminaccess');
	}
	public function updateworld(){
		$postmanager = new idee\PostsManager();
		$post= $postmanager->UptdatePost($_POST['titre'], $_POST['texte'], $_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function updateentreprise(){
		$postmanager = new idee\PostsManager();
		$post= $postmanager->UptdateEntreprisePost($_POST['titre'], $_POST['texte'], $_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function updatepolitique(){
		$postmanager = new idee\PostsManager();
		$post= $postmanager->UptdatePolitiquePost($_POST['titre'], $_POST['texte'], $_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function updatestory(){
		$postmanager = new idee\PostsManager();
		$post= $postmanager->UptdateStoryPost($_POST['titre'], $_POST['texte'], $_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}

	public function upSignature(){
		$usermanager = new idee\UsersManager();
		$post= $usermanager->addSignature($_POST['sign'], $_GET['id']);
		header('Location: ./index.php?action=profilview');
	}

	//ajout de commentaire---------------------------------

	public function addWorldComment()
	{
		$commentmanager = new idee\CommentsManager();
		$usermanager = new idee\UsersManager();
		$user= $usermanager-> getOneUser($_SESSION['pseudo']);
	    $affectedLines = $commentmanager->worldPostComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment'], $user['signature']);
	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
	    }
	}
	public function addEntrepriseComment()
	{
		$commentmanager = new idee\CommentsManager();
		$usermanager = new idee\UsersManager();
		$user= $usermanager-> getOneUser($_SESSION['pseudo']);
	    $affectedLines = $commentmanager->EntreprisePostComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment'], $user['signature']);
	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
	    }
	}

	public function addPolitiqueComment()
	{
		$commentmanager = new idee\CommentsManager();
		$usermanager = new idee\UsersManager();
		$user= $usermanager-> getOneUser($_SESSION['pseudo']);
	    $affectedLines = $commentmanager->politiquePostComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment'], $user['signature']);
	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
	    }
	}

	public function addStoryComment()
	{
		$commentmanager = new idee\CommentsManager();
		$usermanager = new idee\UsersManager();
		$user= $usermanager-> getOneUser($_SESSION['pseudo']);
	    $affectedLines = $commentmanager->storyPostComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment'], $user['signature']);
	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
	    }
	}

	public function addthemeComment()
	{
		$commentmanager = new idee\CommentsManager();
		$usermanager = new idee\UsersManager();
		$user= $usermanager-> getOneUser($_SESSION['pseudo']);
	    $affectedLines = $commentmanager->themeComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment'], $user['signature']);
	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
	    }
	}

	

	//suppression de posts----------------------------------
	public function delete(){
		$postmanager = new idee\PostsManager();
		$delete= $postmanager->deletePost($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );;
	}

	public function deletewolrd(){
		$postmanager = new idee\PostsManager();
		$deletewolrd= $postmanager->deleteWorldPost($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );;
	}

	public function deleteentreprise(){
		$postmanager = new idee\PostsManager();
		$deleteentreprise= $postmanager->deleteEntreprisePost($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );;
	}

	public function deletepolitique(){
		$postmanager = new idee\PostsManager();
		$deletepolitique= $postmanager->deletePolitiquePost($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );;
	}

	public function deletestory(){
		$postmanager = new idee\PostsManager();
		$deletestory= $postmanager->deleteStoryPost($_GET['id']);
		header('Location: ' . $_SERVER['HTTP_REFERER'] );;
	}

		
}