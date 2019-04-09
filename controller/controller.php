<?php
session_start();
//require('./model/CommentManager.php');
//require('./model/PostsManager.php');
//require('./model/SignalManager.php');
//require('./model/UsersManager.php');

require './vendor/autoload.php';


function accueil(){
	$postmanager = new idee\PostsManager();
	$theme= $postmanager->getTheme();
	require('./view/frontend/accueilView.php');
}
function listWorldPosts($page){
	$postmanager = new idee\PostsManager();
	$worldposts= $postmanager->getWorldPosts($page);
	$theme= $postmanager->getTheme();
	$nbrpost= $postmanager->nbrPostsWorld();
	require('./view/frontend/worldPostsView.php');
}
function listeentreprise($page){
	$postmanager = new idee\PostsManager();
	$entrepriseposts= $postmanager->getEntreprisePosts($page);
	$nbrpost= $postmanager->nbrPostsEntreprise();
	require('./view/frontend/entreprisePostsView.php');
}
function listepolitique($page){
	$postmanager = new idee\PostsManager();
	$politiqueposts= $postmanager->getPolitiquePosts($page);
	$nbrpost= $postmanager->nbrPostsPolitique();
	require('./view/frontend/politiquePostsView.php');
}
function listestory($page){
	$postmanager = new idee\PostsManager();
	$storyposts= $postmanager->getStoryPosts($page);
	$nbrpost= $postmanager->nbrPostsStory();
	require('./view/frontend/storyPostsView.php');
}
function insertworldP(){
	$postmanager = new idee\PostsManager();
	$insertPost= $postmanager->insertWorldPost($_POST['titre'], $_POST['texte'], $_SESSION['pseudo']);	
	header('Location: ./index.php?action=createworldView');
}
function insertentrepriseP(){
	$postmanager = new idee\PostsManager();
	$insertPost= $postmanager->insertEntreprisePost($_POST['titre'], $_POST['texte'], $_SESSION['pseudo']);	
	header('Location: ./index.php?action=createentrepriseView');
}
function insertpolitiqueP(){
	$postmanager = new idee\PostsManager();
	$insertPost= $postmanager->insertPolitiquePost($_POST['titre'], $_POST['texte'], $_SESSION['pseudo']);	
	header('Location: ./index.php?action=createpolitiqueView');
}
function insertstoryP(){
	$postmanager = new idee\PostsManager();
	$insertPost= $postmanager->insertStoryPost($_POST['titre'], $_POST['texte'], $_SESSION['pseudo']);	
	header('Location: ./index.php?action=createstoryView');
}
function insertT(){
	$postmanager = new idee\PostsManager();
	$insertTheme= $postmanager->insertTheme($_POST['texte']);	
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}



// Aller a la page pour modifier les posts-----------
function updateworldView(){
	$postmanager = new idee\PostsManager();
	$post= $postmanager->getWorldPost($_GET['id']);
	require('./view/backend/updateView.php');
}

function updateentrepriseView(){
	$postmanager = new idee\PostsManager();
	$post= $postmanager->getEntreprisePost($_GET['id']);
	require('./view/backend/updateView.php');
}

function updatepolitiqueView(){
	$postmanager = new idee\PostsManager();
	$post= $postmanager->getPolitiquePost($_GET['id']);
	require('./view/backend/updateView.php');
}

function updatestoryView(){
	$postmanager = new idee\PostsManager();
	$post= $postmanager->getStoryPost($_GET['id']);
	require('./view/backend/updateView.php');
}


// crée les posts-----------------------------------
function createworldView(){
	$postmanager = new idee\PostsManager();
	$pseudoo=$_SESSION['pseudo'];
	$posts= $postmanager->getWordlUserPosts($pseudoo);
	require('./view/backend/createworldView.php');
}
function createentrepriseView(){
	$postmanager = new idee\PostsManager();
	$pseudoo=$_SESSION['pseudo'];
	$posts= $postmanager->getEntrepriseUserPosts($pseudoo);
	require('./view/backend/createentrepriseView.php');
}
function createpolitiqueView(){
	$postmanager = new idee\PostsManager();
	$pseudoo=$_SESSION['pseudo'];
	$posts= $postmanager->getPolitiqueUserPosts($pseudoo);
	require('./view/backend/createpolitiqueView.php');
}
function createstoryView(){
	$postmanager = new idee\PostsManager();
	$pseudoo=$_SESSION['pseudo'];
	$posts= $postmanager->getStoryUserPosts($pseudoo);
	require('./view/backend/createstoryView.php');
}
function createTheme(){
	$postmanager = new idee\PostsManager();
	$theme= $postmanager->getTheme();
	require('./view/backend/createthemeView.php');
}

function profilView(){
	$usermanager = new idee\UsersManager();
	$pseudo=$_SESSION['pseudo'];
	$resultat = $usermanager->getOneUser($pseudo);
	require('./view/backend/profilView.php');
}

