<?php if ($user): ?>

    <p> You are logged in as <?= $user->first_name ?> <?= $user->last_name ?> </p>
    <p> Check out your profile <a href='/users/profile'> here</a> Or Follow the Chatters community
        <a href='/posts/users'>here</a></p> to hear about the lattest chatters



    <!-- Menu options for users who are not logged in -->
<?php else: ?>
    <div class="login">

        <form method='POST' action='/users/p_login'>

            Email<br>
            <input class ='login_input' type='text' name='email'>

            Password<br>
            <input class ='login_input' type='password' name='password'>

            <input type='submit' value='Log in'>
        </form>
    </div><!--end of Loging div-->



<?php endif; ?>
