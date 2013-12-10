<?php

class base_controller {
	
	public $user;
	public $userObj;
	public $template;
	public $email_template;

	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
						
		# Instantiate User obj
			$this->userObj = new User();
			
		# Authenticate / load user
			$this->user = $this->userObj->authenticate();					
						
		# Set up templates
			$this->template 	  = View::instance('_v_template');
			$this->email_template = View::instance('_v_email');			
								
		# So we can use $user in views			
			$this->template->set_global('user', $this->user);
			
	}

    /*___________________________________________________________________________________________
    The purpose of this function is to ensure that we sanitize user input throughout the application


   _____________________________________________________________________________________________
   */
    protected function sanitize_id($id){
        #this check for SQL injection attack by eliminating text from the input variable.
        if(is_numeric($id)){
            return intval($id);
        }

        return -1;
    }
	
} # eoc