// modifier les posts--------------------------------
function update(){
	$postmanager = new idee\PostsManager();
	$update= $postmanager->UptdatePost($_POST['titre'], $_POST['texte'], $_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}
function updateworld(){
	$postmanager = new idee\PostsManager();
	$post= $postmanager->UptdatePost($_POST['titre'], $_POST['texte'], $_GET['id']);
	//header('Location: ./index.php?action=adminaccess');
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function updateentreprise(){
	$postmanager = new idee\PostsManager();
	$post= $postmanager->UptdateEntreprisePost($_POST['titre'], $_POST['texte'], $_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}

function updatepolitique(){
	$postmanager = new idee\PostsManager();
	$post= $postmanager->UptdatePolitiquePost($_POST['titre'], $_POST['texte'], $_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}

function updatestory(){
	$postmanager = new idee\PostsManager();
	$post= $postmanager->UptdateStoryPost($_POST['titre'], $_POST['texte'], $_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}

function upSignature(){
	$usermanager = new idee\UsersManager();
	$post= $usermanager->addSignature($_POST['sign'], $_GET['id']);
	header('Location: ./index.php?action=profilview');
}










//ajout de commentaire---------------------------------

function addWorldComment()
{
	$commentmanager = new idee\CommentsManager();
    $affectedLines = $commentmanager->worldPostComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
    }
}
function addEntrepriseComment()
{
	$commentmanager = new idee\CommentsManager();
    $affectedLines = $commentmanager->EntreprisePostComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
    }
}

function addPolitiqueComment()
{
	$commentmanager = new idee\CommentsManager();
    $affectedLines = $commentmanager->politiquePostComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
    }
}

function addStoryComment()
{
	$commentmanager = new idee\CommentsManager();
    $affectedLines = $commentmanager->storyPostComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
    }
}

function addthemeComment()
{
	$commentmanager = new idee\CommentsManager();
    $affectedLines = $commentmanager->themeComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
    }
}
function addvidComment()
{
	$commentmanager = new idee\CommentsManager();
    $affectedLines = $commentmanager->vidComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
    }
}




//Signalements--------------------------------------

