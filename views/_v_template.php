<!DOCTYPE html>
<html>
<head>
    <title><?php if(isset($title)) echo $title;?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <?php if(isset($client_files_head)) echo $client_files_head; ?>

    <!-- Controller Specific JS/CSS -->
    <link rel="stylesheet" href="/css/app.css" type ="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
    <script src ="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/additional-methods.js"></script>
    <script src ="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/additional-methods.min.jss"></script>
"
   <!--script src = '/js/rankings.js'></script>


    <!-- tracking scripts
    you may have java script has to be there before the java code execute
    it comes down to a performance thing - so js script let all the content load
    first, then let the java script -->

</head>

<body class ='cmbuzz_site'>
  <div class ='wrapper'>
        <div class= 'header'> <!--div Header starts here-->
             <?php if($user): ?>
                <h1><?=APP_NAME?></h1>
                    <div class="header_intro"> <!--div header_Intro starts here-->
                        <h4>Welcome to <?= APP_NAME ?><?php if ($user) echo ', ' . $user->first_name; ?></h4>
                            <?php else: ?>
                                <h1><?=APP_NAME?></h1>
                                    <div class ='login_intro'>
                                          <?=$login?>
                                    </div>
                             <?php endif; ?>
                    </div> <!--end of div header_intro"-->
        </div><!--End of div Header"-->

        <div id='navigation'><!--div Navigation starts here-->
        <!-- Menu navigation  for users who are logged in -->
             <?php if($user): ?>
                <a href='/'>Home</a> |
                <a href='/users/logout'>Logout  </a>  |
                <a href='/users/profile'>My Profile </a> |
                <a href='/posts/users'> Members  </a> |
                <a href='/rankings/index'> Company Rankings  </a> |
                <a href='/posts'> Followed Chatters </a>
                    <!-- Menu options for users who are not logged in -->
                    <?php else: ?>
                        <a href='/users/logout'>Why CMBUZZ  </a>  |
                        <a href='/users/profile'>Read Me info </a> |
             <?php endif; ?>
        </div> <!-- End of menu Navigation div here -->
        <div id="main"> <!-- Main div starts  -->
            <?php if(isset($content)) echo $content;?>
                <?php if(isset($client_files_body)) echo $client_files_body; ?>
        </div><!-- end of Main-->
        <div id= "footer">
        </div><!--End of Footer div-->
   </div><!--end of wrapper-->
</body>
</html>
