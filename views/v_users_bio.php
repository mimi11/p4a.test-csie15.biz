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

        <label for="lastname">First Name:</label><br>
        <input id="first_name" name="first_name" type="text" required/><br>
        <label for="lastname">Last Name:</label><br>
        <input id="last_name" name="last_name" type="text" required/><br>
        <label for="password"> *Password</label><br>
        <input id="password" name="password" minimum-legnth="4" type="password" required/><br>
        <label for="email">* Email</label><br>
        <input id="email" name="email" type="email" required><br>

        <label for="file">Filename:</label>
        <input type="file" name="file" id="file"><br>
        <input type="submit" name="submit" value="Submit">
    </form>


</div>

