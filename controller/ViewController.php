<?php
//namespace idee;
//use idee\PostsManager;
//require './vendor/autoload.php';
require_once("Controller.php");

class ViewController extends controller
{

	public function accueil()
	{
		$theme= $this->postmanager->getTheme();
		require('./view/frontend/accueilView.php');
	}

	public function listWorldPosts($page){
		$worldposts= $this->postmanager->getWorldPosts($page);
		$theme= $this->postmanager->getTheme();
		$nbrpost= $this->postmanager->nbrPostsWorld();
		require('./view/frontend/worldPostsView.php');
	}

	public function listeentreprise($page){
		$entrepriseposts= $this->postmanager->getEntreprisePosts($page);
		$nbrpost= $this->postmanager->nbrPostsEntreprise();
		require('./view/frontend/entreprisePostsView.php');
	}

	public function listepolitique($page){
		$politiqueposts= $this->postmanager->getPolitiquePosts($page);
		$nbrpost= $this->postmanager->nbrPostsPolitique();
		require('./view/frontend/politiquePostsView.php');
	}

	public function listestory($page){
		$storyposts= $this->postmanager->getStoryPosts($page);
		$nbrpost= $this->postmanager->nbrPostsStory();
		require('./view/frontend/storyPostsView.php');
	}

	public function acctheme(){
		$themeposts= $this->postmanager->getTheme();	
		require('./view/frontend/accthemeView.php');
	}

// -------------------------single post------------------------------
	public function worldPosts(){
		$post= $this->postmanager->getWorldPost($_GET['id']);
		$comments= $this->commentmanager->getWorldComments($_GET['id']);
		require('./view/frontend/worldPostView.php');
	}

	public function entreprisePost(){
		$post= $this->postmanager->getEntreprisePost($_GET['id']);
		$comments= $this->commentmanager->getEntrepriseComments($_GET['id']);	
		require('./view/frontend/entreprisePostView.php');
	}

	public function politiquePost(){
		$post= $this->postmanager->getPolitiquePost($_GET['id']);
		$comments= $this->commentmanager->getPolitiqueComments($_GET['id']);
		require('./view/frontend/politiquePostView.php');
	}

	public function storyPost(){	
		$post= $this->postmanager->getStoryPost($_GET['id']);
		$comments= $this->commentmanager->getStoryComments($_GET['id']);
		require('./view/frontend/storyPostView.php');
	}

	public function themeV(){	
		$theme= $this->postmanager->getThemePost($_GET['id']);
		$themeCom=$this->commentmanager->getCommentsTheme($_GET['id']);
		require('./view/frontend/themeJView.php');
	}

//------------------Show comments----------------------------
	

	public function commentsAdmin(){	
		$post= $this->postmanager->getWorldPost($_GET['id']);
		$comments= $this->commentmanager->getWorldComments($_GET['id']);
		require('./view/backend/commentView.php');
	}
	public function entrepriseCommentsAdmin(){	
		$post= $this->postmanager->getEntreprisePost($_GET['id']);
		$comments= $this->commentmanager->getEntrepriseComments($_GET['id']);
		require('./view/backend/commentView.php');
	}
	public function politiqueCommentsAdmin(){	
		$post= $this->postmanager->getPolitiquePost($_GET['id']);
		$comments= $this->commentmanager->getPolitiqueComments($_GET['id']);
		require('./view/backend/commentView.php');
	}
	public function storyCommentsAdmin(){	
		$post= $this->postmanager->getStoryPost($_GET['id']);
		$comments= $this->commentmanager->getStoryComments($_GET['id']);
		require('./view/backend/commentView.php');
	}



}