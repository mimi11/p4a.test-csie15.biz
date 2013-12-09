<?php
/*-------------------------------------------------------------------------------------------------
Name: Carine Melhorn
Project Name: p2.test-csie15.biz
github username: mimi11
   -------------------------------------------------------------------------------------------------*/
class users_controller extends base_controller
{

    public function __construct()
    {
        parent::__construct();

        # Make sure user is logged in if they want to use anything in this controller
        if (!$this->user) {

            Router::redirect('/users/login');

        }
    }

    public function index()
    {

        # Set up the View
        $this->template->content = View::instance('v_rankings_index');
        $this->template->title = "Company Rankings";

        # Query
        $q = 'SELECT *
        FROM device_type
        Order by name';

        # Run the query, store the results in the variable $posts
        $device_type = DB::instance(DB_NAME)->select_rows($q);

        # Pass data to the View
        $this->template->content->device_types = $device_type;

        # Render the View
        echo $this->template;
    }

        public function ranking(){

        #set up views

        $this->template->content = View::instance('v_index_index');

        # View within a view
        $this->template->content->signup = View::instance('v_rankings_index');

    }

}#eoc
