<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
      
    } 

    public function index() {
        #Setup View
        $this->template->title   = "Welcome to UFP!";
     
    }

    public function signup($error = NULL) {

        # Setup view
        $this->template->content = View::instance('v_users_signup');
        $this->template->title   = "Sign Up";

        //Pass data to the view
        $this->template->content->error = $error;
        
        //Render template
        echo $this->template;
    }

    public function p_signup() {

        //Check input for blank fields
        foreach($_POST as $field => $value){
            if(empty($value)) {
                //If any fields are blank, send error message
                 Router::redirect('/users/signup/blank-fields');  
            }
        }       

        //Check to see if the input email already exists in the database 
        $error = DB::instance(DB_NAME)->select_field("SELECT email FROM users WHERE email = '" . $_POST['email'] . "'");

        //If email already exists
        if($error){
             //Redirect to error page
            Router::redirect('/users/signup/email-exists');
        }
        
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            //Redirect to error page 
            Router::redirect("/users/signup/bad-email"); 

        }else{ 
        
        //Store time data
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();
        
        //Encrypt PW
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        //Create encrypted string via their email address and a random string
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
        
        //Insert user into database
        $user_id = DB::instance(DB_NAME)->insert_row('users', $_POST);

        // all users follow their own posts by default
        $data = Array(
            "created" => Time::now(),
            "user_id" => $user_id,
            "user_id_followed" => $user_id
            );
    

        // Do the insert
        DB::instance(DB_NAME)->insert('users_users', $data);

        // log user in using the token we generated
        setcookie("token", $_POST['token'], strtotime('+1 year'), '/');

        // send an email a welcome message to the new user
        // build a multi-dimension array of recipients of this email
        $to[]    = Array("name" => $_POST['first_name'], "email" => $_POST['email']);
        $from    = Array("name" => APP_NAME, "email" => APP_EMAIL);
        $subject = "Welcome to UFP";               
        $body = View::instance('welcome_email');
                
        // Send email
        Email::send($to, $from, $subject, $body, true, '');

        // signup confirm
        Router::redirect("/users/profile");
     
         //redirect to login
         //Router::redirect('/users/login');  
        } 
        
           
    }
   
    public function login($error = NULL) {
         //Setup view
        $this->template->content = View::instance('v_users_login');
        $this->template->title = "Login";

        //Pass data to the view
        $this->template->content->error = $error;
        
        //$this->template->content->badPassword = $badPassword;
        
        //Render template
        echo $this->template;
    }

    public function p_login(){
        
        //Store time data - interfering with login, so commented out for now
        //$_POST['last_login']  = Time::now();

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

             //Redirect to error page
            Router::redirect("/users/login/error");
       

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

            # Send them to the main page - or whever you want them to go
            Router::redirect("/");
        }
         
    }

    public function logout() {
        //Generate and save a key for the next login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        /*Create the data array we'll use with the update method
        In this case we're only updating one field, so our arry only has one entry*/
        $data = Array("token" => $new_token);

        //Do the update
        DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

        //Delete their token cookie by setting to a date in the past - effectively logging them out
        setcookie("token", "", strtotime('-1 year'), '/');

        //Send them back to the main index
        Router::redirect("/");

    }

    public function profile($error = NULL) {

        //If user is blank, they are not logged in. Redirect them to the login page
        if (!$this->user){
            Router::redirect('/users/login');
        }

        //If they were not redirected away, continue:

        //Set up the View
        $this->template->content = View::instance('v_users_profile');
        $this->template->title = "Profile of ".$this->user->first_name . " " . $this->user->last_name; 
       
        //Pass the data to the view
        $this->template->content->user_name = $user_name;

        // pass errors, if any
        $this->template->content->error = $error;
        
        //Display the view
        echo $this->template;

    }
    public function profile_image() {
        // if user selects a profile image, upload it
        if ($_FILES['avatar']['error'] == 0)
        {
            //upload an image
            $image = Upload::upload($_FILES, "/uploads/avatars/", array("JPG", "JPEG", "jpg", "jpeg", "gif", "GIF", "png", "PNG"), $this->user->user_id);

            if($image == 'Invalid file type.') {
                // return an error
                Router::redirect("/users/profile/error"); 
            }
            else {
                // process the upload
                $data = Array("image" => $image);
                DB::instance(DB_NAME)->update("users", $data, "WHERE user_id = ".$this->user->user_id);

                // resize the image
                $imgObj = new Image($_SERVER["DOCUMENT_ROOT"] . '/uploads/avatars/' . $image);
                $imgObj->resize(100,100, "crop");
                $imgObj->save_image($_SERVER["DOCUMENT_ROOT"] . '/uploads/avatars/' . $image); 
            }
        }
        else
        {
            // return an error
            Router::redirect("/users/profile/error");  
        }

        // Redirect back to the profile page
        router::redirect('/users/profile'); 
    }  


} # end of the class
