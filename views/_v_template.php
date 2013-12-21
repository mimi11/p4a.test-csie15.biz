<!DOCTYPE html>
<html>
<head>
    <title><?php if (isset($title)) echo $title; ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <!-- Controller Specific JS/CSS -->
    <!--?php if(isset($client_files_head)) echo $client_files_head; ?-->
    <link rel="stylesheet" href="/css/app.css" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


    <!-- tracking scripts
    you may have java script has to be there before the java code execute
    it comes down to a performance thing - so js script let all the content load
    first, then let the java script -->

</head>

<body>
<div id='wrapper'>
    <div class='header'> <!--div Header starts here-->
        <div class="login_intro">
            <?php if ($user): ?>
                <a href='/users/logout'>Logout </a>

            <?php else: ?>
                <a href='/users/login'>Login </a>  |
                <a href='/users/Signup'>Signup </a>
            <?php endif; ?>

        </div>
        <?php if ($user): ?>
        <div id='app_name'>
            <h1><?= APP_NAME ?></h1>
        </div>
        <div id='header_intro'> <!--div header_Intro starts here-->
            <h4>Welcome to <?= APP_NAME ?> <?php if ($user) echo ', ' . $user->first_name; ?> </h4>

            <div id='session_status' class='user_status <?php echo $_SESSION['status']; ?>'>
            </div>
            <!--end of session_status-->

            <!--if user not logged in-->
            <?php else: ?>
                <h1><?= APP_NAME ?></h1>
            <?php
            endif; ?>
        </div>
        <!--end of div header_intro"-->
    </div>
    <!--End of div header"-->

    <div id='navigation'> <!-- Menu navigation  for users who are logged in -->
        <a href='/'>Home</a> |
        <a href='/index/about'>About</a>
        <?php if ($user): ?>

          | <a href='/users/profile'> Profile </a> |
            <a href='/posts/users'> Friends </a> |
            <a href='/rankings/index'> Company Rankings </a> |
            <a href='/posts'> All Posts </a>
            <!-- Menu options for users who are not logged in -->
        <?php else: ?>

        <?php endif; ?>
    </div>
    <!-- End of menu Navigation div here -->

    <div class="main_content"> <!-- Main div starts  -->
        <div class="col1">

            <?php if (isset($client_files_body)) echo $client_files_body; ?>
            <?php if (isset($content)) echo $content; ?>
        </div>
        <div class="col2">


        </div>
        <!--end of column 2-->
    </div>
    <!-- end of Main_content-->

    <div id="footer">
    </div>
    <!--End of Footer div-->
</div>
<!--end of wrapper-->
</body>
</html>
