Your Info

<div>
    <img src='<? $avatar ?>' alt="user_avatar">

    <br>
    <br>

    <p>First Name: <?= $user->first_name ?></p>
    <br>

    <p>Last Name: <?= $user->last_name ?></p>
    <br>

    <p>Email: <?= $user->email ?></p>
    <br>
    <br>

    <h3>Update your profile picture coming soon features</h3>


    <form action="/users/bio_update" method="post"
          enctype="multipart/form-data">
        <label for="file">Filename:</label>
        <input type="file" name="file" id="file"><br>
        <input type="submit" name="submit" value="Submit">
    </form>


</div>

