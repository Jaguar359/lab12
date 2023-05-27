<div class="container">
    <?php
    foreach ($posts as $post) {
        echo $this->render('_post', [
            'post' => $post,
        ]);
    }
    ?>
</div>
