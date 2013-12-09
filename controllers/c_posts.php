<?php
/*-------------------------------------------------------------------------------------------------


   -------------------------------------------------------------------------------------------------*/
class posts_controller extends base_controller
{

    public function __construct()
    {
        parent::__construct();


        # Make sure user is logged in if they want to use anything in this controller
        if (!$this->user) {

            Router::redirect('/users/login');

        }
    }

    public function add()
    {

        # Setup view
        $this->template->content = View::instance('v_posts_add');
        $this->template->title = "New Post";

        # Render template
        echo $this->template;

    }

    public function p_add()
    {

        # Associate this post with this user
        $_POST['user_id'] = $this->user->user_id;

        # Unix timestamp of when this post was created / modified
        $_POST['created'] = Time::now();
        $_POST['modified'] = Time::now();

        # Insert
        # Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
        DB::instance(DB_NAME)->insert('posts', $_POST);

        # Quick and dirty feedback
        echo "Your post has been added. <a href='/users/profile'>Back to your post.</a> Add a new post <a href = '/posts/add'> Here</a>";

    }


    public function update($post_id)
    {
        #To render selected $ post id to the form, it must be retrieved from the table and stored into a new value that will be render by the view.
        $post = DB::instance(DB_NAME)->select_row('SELECT * FROM posts WHERE post_id = ' . $post_id);
        # Setup view
        $this->template->content = View::instance('v_posts_update');
        $this->template->title = "View/Edit Post";
        # Pass data to the View
        $this->template->content->post = $post;
        # Render template
        echo $this->template;

    }

    public function p_update()
    {
        # An object loaded by the framework coming directly from the form. Checking to ensure that only the id is only passed from the form and not injected into url
        $post_id = $this->sanitize_id($_POST['post_id']);
        $post = array();


        # Unix timestamp of when this post was modified
        $post['modified'] = Time::now();

        # This variable will update the content from the user update
        $post['content'] = $_POST['content'];

        #storing into user object $post and passing back to the DB


        $number_of_rows_updated = DB::instance(DB_NAME)->update('posts', $post,
            "WHERE post_id = '"
            . $post_id
            . "' AND user_id ='"
            . $this->user->user_id
            . "'");

        if ($number_of_rows_updated == 1) {
            echo "Your post has been updated: " . $post_id . " <a href='/users/profile'>Back to your post</a>";
        } # Means there is something went wrong - e.g parameter is wrong since update() should only update a single row.
        else {
            echo "Unable to update your post <a href='/users/profile'>Back to your post</a>";

        }


    }

    public function delete($post_id)
    {
        $post_id = $this->sanitize_id($post_id);
        $number_of_rows_deleted = DB::instance(DB_NAME)->delete('posts', "WHERE post_id = '"
            . $post_id
            . "' AND user_id ='"
            . $this->user->user_id
            . "'");

        if ($number_of_rows_deleted == 1) {
            echo "Your post has been deleted: " . $post_id . " <a href='/users/profile'>Back to your post</a>";
        } # Means there is something went wrong - e.g parameter is wrong since update() should only update a single row.
        else {
            echo "Unable to delete your post <a href='/users/profile'>Back to your post</a>";
        }


    }

    public function index()
    {

        # Set up the View
        $this->template->content = View::instance('v_posts_index');
        $this->template->title = "All Posts";

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


    public function users()
    {

        # Set up the View
        $this->template->content = View::instance("v_posts_users");
        $this->template->title = "Users";

        # Build the query to get all the users
        $q = "SELECT *
        FROM users";

        # Execute the query to get all the users.
        # Store the result array in the variable $users
        $users = DB::instance(DB_NAME)->select_rows($q);

        # Build the query to figure out what connections does this user already have?
        # I.e. who are they following
        $q = "SELECT *
        FROM users_users
        WHERE user_id = " . $this->user->user_id;

        # Execute this query with the select_array method
        # select_array will return our results in an array and use the "users_id_followed" field as the index.
        # This will come in handy when we get to the view
        # Store our results (an array) in the variable $connections
        $connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');

        # Pass data (users and connections) to the view
        $this->template->content->users = $users;
        $this->template->content->connections = $connections;

        # Render the view
        echo $this->template;
    }

    public function follow($user_id_followed)
    {

        # Prepare the data array to be inserted
        $data = Array(
            "created" => Time::now(),
            "user_id" => $this->user->user_id,
            "user_id_followed" => $user_id_followed
        );

        # Do the insert
        DB::instance(DB_NAME)->insert('users_users', $data);

        # Send them back
        Router::redirect("/posts/users");

    }

    public function unfollow($user_id_followed)
    {

        # Delete this connection
        $where_condition = 'WHERE user_id = ' . $this->user->user_id . ' AND user_id_followed = ' . $user_id_followed;
        DB::instance(DB_NAME)->delete('users_users', $where_condition);

        # Send them back
        Router::redirect("/posts/users");

    }
}# eoc
