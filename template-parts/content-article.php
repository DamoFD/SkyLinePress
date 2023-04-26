<div class="article__author">
    <?php the_date(); ?> by <?php the_author_posts_link(); ?>
</div>

<?php
the_content();
?>

<?php
comments_template();
?>