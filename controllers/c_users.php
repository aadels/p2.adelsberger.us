 <?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
      
    } 

    public function index() {
        echo "This is the index page";
    }

    public function signup() {
        echo "This is the signup page";
    }

    public function login() {
        echo "This is the login page";
    }

    public function logout() {
        echo "This is the logout page";
    }

    public function profile($user_name = NULL) {

        //Set up the View
        $this->template->content = View::instance('v_users_profile');
        $this->template->title = "Profile"; 

        //Load client files
        $client_files_head = Array(
            '/css/profile.css',
            '/css/master.css'
            );
        $this->template->client_files_head = Utils::load_client_files($client_files_head);
        
        $client_files_body= Array(
            '/js/profile.js'
            );

         $this->template->client_files_body= Utils::load_client_files($client_files_body);
       
        //Pass the data to the view
        $this->template->content->user_name = $user_name;
        
        //Display the view
        echo $this->template;

    }

    public function __construct() {
        parent::__construct();
    } 

    public function signup() {

        # Setup view
            $this->template->content = View::instance('v_users_signup');
            $this->template->title   = "Sign Up";

        # Render template
            echo $this->template;

    }

    public function p_signup() {

        # Dump out the results of POST to see what the form submitted
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';          
    }

} # end of the class
