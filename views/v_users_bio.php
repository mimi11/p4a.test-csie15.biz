Your Account Information:
<div>
    <img src='/uploads/avatars/<?= $avatar ?>' alt="user_avatar">
    <br>

    <p>First Name: <?= $user->first_name ?></p>
    <br>

    <p>Last Name: <?= $user->last_name ?></p>
    <br>

    <p>Email: <?= $user->email ?></p>
    <br>
    <br>

    <h3>Update your account profile</h3>

    <form action="/users/bio_update" method="post" enctype="multipart/form-data">

        <label for="firstname">First Name:</label>
        <input id="first_name" name="first_name" type="text" required/>
        <label for="lastname">Last Name:</label>
        <input id="last_name" name="last_name" type="text" required/>


        <label for="password"> *Password</label>
        <input id="password" name="password" minimum-legnth="4" type="password" required/>
        <label for="email">* Email</label>
        <input id="email" name="email" type="email" required>
        </p>
        <?php if ($error == 'duplicate_email_error'): ?>
            <div class='error' style="color: red; line-height: 1.2">
                Sign up failed. E-Mail address already registered.
            </div>
            <br>
        <?php endif; ?>

        <?php if ($error == 'blank_fields_error'): ?>
            <div class='error' style="color: red; line-height: 1.2">
                Sign up failed. All fields must have a value
            </div>
            <br>

        <?php endif; ?>

        <input type="lastname" name="file" id="lastname"><br>
        <label for="email">Email:</label>
        <input type="email" name="file" id="email"><br>
        <label for="password">Password:</label>
        <input type="password" name="file" id="password"><br>
        <label for="checkpassword">Re-enter Password:</label>
        <input type="checkpassword" name="file" id="checkpassword">
        <br>
        <label for="file">Filename:</label>
        <input type="file" name="file" id="file"><br>
        <input type="submit" name="submit" value="Submit">
    </form>


</div>

