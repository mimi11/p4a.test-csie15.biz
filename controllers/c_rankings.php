<?php
/*-------------------------------------------------------------------------------------------------
Name: Carine Melhorn
Project Name: p2.test-csie15.biz
github username: mimi11
   -------------------------------------------------------------------------------------------------*/
class rankings_controller extends base_controller
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
        # setup views to load specific js
        # Create an array of 1 or many client files to be included before the closing </body> tag
        $client_files_body = Array(
            '/js/rankings.js',

        );

        # Use load_client_files to generate the links from the above array
        $this->template->client_files_body = Utils::load_client_files($client_files_body);


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


        # setup query for retrieving manufacturer
        # Query
        $q2 = 'SELECT *
        FROM company_rankings
        Order by company_name';

        # Run the query, store the results in the variable $posts
        $company_name = DB::instance(DB_NAME)->select_rows($q2);

        # Pass data to the View
        $this->template->content->company_names = $company_name;


        # Render the View
        echo $this->template;
    }

        public function ranking(){


            $company_id = $this->sanitize_id($_POST['company_id']);

            # setup query for retrieving manufacturer
            # Query
            $q2 = 'SELECT *
        FROM company_rankings
        WHERE company_id ='.$company_id;

            # Run the query, store the results in the variable $posts
            $companies = DB::instance(DB_NAME)->select_rows($q2);

            if(count($companies)==1){
               //    echo $companies[0]['score'];
                $company = $companies[0];
                echo $company['score'];
            }else{
                 echo -1;
            }











        }

}#eoc
