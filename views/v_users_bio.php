Your Account Information:
<div>
   <img src='<?$avatar?>' alt="user_avatar">
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
        <input type="firstname" name="file" id="firstname"><br>
        <label for="lastname">Last Name:</label>
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

