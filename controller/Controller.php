<?php
require './vendor/autoload.php';
class controller
{
	public $postmanager;
	public $commentmanager;
	public $usermanager;
	public $SignalManager;

	public function __construct()
	{
		$this->postmanager = new idee\PostsManager();
		$this->commentmanager = new idee\CommentsManager();
		$this->usermanager = new idee\UsersManager();
		$this->signalmanager = new idee\SignalManager();

	}
}