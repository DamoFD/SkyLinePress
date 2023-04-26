<?php

get_header('home');

?>

<article class="page__article">

<?php
    if( have_posts() ) {

        while( have_posts() ) {

            the_post();
            the_content();
        }

    }
?>

</article>

<?php
get_footer();
?>