<?php
/**
 * SkyLinePress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SkyLinePress
 */

 require get_template_directory() . '/class-custom-walker.php';


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function skylinepress_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on SkyLinePress, use a find and replace
		* to change 'skylinepress' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'skylinepress', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	//enable page excerpts
	function enable_page_excerpts() {
		add_post_type_support('page', 'excerpt');
	}
	add_action('init', 'enable_page_excerpts');
	

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

}
add_action( 'after_setup_theme', 'skylinepress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function skylinepress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'skylinepress_content_width', 640 );
}
add_action( 'after_setup_theme', 'skylinepress_content_width', 0 );

/* Register widget area */

function skyLinePress_widget_areas() {

        register_sidebar(
            array(
                'before_title' => '',
                'after_title' => '',
                'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
                'after_widget' => '</ul>',
                'name' => 'Footer Area',
                'id' => 'footer-1',
                'description' => 'Footer Widget Area',
            )
            );

}
add_action( 'widgets_init', 'skyLinePress_widget_areas' );

// enable custom menus
function skyLine_menus() {

	$locations = array(
		'header' => "Header Menu Items",
		'footer' => "Footer Menu Items"
	);

	register_nav_menus($locations);

}

add_action('init', 'skyLine_menus');

function skylinepress_custom_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
	<div <?php comment_class( 'custom-comment-class' ); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, $args['avatar_size'], '', '', array( 'class' => 'custom-avatar-class' ) ); ?>
			<?php printf( __( '<cite class="custom-author-class">%s</cite>' ), get_comment_author_link() ); ?>
		</div>

		<div class="comment-meta commentmetadata">
			<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php printf( __( '%1$s at %2$s' ), get_comment_date(), get_comment_time() ); ?>
			</a>
			<?php edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
		</div>

		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-text">
			<?php comment_text(); ?>
		</div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div>
	<?php
}




/**
 * Enqueue scripts and styles.
 */
function skylinepress_scripts() {
	wp_enqueue_style( 'skylinepress-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style('skyline-press-custom-style', get_stylesheet_directory_uri() . '/style.css', array(), 'all'); 

	wp_enqueue_script('skylinepress-main', get_template_directory_uri() . '/main.js', array(), '1.0.0', true);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skylinepress_scripts' );


