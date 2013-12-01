<?php

class posts_controller extends base_controller{

	public function add() {

	    # Setup view
	    $this->template->content = View::instance('v_posts_add');
	    $this->template->title   = "Add a new post";

	    # Load JS files
	    $client_files_body = Array(
	        "/js/jquery.form.js",
	        "/js/posts_add.js", 
	        "/js/respond.js", 
	       
	    );

	    $this->template->client_files_body = Utils::load_client_files($client_files_body);   

	    # Render template
	    echo $this->template;   
	}
		
	public function p_add(){
		<?php
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

	}
	


	

}//end of the class
	
