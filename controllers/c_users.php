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

        //Set up theView
        $this->template->content = View::instance('v_users_profile');

        //Pass teh data to the view
        $this->template->content->user_name = $user_name;

        //Disply the view
        echo $this->template;

        //$view = View:: instance('v_users_profile');

        //$view->user_name = $user_name;

        //echo $view;

       
    }

} # end of the class
