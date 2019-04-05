<?php
session_start();
require('./model/model.php');
function accueil(){
	$manager = new Manager();
	$theme= $manager->getTheme();
	require('./view/frontend/accueilView.php');
}
function listWorldPosts(){
	$manager = new Manager();
	$worldposts= $manager->getWorldPosts();
	$theme= $manager->getTheme();
	require('./view/frontend/worldPostsView.php');
}
function listeentreprise(){
	$manager = new Manager();
	$entrepriseposts= $manager->getEntreprisePosts();
	require('./view/frontend/entreprisePostsView.php');
}
function listepolitique(){
	$manager = new Manager();
	$politiqueposts= $manager->getPolitiquePosts();
	require('./view/frontend/politiquePostsView.php');
}
function listestory(){
	$manager = new Manager();
	$storyposts= $manager->getStoryPosts();
	require('./view/frontend/storyPostsView.php');
}
function insertworldP(){
	$manager = new Manager();
	$insertPost= $manager->insertWorldPost($_POST['titre'], $_POST['texte'], $_SESSION['pseudo']);	
	header('Location: ./index.php?action=createworldView');
}
function insertentrepriseP(){
	$manager = new Manager();
	$insertPost= $manager->insertEntreprisePost($_POST['titre'], $_POST['texte'], $_SESSION['pseudo']);	
	header('Location: ./index.php?action=createentrepriseView');
}
function insertpolitiqueP(){
	$manager = new Manager();
	$insertPost= $manager->insertPolitiquePost($_POST['titre'], $_POST['texte'], $_SESSION['pseudo']);	
	header('Location: ./index.php?action=createpolitiqueView');
}
function insertstoryP(){
	$manager = new Manager();
	$insertPost= $manager->insertStoryPost($_POST['titre'], $_POST['texte'], $_SESSION['pseudo']);	
	header('Location: ./index.php?action=createstoryView');
}
function insertT(){
	$manager = new Manager();
	$insertTheme= $manager->insertTheme($_POST['texte']);	
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}
function addWorldComment()
{
	$manager = new Manager();
    $affectedLines = $manager->worldPostComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
    }
}
function addEntrepriseComment()
{
	$manager = new Manager();
    $affectedLines = $manager->EntreprisePostComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
    }
}

function addPolitiqueComment()
{
	$manager = new Manager();
    $affectedLines = $manager->politiquePostComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
    }
}

function addStoryComment()
{
	$manager = new Manager();
    $affectedLines = $manager->storyPostComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
    }
}

function addthemeComment()
{
	$manager = new Manager();
    $affectedLines = $manager->themeComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
    }
}
function addvidComment()
{
	$manager = new Manager();
    $affectedLines = $manager->vidComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
    	header('Location: ' . $_SERVER['HTTP_REFERER'] );
    }
}
/*function updateView(){
	$manager = new Manager();
	$post= $manager->getWorldPost($_GET['id']);
	require('./view/backend/updateView.php');
}*/

// Aller a la page pour modifier les posts
function updateworldView(){
	$manager = new Manager();
	$post= $manager->getWorldPost($_GET['id']);
	require('./view/backend/updateView.php');
}

function updateentrepriseView(){
	$manager = new Manager();
	$post= $manager->getEntreprisePost($_GET['id']);
	require('./view/backend/updateView.php');
}

function updatepolitiqueView(){
	$manager = new Manager();
	$post= $manager->getPolitiquePost($_GET['id']);
	require('./view/backend/updateView.php');
}

function updatestoryView(){
	$manager = new Manager();
	$post= $manager->getStoryPost($_GET['id']);
	require('./view/backend/updateView.php');
}


