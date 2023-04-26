<div class="archive__container">

    <div class="archive__post">
        <div>
            <img class="archive__thumbnail" src="<?php
                the_post_thumbnail_url();
            ?>" alt="image">
            <div>
                <h2 class="archive__post-title">
                    <a href="<?php the_permalink(); ?>">
                    <?php
                    the_title();
                    ?>
                    </a>
                </h2>
                <p class="archive__author"><?php the_date(); ?> by <?php the_author_posts_link(); ?></p>
                <div class="archive__excerpt">
                    <?php
                    the_excerpt();
                    ?>
                </div>
                <a class="archive__btn" href="<?php the_permalink(); ?>">Read more</a>
            </div><!--//media-body-->
        </div><!--//media-->
    </div>
</div>