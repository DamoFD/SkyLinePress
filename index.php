<?php
get_header();
?>

<article class="archive__article">

<?php
    if( have_posts() ) {

        while( have_posts() ) {

            the_post();
            

            get_template_part( 'template-parts/content', 'archive' );

        }

    }
?>

</article>

<?php
    the_posts_pagination();
?>

<?php
get_footer();
?>
