<?php
/*-------------------------------------------------------------------------------------------------

github username: mimi11
   -------------------------------------------------------------------------------------------------*/
class index_controller extends base_controller
{

    /*-------------------------------------------------------------------------------------------------

    -------------------------------------------------------------------------------------------------*/
    public function __construct()
    {
        parent::__construct();
    }

    /*-------------------------------------------------------------------------------------------------
    Accessed via http://localhost/index/index/
    -------------------------------------------------------------------------------------------------*/
    public function index()
    {   $error=null;
        $login_error = null;
        # Any method that loads a view will commonly start with this
        # First, set the content of the template with a view file
        $this->template->content = View::instance('v_index_index');


        # Now set the <title> tag
        $this->template->title = "Welcome";


# CSS/JS includes

        $client_files_head = Array("");
        $this->template->client_files_head = Utils::load_client_files($client_files_head);

        $client_files_body = Array("");
        $this->template->client_files_body = Utils::load_client_files($client_files_body);


        # Render the view
        echo $this->template;

       if($this->user){

        #step 1 - get status from user
        $status = $this->status($this->user->user_id);

        #step 2 - storing inside session
        $_SESSION['status'] = $status;

       }


           # LOGIC FOR LOGIN_ERROR
     if ($login_error == 'password_error'){

       echo" Login failed. Please double check your password.";
     }
      if ($login_error == 'email_error'){

       echo " Login failed. Please double check your email.";
      }

    } # End of method


} # End of class
