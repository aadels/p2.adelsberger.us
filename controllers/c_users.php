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
        $content = View::instance('v_users_profile');
        $content->user_name = $user_name;
        $this->template->title = "Profile";

        $client_files_head = Array(
            '/css/profiles.css',
            '/css/master.css'
            );
        $this->$template->client_files_head = Utils::load_client_files($client_files_head);
        
        //Pass the data to the view
        $this->template->content = $content;
        
        //Display the view
        echo $this->template;

        //$view = View:: instance('v_users_profile');

        //$view->user_name = $user_name;

        //echo $view;

       
    }

} # end of the class
