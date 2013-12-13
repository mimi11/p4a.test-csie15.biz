<!DOCTYPE html>
<html>
<head>
    <title><?php if(isset($title)) echo $title;?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <?php if(isset($client_files_head)) echo $client_files_head; ?>

    <!-- Controller Specific JS/CSS -->
    <link rel="stylesheet" href="/css/app.css" type ="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <!--script src = '/js/rankings.js'></script>


    <!-- tracking scripts
    you may have java script has to be there before the java code execute
    it comes down to a performance thing - so js script let all the content load
    first, then let the java script -->

</head>

<body class ='cmbuzz_site'>
    <div class ='wrapper'>
     <div id = "header"> <!--div Header starts here-->
        <h1><?=APP_NAME?></h1>
          <div id="header_intro"> <!--div header_Intro starts here-->
            <h4>Welcome to <?= APP_NAME ?><?php if ($user) echo ', ' . $user->first_name; ?></h4>
          </div> <!--end of div header_intro"-->
    </div><!--End of div Header"-->

    <div id='navigation'><!--div Navigation starts here-->
      <a href='/'>Home</a> |
        <!-- main Menu for users who are logged in -->
         <?php if($user): ?>
            <a href='/users/logout'>Logout  </a>  |
            <a href='/users/profile'>My Profile </a> |
            <a href='/posts/users'> Members  </a> |
            <a href='/rankings/index'> Company Rankings  </a> |
            <a href='/posts'> Followed Chatters </a>
            <!-- Menu options for users who are not logged in -->
        <?php else: ?>
            <a href='/users/signup'>Sign up</a> |
            <a href='/users/login' title="Are you already a member? Login here">Log in</a>
        <?php endif; ?>
     </div> <!-- End of main menu Navigation div here -->

    <br>
    <div id="main"> <!-- Main div starts  -->
        <?php if(isset($content)) echo $content;?>


        <?php if(isset($client_files_body)) echo $client_files_body; ?>

    </div><!-- end of Main-->

    </div><!--end of wrapper-->

    <div id= "footer">


    </div><!--End of Footer div-->

</body>
</html>
