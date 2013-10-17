 <?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
      
    } 

    public function index() {
        echo "This is the index page";
    }

    public function signup() {

        # Setup view
            $this->template->content = View::instance('v_users_signup');
            $this->template->title   = "Sign Up";

        # Render template
            echo $this->template;

    }

    public function p_signup() {


        //Store time data
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();
        
        //Encrypt PW
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        //Create encrypted string via their email address and a random string
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
        
        //Insert user into database
        DB::instance(DB_NAME)->insert_row('users', $_POST); 
        
        //confirm signup
        echo 'You\'re signed up.';        
    }
    /*public function test_db(){

    }*/

    public function login() {
         //Setup view
        $this->template->content = View::instance('v_users_login');
        $this->template->title = "Login";

        //Render templae
        echo $this->template;
    }

    public function p_login(){
        //Sanitize user input data
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        //Hash submitted PW so we can compare it against one in the database
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        /*Search the DB for this email and PW
        Retrieve the token if it is available*/
        $q = "SELECT token 
        FROM users 
        WHERE email = '".$_POST['email']."' 
        AND password = '".$_POST['password']."'";

         $token = DB::instance(DB_NAME)->select_field($q);

         //If no matching token found in DB, login failed
         if($token){
            /* 
            Store this token in a cookie using setcookie()
            Important Note: *Nothing* else can echo to the page before setcookie is called
             Not even one single white space.
            param 1 = name of the cookie
            param 2 = the value of the cookie
            param 3 = when to expire
            param 4 = the path of the cooke (a single forward slash sets it for the entire domain)
            */
            setcookie("token", $token, strtotime('+1 year'), '/');

            //Redirect to wherever you want user to go
            Router::redirect("http://mit.edu");

        //if token found, login succeeded!
        } else {
            //Send user back to the login page
            Router::redirect("users/login/");
        }
         
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



} # end of the class
