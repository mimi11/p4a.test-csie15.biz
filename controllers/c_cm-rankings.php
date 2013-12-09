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
        $q = 'SELECT
            posts.content,
            posts.post_id,
            posts.created,
            posts.user_id AS post_user_id,
            users_users.user_id AS follower_id,
            users.first_name,
            users.last_name
        FROM posts
        INNER JOIN users_users
            ON posts.user_id = users_users.user_id_followed
        INNER JOIN users
            ON posts.user_id = users.user_id
        WHERE users_users.user_id = ' . $this->user->user_id;

        # Run the query, store the results in the variable $posts
        $posts = DB::instance(DB_NAME)->select_rows($q);

        # Pass data to the View
        $this->template->content->posts = $posts;

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
