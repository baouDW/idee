<?php
//namespace idee\controller;

require './vendor/autoload.php';

class ViewController
{
	public function accueil()
	{
		$postmanager = new idee\PostsManager();
		$theme= $postmanager->getTheme();
		require('./view/frontend/accueilView.php');
	}

	public function listWorldPosts($page){
		$postmanager = new idee\PostsManager();
		$worldposts= $postmanager->getWorldPosts($page);
		$theme= $postmanager->getTheme();
		$nbrpost= $postmanager->nbrPostsWorld();
		require('./view/frontend/worldPostsView.php');
	}

	public function listeentreprise($page){
		$postmanager = new idee\PostsManager();
		$entrepriseposts= $postmanager->getEntreprisePosts($page);
		$nbrpost= $postmanager->nbrPostsEntreprise();
		require('./view/frontend/entreprisePostsView.php');
	}

	public function listepolitique($page){
		$postmanager = new idee\PostsManager();
		$politiqueposts= $postmanager->getPolitiquePosts($page);
		$nbrpost= $postmanager->nbrPostsPolitique();
		require('./view/frontend/politiquePostsView.php');
	}

	public function listestory($page){
		$postmanager = new idee\PostsManager();
		$storyposts= $postmanager->getStoryPosts($page);
		$nbrpost= $postmanager->nbrPostsStory();
		require('./view/frontend/storyPostsView.php');
	}

	public function acctheme(){
		$postmanager = new idee\PostsManager();
		$themeposts= $postmanager->getTheme();	
		require('./view/frontend/accthemeView.php');
	}

// -------------------------single post------------------------------
	public function worldPosts(){
		$postmanager = new idee\PostsManager();
		$commentmanager = new idee\CommentsManager();
		$post= $postmanager->getWorldPost($_GET['id']);
		$comments= $commentmanager->getWorldComments($_GET['id']);
		require('./view/frontend/worldPostView.php');
	}

	public function entreprisePost(){
		$postmanager = new idee\PostsManager();
		$commentmanager = new idee\CommentsManager();
		$post= $postmanager->getEntreprisePost($_GET['id']);
		$comments= $commentmanager->getEntrepriseComments($_GET['id']);	
		require('./view/frontend/entreprisePostView.php');
	}

	public function politiquePost(){
		$postmanager = new idee\PostsManager();
		$commentmanager = new idee\CommentsManager();
		$post= $postmanager->getPolitiquePost($_GET['id']);
		$comments= $commentmanager->getPolitiqueComments($_GET['id']);
		require('./view/frontend/politiquePostView.php');
	}

	public function storyPost(){
		$postmanager = new idee\PostsManager();
		$commentmanager = new idee\CommentsManager();;	
		$post= $postmanager->getStoryPost($_GET['id']);
		$comments= $commentmanager->getStoryComments($_GET['id']);
		require('./view/frontend/storyPostView.php');
	}

	public function themeV(){
		$postmanager = new idee\PostsManager();
		$commentmanager = new idee\CommentsManager();	
		$theme= $postmanager->getThemePost($_GET['id']);
		$themeCom=$commentmanager->getCommentsTheme($_GET['id']);
		require('./view/frontend/themeJView.php');
	}

//------------------Show comments----------------------------
	

	public function commentsAdmin(){
		$postmanager = new idee\PostsManager();
		$commentmanager = new idee\CommentsManager();	
		$post= $postmanager->getWorldPost($_GET['id']);
		$comments= $commentmanager->getWorldComments($_GET['id']);
		require('./view/backend/commentView.php');
	}
	public function entrepriseCommentsAdmin(){
		$postmanager = new idee\PostsManager();
		$commentmanager = new idee\CommentsManager();	
		$post= $postmanager->getEntreprisePost($_GET['id']);
		$comments= $commentmanager->getEntrepriseComments($_GET['id']);
		require('./view/backend/commentView.php');
	}
	public function politiqueCommentsAdmin(){
		$postmanager = new idee\PostsManager();
		$commentmanager = new idee\CommentsManager();	
		$post= $postmanager->getPolitiquePost($_GET['id']);
		$comments= $commentmanager->getPolitiqueComments($_GET['id']);
		require('./view/backend/commentView.php');
	}
	public function storyCommentsAdmin(){
		$postmanager = new idee\PostsManager();
		$commentmanager = new idee\CommentsManager();	
		$post= $postmanager->getStoryPost($_GET['id']);
		$comments= $commentmanager->getStoryComments($_GET['id']);
		require('./view/backend/commentView.php');
	}



}