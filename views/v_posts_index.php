<article>

    <?php foreach($posts as $post): ?>


        <h1><?=$post['first_name']?> <?=$post['last_name']?>&nbsp;</h1>


        <br>

        <time class="post_time" datetime="<?=Time::display($post['created'],'Y-m-d H:i')?>">
            <?=Time::display($post['created'])?>
        </time>

        <br>

        <p><br><?=$post['content']?></p>
        <br>


    <?php endforeach; ?>
</article>