function signalMonde(){
	$signalmanager = new idee\SignalManager();
	$SignalementPost= $signalmanager->SignalementMonde($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function signalWorldCo(){
	$signalmanager = new idee\SignalManager();
	$SignalementPost= $signalmanager->SignalementWorldCom($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function signalEntreprise(){
	$signalmanager = new idee\SignalManager();
	$SignalementPost= $signalmanager->SignalementEntreprise($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function signalEntrepriseCo(){
	$signalmanager = new idee\SignalManager();
	$SignalementPost= $signalmanager->SignalementEntrepriseCom($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function signalPolitique(){
	$signalmanager = new idee\SignalManager();
	$SignalementPost= $signalmanager->SignalementPolitique($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function signalPolitiqueCo(){
	$signalmanager = new idee\SignalManager();
	$SignalementPost= $signalmanager->SignalementPolitiqueCom($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function signalStory(){
	$signalmanager = new idee\SignalManager();
	$SignalementPost= $signalmanager->SignalementStory($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function signalStoryCo(){
	$signalmanager = new idee\SignalManager();
	$SignalementPost= $signalmanager->SignalementStoryCom($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function signalthemeC(){
	$signalmanager = new idee\SignalManager();
	$SignalemenThemeC= $signalmanager->SignalThemeCom($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}
function signalvidC(){
	$signalmanager = new idee\SignalManager();
	$SignalemenVidC= $signalmanager->SignalVidCom($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}





//suppression de posts----------------------------------
function delete(){
	$postmanager = new idee\PostsManager();
	$delete= $postmanager->deletePost($_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}

function deletewolrd(){
	$postmanager = new idee\PostsManager();
	$deletewolrd= $postmanager->deleteWorldPost($_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}

function deleteentreprise(){
	$postmanager = new idee\PostsManager();
	$deleteentreprise= $postmanager->deleteEntreprisePost($_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}

function deletepolitique(){
	$postmanager = new idee\PostsManager();
	$deletepolitique= $postmanager->deletePolitiquePost($_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}

function deletestory(){
	$postmanager = new idee\PostsManager();
	$deletestory= $postmanager->deleteStoryPost($_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}



function worldPosts(){
	$postmanager = new idee\PostsManager();
	$commentmanager = new idee\CommentsManager();
	$post= $postmanager->getWorldPost($_GET['id']);
	$comments= $commentmanager->getWorldComments($_GET['id']);
	require('./view/frontend/worldPostView.php');
}
function entreprisePost(){
	$postmanager = new idee\PostsManager();
	$commentmanager = new idee\CommentsManager();
	$post= $postmanager->getEntreprisePost($_GET['id']);
	$comments= $commentmanager->getEntrepriseComments($_GET['id']);
	require('./view/frontend/entreprisePostView.php');
}
function refreshEntreprisePost(){
	$commentmanager = new idee\CommentsManager();
	$rcomments= $commentmanager->getEntrepriseComments(44);

	while ($rcomment = $rcomments->fetch())
        {          
        echo 
        "<div class=\"media mb-4\">
        	<img class=\"d-flex mr-3 rounded-circle\" src=\"http://placehold.it/50x50\" alt=\"\">
        	<div class=\"media-body\">
        		<h5 class=\"mt-0\"/>". htmlspecialchars($rcomment['author'])."</h5></br>".
        		nl2br(htmlspecialchars($rcomment['comment'])).
        	"</div>
        	<a class=signaler href=\"./index.php?action=signalEntrepriseCo&amp;id=". $rcomment['id']. "\">Signaler</a>
        </div><hr>";
    }	
}






//----------------------------------------------
function politiquePost(){
	$postmanager = new idee\PostsManager();
	$commentmanager = new idee\CommentsManager();
	$post= $postmanager->getPolitiquePost($_GET['id']);
	$comments= $commentmanager->getPolitiqueComments($_GET['id']);
	require('./view/frontend/politiquePostView.php');
}
function storyPost(){
	$postmanager = new idee\PostsManager();
	$commentmanager = new idee\CommentsManager();	
	$post= $postmanager->getStoryPost($_GET['id']);
	$comments= $commentmanager->getStoryComments($_GET['id']);
	require('./view/frontend/storyPostView.php');
}
function themeV(){
	$postmanager = new idee\PostsManager();
	$commentmanager = new idee\CommentsManager();	
	$theme= $postmanager->getTheme();
	$themeCom=$commentmanager->getCommentsTheme($_GET['id']);
	require('./view/frontend/themeJView.php');
}

function commentsAdmin(){
	$postmanager = new idee\PostsManager();
	$commentmanager = new idee\CommentsManager();	
	$post= $postmanager->getWorldPost($_GET['id']);
	$comments= $commentmanager->getWorldComments($_GET['id']);
	require('./view/backend/commentView.php');
}
function entrepriseCommentsAdmin(){
	$postmanager = new idee\PostsManager();
	$commentmanager = new idee\CommentsManager();	
	$post= $postmanager->getEntreprisePost($_GET['id']);
	$comments= $commentmanager->getEntrepriseComments($_GET['id']);
	require('./view/backend/commentView.php');
}
function politiqueCommentsAdmin(){
	$postmanager = new idee\PostsManager();
	$commentmanager = new idee\CommentsManager();	
	$post= $postmanager->getPolitiquePost($_GET['id']);
	$comments= $commentmanager->getPolitiqueComments($_GET['id']);
	require('./view/backend/commentView.php');
}
function storyCommentsAdmin(){
	$postmanager = new idee\PostsManager();
	$commentmanager = new idee\CommentsManager();	
	$post= $postmanager->getStoryPost($_GET['id']);
	$comments= $commentmanager->getStoryComments($_GET['id']);
	require('./view/backend/commentView.php');
}




//------------------------------------------------------
function membreView(){
	$usermanager = new idee\UsersManager();
	$user = $usermanager->getUser();
	require('./view/backend/userView.php');
}

function signup(){
	$usermanager = new idee\UsersManagerUsersManager();
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
function login(){
	$usermanager = new idee\UsersManager();
	$postmanager = new idee\PostsManager();
	//$posts= $postmanager->getWorldPosts();
	$pseudoo=$_SESSION['pseudo'];/*
	$req= $postmanager->getUserPosts($pseudoo);*/
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
	        //require('./view/backend/crudView.php');
	        header('Location: ./index.php');
	    }
	    elseif (($isPasswordCorrect) && ($_POST['pseudo'] == 'admin') && (isset($_POST['rapel']))) {
	    	setcookie('id', $verifuser['id'], time() + 365*24*3600, null, null, false, true); 
			setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
			//require('/view/backend/crudView.php');
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
function adminaccess(){
	$postmanager = new idee\PostsManager();
	//$posts= $postmanager->getWorldPosts();
	$pseudoo=$_SESSION['pseudo'];/*
	$req= $manager->getUserPosts($pseudoo);*/
	$wposts= $postmanager->getAllWorldPosts();
	$eposts= $postmanager->getAllEntreprisePosts();
	$pposts= $postmanager->getAllPolitiquePosts();
	$sposts= $postmanager->getAllStoryPosts();
	require('./view/backend/crudView.php');
}
function useraccess(){
	$postmanager = new idee\PostsManager();
	$pseudoo=$_SESSION['pseudo'];
	/*$req= $manager->getUserPosts($pseudoo);*/
	$wposts= $postmanager->getWordlUserPosts($pseudoo);
	$eposts= $postmanager->getEntrepriseUserPosts($pseudoo);
	$pposts= $postmanager->getPolitiqueUserPosts($pseudoo);
	$sposts= $postmanager->getStoryUserPosts($pseudoo);
	require('./view/backend/userbackView.php');
}
function deconexion(){
		
	session_start();
	
	$_SESSION = array();
	session_destroy();
	
	setcookie('id', '');
	setcookie('pseudo', '');
	header('Location: ./index.php');
}
function updatejaime(){
	$usermanager = new idee\UsersManager();
	$usermanager->updateLike($_GET['nbrjaime'], $_GET['id']);
	echo $_GET['nbrjaime'];	
}