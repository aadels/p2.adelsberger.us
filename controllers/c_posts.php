<?php

class posts_controller extends base_controller{

	public function __construct(){
		parent::__construct();

		//Make sure user is logged in if they want to use anything in this controller.
		if(!$this->user){
			die("Members only. Please <a href='/users/login'>Login</a>");
		}
	}
	public function add() {

	    # Setup view
	    $this->template->content = View::instance('v_posts_add');
	    $this->template->title   = "Add a new post";

	    # Load JS files
	    $client_files_body = Array(
	        "/js/jquery.form.js",
	        "/js/posts_add.js",
	        "/js/respond.js"	
	    );

	    $this->template->client_files_body = Utils::load_client_files($client_files_body);   

	    # Render template
	    echo $this->template;   
	}	
		
	public function p_add() {

	    // Set up the data
	    echo "O ". ($_POST['input1'])." heart, hid with a(n) ". ($_POST['input2'])." face! <br>
		Did ever dragon keep so fair a ".($_POST['input3']).".
		 Beautiful ".($_POST['input4'])."! Fiend angelical! <br>
		Dove-feathered"." ".($_POST['input5'])."! " . ucfirst($_POST['input6'])."ish-ravening lamb! <br>
		Despised ".($_POST['input7'])." of divinest show! <br>
		Just opposite to what thou justly seem’st.<br> 
		A ".($_POST['input8'])." saint, a(n) ". ($_POST['input9'])." villain! <br>
		O nature, what hadst thou to do in ". ($_POST['input10']). "<br>
		 When thou didst bower the spirit of a ". ($_POST['input11']). "<br> 
		In mortal paradise of such ". ($_POST['input12'])." flesh? <br> 
		Was ever book containing such ". ($_POST['input13']) . "matter <br> 
		So fairly bound? O, that deceit should dwell <br> 
		In such a ". ($_POST['input14'])." palace!";
		// Insert the post
    	
		}

	
		


	 public function index(){
	 	//Set up the view
	 	$this->template->content = View::instance('v_posts_index');
	 	$this->template->title = "Posts";

	 	//Build the query
	 	$q = 'SELECT 
            posts.content,
            posts.created, 
            posts.user_id AS post_user_id,
            users_users.user_id AS follower_id,
            users.first_name, 
            users.last_name,
            users.image
        FROM posts
        INNER JOIN users_users 
            ON posts.user_id = users_users.user_id_followed
        INNER JOIN users
        	ON posts.user_id = users.user_id
        WHERE users_users.user_id = '.$this->user->user_id;

            //Run the query
            $posts = DB::instance(DB_NAME)->select_rows($q);

            //Pass the data to the View
            $this->template->content->posts = $posts;

            //Pass errors, if any
        	$this->template->content->error = $error;

            //Render the view
            echo $this->template;

	 }

}//end of the class
	
