<?php
/*-------------------------------------------------------------------------------------------------
Name: Carine Melhorn
Project Name: p4.test-csie15.biz
Rankings Controller is the controller that provides 2012 Conflict Minerals Company Rankings from
http://www.raisehopeforcongo.org/companyrankings
This project is designed for academic purposes and all sources to compute ranking and scores derived from the Enough Project campaign.
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
            '/js/rankings.js'

        );

        # Use load_client_files to generate the links from the above array
        $this->template->client_files_body = Utils::load_client_files($client_files_body);


        # Set up the View
        $this->template->content = View::instance('v_rankings_index');
        $this->template->title = "Company Rankings";

        # 1.Query to select a device_type from the db
        $q = 'SELECT *
        FROM device_type
        Order by name';

        # 2.Run the query, store the results in the variable $posts
        $device_type = DB::instance(DB_NAME)->select_rows($q);


        # 3.Pass data to the View
        $this->template->content->device_types = $device_type;


        #4. Query to retrieve device model from the DB


        # 5.Run the query, store the results in the variable $posts
        $device_model = DB::instance(DB_NAME)->select_rows($q);


        # Pass data to the View
        $this->template->content->device_model = $device_model;


        # 6.setup query for retrieving manufacturer
        # Query
        $q2 = 'SELECT *
        FROM company_rankings
        Order by company_name';

        #7. Run the query, store the results in the variable $posts
        $company_name = DB::instance(DB_NAME)->select_rows($q2);

        # 8.Pass data to the View
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



            # Devices Type selected


            # This variable will update the content from the user update


            # Insert information collected from the user selection into the devices table

            $user_device_info = DB::instance(DB_NAME)->insert('users_devices', $_POST,
                "WHERE user_device_id= '"
                . $this->user->user_id
                . "'");



            if ( $user_device_info  == 1) {
                echo $this->user." owns a " . $user_device_info . " manufactured by ".$company_id;
            } # Means there is something went wrong - e.g parameter is wrong since update() should only update a single row.
            else {
                echo "Unable to obtain your device information, back to your profile <a href='/rankings/ranking'>Back to your post</a>";

            }



        }

}#eoc
