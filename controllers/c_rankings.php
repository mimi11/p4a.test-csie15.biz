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

    /*----------------------------------------------------------------------------------------------------------------------
    Index is the landing page that will list the company profiles information
    And provides the view to use the conflict Minerals tool that will allow users to enter information about their devices.

    -----------------------------------------------------------------------------------------------------------------------*/

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


       /*_______________________________________________________________________________________________________________
       Conflict Mineral Tool logic begins here
       ----------------------------------------------------------------------------------------------------------------*/
        # 1.Query to select a device_type from the db
        $q = 'SELECT *
        FROM device_type
        Order by name';

        # 2.Run the query, to display  the results in the variable $device_type that will be loaded in the select form
        $device_type = DB::instance(DB_NAME)->select_rows($q);


        # 3.Pass data to the View
        $this->template->content->device_types = $device_type;



        # 4.For device Model, since it is from the same table, we don't need to run a new query, we can store the data directly from the db in the variable $device_model
        $device_model = DB::instance(DB_NAME)->select_rows($q);


        #5. Pass data to the View
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


        # 8.Render the View
        echo $this->template;
    }
    /*---------------------------------------------------------------------------------------------------------------------
     Ranking control is the function that
    1) Does a lookup to the company_rankings table to obtain score, when a user click on a score button (after filling out form)
    2) Store all _POST[] information collected via the form into users_devices table
    -------------------------------------------------------------------------------------------------------------------------*/
    public function ranking()
    {
        $company_id = $this->sanitize_id($_POST['company_id']);

     // Step 1 - Write operation: Insert information collected from the user selection into the devices table

        $_POST['user_id']=$this->user->user_id;
        $user_device_info = DB::instance(DB_NAME)->insert("users_devices", $_POST);

        //step 2 - Read operation

        # setup query for retrieving manufacturer
        # Query
        $q2 = 'SELECT *
        FROM company_rankings
        WHERE company_id =' . $company_id;

        # Run the query, store the results in the variable $posts
        $companies = DB::instance(DB_NAME)->select_rows($q2);

        if (count($companies) == 1) {
            //    echo $companies[0]['score'];
            $company = $companies[0];
            echo $company['score'];
        } else {
            echo -1;
        }


    }
    /*This method calculates average score for each devices owned by a user. The average score will equate to the user status as being
     * green -compliant, yellow - some effort toward CM free and red - devices is using conflict mineral resources
     * status follow user during a session variable
     */
    public function status()
    {
     #step1 - query db to compute average score for devices owned by user

     $q= 'Select avg (b.score)
        from users_devices a,company_rankings b
        where a.company_id = b.company_id
        AND a.user_id='.$this->user-user_id;









    }



}#eoc
