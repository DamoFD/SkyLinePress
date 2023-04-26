<footer class="footer">

<hr>

<p class="footer__title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>

<?php
        dynamic_sidebar('footer-1');
    ?>

</footer>

</div>

<?php
wp_footer();
?>

</body>

</html>
