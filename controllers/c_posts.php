<?php

class posts_controller extends base_controller{

	public function add() {

	    # Setup view
	    $this->template->content = View::instance('v_posts_add');
	    $this->template->title   = "Madlib 1";

	    # Load JS files
	    $client_files_body = Array(
	        "/js/jquery.form.js",
	        "/js/posts_add.js", 
	        "/js/respond.js", 
	        "/js/bootstrap.js"
	    );

	    $this->template->client_files_body = Utils::load_client_files($client_files_body);   

	    # Render template
	    echo $this->template;   
	}
		
	public function p_add(){
		Router::redirect('/views/v_posts_index.php'); 
	}
	


	

}//end of the class
	
