<div>
    <?php if ($user): ?>


        <div class="avatar">

            <img src='/uploads/avatars/<?=$avatar?>' alt="user_avatar">

        </div>

        <div id="profile_links">
            <br>
            <a href='/users/bio/'>View Bio Info Here</a> |  <a href='/posts/add'> Add a new Chatter Here</a>
            <br>
            <br>

            <p>All My Chatters: &nbsp;<a href='/users/profile/'> See Below</a></p>
            <br>
            <br>
        </div> <!--End of profile links div-->


        <article>
            <?php foreach ($posts as $post_profile): ?>
                <div class="profile"><!--start of div profile-->



                    <h1><?= $post_profile['first_name'] ?> <?= $post_profile['last_name'] ?>&nbsp;</h1>
                    <h2>posted on:</h2>



                    <time datetime="<?= Time::display($post_profile['created'], 'Y-m-d G:i') ?>">
                        <?= Time::display($post_profile['created']) ?>
                        <br>
                    </time>




                    <br>
                    <p> <?= $post_profile['content'] ?></p>
                    <a href='/posts/Update/<?= $post_profile['post_id'] ?>'>Update</a> | <a
                        href='/posts/delete/<?= $post_profile['post_id'] ?>'>Delete</a>
                    <br>


                </div> <!--end of div profile-->
            <?php endforeach; ?>

        </article>

        <!-- Menu options for users who are not logged in -->

    <?php endif; ?>
</div>
