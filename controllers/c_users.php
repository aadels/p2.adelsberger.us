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
        $user_id = DB::instance(DB_NAME)->insert_row('users', $_POST); 
        
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
         if(!$token){

            //Send user back to the login page
            //echo "Login failed!";
            Router::redirect("/users/login");

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
            //echo "You are logged in!";
            Router::redirect("/");

        //if token found, login succeeded!
        } else {
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
            //echo "You are logged in!";
            Router::redirect("/");
        }
         
    }

    public function logout() {
        //Generate and save a key for teh next login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        /*Creath the data array we'll use with th eupdate method
        In this case we're only updating one field, so our arry only has one entry*/
        $data = Array("token" => $new_token);

        //Do the update
        DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".signup$this->user->token."'");

        //Delete their token cookie by setting to a date in the past - effectively logging them out
        setcookie("token", "", strtotime('-1 year'), '/');

        //Send them back to the main index
        Router::redirect("/");

    }

    public function profile($user_name = NULL) {

        //If user is blank, they are not logged in. Redirect them to the login page
        if (!$this->user){
            Router::redirect('/users/login');
        }

        //If they were not redirected away, continue:

        //Set up the View
        $this->template->content = View::instance('v_users_profile');
        $this->template->title = "Profile of".$this->user->first_name; 

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