// crée les posts
function createworldView(){
	$manager = new Manager();
	$pseudoo=$_SESSION['pseudo'];
	$posts= $manager->getWordlUserPosts($pseudoo);
	require('./view/backend/createworldView.php');
}
function createentrepriseView(){
	$manager = new Manager();
	$pseudoo=$_SESSION['pseudo'];
	$posts= $manager->getEntrepriseUserPosts($pseudoo);
	require('./view/backend/createentrepriseView.php');
}
function createpolitiqueView(){
	$manager = new Manager();
	$pseudoo=$_SESSION['pseudo'];
	$posts= $manager->getPolitiqueUserPosts($pseudoo);
	require('./view/backend/createpolitiqueView.php');
}
function createstoryView(){
	$manager = new Manager();
	$pseudoo=$_SESSION['pseudo'];
	$posts= $manager->getStoryUserPosts($pseudoo);
	require('./view/backend/createstoryView.php');
}
function createTheme(){
	$manager = new Manager();
	$theme= $manager->getTheme();
	require('./view/backend/createthemeView.php');
}

// modifier les posts
function update(){
	$manager = new Manager();
	$update= $manager->UptdatePost($_POST['titre'], $_POST['texte'], $_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}
function updateworld(){
	$manager = new Manager();
	$post= $manager->UptdatePost($_POST['titre'], $_POST['texte'], $_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}

function updateentreprise(){
	$manager = new Manager();
	$post= $manager->UptdateEntreprisePost($_POST['titre'], $_POST['texte'], $_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}

function updatepolitique(){
	$manager = new Manager();
	$post= $manager->UptdatePolitiquePost($_POST['titre'], $_POST['texte'], $_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}

function updatestory(){
	$manager = new Manager();
	$post= $manager->UptdateStoryPost($_POST['titre'], $_POST['texte'], $_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}

//Signalements

function signalMonde(){
	$manager = new Manager();
	$SignalementPost= $manager->SignalementMonde($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function signalWorldCo(){
	$manager = new Manager();
	$SignalementPost= $manager->SignalementWorldCom($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function signalEntreprise(){
	$manager = new Manager();
	$SignalementPost= $manager->SignalementEntreprise($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function signalEntrepriseCo(){
	$manager = new Manager();
	$SignalementPost= $manager->SignalementEntrepriseCom($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function signalPolitique(){
	$manager = new Manager();
	$SignalementPost= $manager->SignalementPolitique($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function signalPolitiqueCo(){
	$manager = new Manager();
	$SignalementPost= $manager->SignalementPolitiqueCom($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function signalStory(){
	$manager = new Manager();
	$SignalementPost= $manager->SignalementStory($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function signalStoryCo(){
	$manager = new Manager();
	$SignalementPost= $manager->SignalementStoryCom($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function signalthemeC(){
	$manager = new Manager();
	$SignalemenThemeC= $manager->SignalThemeCom($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}
function signalvidC(){
	$manager = new Manager();
	$SignalemenVidC= $manager->SignalVidCom($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

//suppression de posts
function delete(){
	$manager = new Manager();
	$delete= $manager->deletePost($_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}

function deletewolrd(){
	$manager = new Manager();
	$deletewolrd= $manager->deleteWorldPost($_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}

function deleteentreprise(){
	$manager = new Manager();
	$deleteentreprise= $manager->deleteEntreprisePost($_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}

function deletepolitique(){
	$manager = new Manager();
	$deletepolitique= $manager->deletePolitiquePost($_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}

function deletestory(){
	$manager = new Manager();
	$deletestory= $manager->deleteStoryPost($_GET['id']);
	header('Location: ./index.php?action=adminaccess');
}



function worldPosts(){
	$manager = new Manager();
	$post= $manager->getWorldPost($_GET['id']);
	$comments= $manager->getWorldComments($_GET['id']);
	require('./view/frontend/worldPostView.php');
}
function entreprisePost(){
	$manager = new Manager();
	$post= $manager->getEntreprisePost($_GET['id']);
	$comments= $manager->getEntrepriseComments($_GET['id']);
	require('./view/frontend/entreprisePostView.php');
}
function refreshEntreprisePost(){
	$manager = new Manager();
	$rcomments= $manager->getEntrepriseComments(44);

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

function politiquePost(){
	$manager = new Manager();
	$post= $manager->getPolitiquePost($_GET['id']);
	$comments= $manager->getPolitiqueComments($_GET['id']);
	require('./view/frontend/politiquePostView.php');
}
function storyPost(){
	$manager = new Manager();
	$post= $manager->getStoryPost($_GET['id']);
	$comments= $manager->getStoryComments($_GET['id']);
	require('./view/frontend/storyPostView.php');
}
function themeV(){
	$manager = new Manager();
	$theme= $manager->getTheme();
	$themeCom=$manager->getCommentsTheme($_GET['id']);
	require('./view/frontend/themeJView.php');
}
function videoView(){
	$manager = new Manager();
	$vidT= $manager->getVidT();
	require('./view/frontend/videoView.php');
}
function commentsAdmin(){
	$manager = new Manager();
	$post= $manager->getWorldPost($_GET['id']);
	$comments= $manager->getWorldComments($_GET['id']);
	require('./view/backend/commentView.php');
}
function entrepriseCommentsAdmin(){
	$manager = new Manager();
	$post= $manager->getEntreprisePost($_GET['id']);
	$comments= $manager->getEntrepriseComments($_GET['id']);
	require('./view/backend/commentView.php');
}
function politiqueCommentsAdmin(){
	$manager = new Manager();
	$post= $manager->getPolitiquePost($_GET['id']);
	$comments= $manager->getPolitiqueComments($_GET['id']);
	require('./view/backend/commentView.php');
}
function storyCommentsAdmin(){
	$manager = new Manager();
	$post= $manager->getStoryPost($_GET['id']);
	$comments= $manager->getStoryComments($_GET['id']);
	require('./view/backend/commentView.php');
}

function membreView(){
	$manager = new Manager();
	$user = $manager->getUser();
	require('./view/backend/userView.php');
}
function delcomm(){
	$manager = new Manager();
	$delcomm= $manager->deleteComment($_GET['id']);
	header('Location: ' . $_SERVER['HTTP_REFERER'] );
}
function signup(){
	$manager = new Manager();
	$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$verifPseudo= $manager->verifPseudo($_POST['pseudo']);
	if ($verifPseudo)
		{          
    		
    		header('Location: view/frontend/signUpView.php?error=error');
		}
	else
		{
			$inscription= $manager->inscription($_POST['Nom'], $_POST['Prenom'], $_POST['pseudo'], $pass_hache, $_POST['email']);
			header('Location: ./index.php');
		}
	
}
function login(){
	$manager = new Manager();
	$posts= $manager->getWorldPosts();
	$pseudoo=$_SESSION['pseudo'];/*
	$req= $manager->getUserPosts($pseudoo);*/
	$wposts= $manager->getWordlUserPosts($pseudoo);
	$eposts= $manager->getEntrepriseUserPosts($pseudoo);
	$pposts= $manager->getPolitiqueUserPosts($pseudoo);
	$sposts= $manager->getStoryUserPosts($pseudoo);
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
function adminaccess(){
	$manager = new Manager();
	$posts= $manager->getWorldPosts();
	$pseudoo=$_SESSION['pseudo'];/*
	$req= $manager->getUserPosts($pseudoo);*/
	$wposts= $manager->getWordlUserPosts($pseudoo);
	$eposts= $manager->getEntrepriseUserPosts($pseudoo);
	$pposts= $manager->getPolitiqueUserPosts($pseudoo);
	$sposts= $manager->getStoryUserPosts($pseudoo);
	require('./view/backend/crudView.php');
}
function useraccess(){
	$manager = new Manager();
	$pseudoo=$_SESSION['pseudo'];
	/*$req= $manager->getUserPosts($pseudoo);*/
	$wposts= $manager->getWordlUserPosts($pseudoo);
	$eposts= $manager->getEntrepriseUserPosts($pseudoo);
	$pposts= $manager->getPolitiqueUserPosts($pseudoo);
	$sposts= $manager->getStoryUserPosts($pseudoo);
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
	$manager = new Manager();
	$manager->updateLike($_GET['nbrjaime'], $_GET['id']);
	echo $_GET['nbrjaime'];	
}