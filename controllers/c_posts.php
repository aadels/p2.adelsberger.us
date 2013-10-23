<?php

class posts_controller extends base_controller{

	public function __construct(){
		parent::__construct();

		#Make suere user is logged in if they want to use anything in this controller.

		if(!$this->user){
			die("Members only. <a href='/users/login'>Login</a>");
		}
	}
	public function add(){

		#Set up view
		$this ->template->content = View::instance('v_posts_add');
		$this->template->title = "New Post";

		#Render Template
		echo $this->template;
	}	
		
	public function p_add(){

		#Associate this post with this user
		$_POST['user_id'] = $this->user->user_id;

		#Unix timestamp for when post is created and modified
		$_POST['created'] = Time::now();
		$_POST['modified'] = Time::now();

		#Insert
		#We didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us.
		DB::instance(DB_NAME)->insert('posts, $_POST');

		#Verify posting
		echo "Your post has been added. <a href='/posts/add'>Add another</a>";

	}
		

}# end of the class
	
