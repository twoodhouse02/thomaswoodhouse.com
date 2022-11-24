<?php

/**
 * mason functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mason
 */

if (!defined('THEME_VERSION')) {
	$theme = wp_get_theme();
	define('THEME_VERSION', $theme->Version); //gets version written in your style.css
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mason_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on mason, use a find and replace
		* to change 'mason' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('mason', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'mason'),
		)
	);

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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'mason_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'mason_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mason_content_width()
{
	$GLOBALS['content_width'] = apply_filters('mason_content_width', 640);
}
add_action('after_setup_theme', 'mason_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mason_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'mason'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'mason'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'mason_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function mason_scripts()
{
	wp_enqueue_style('mason-style', get_stylesheet_uri(), array(), THEME_VERSION);
	wp_style_add_data('mason-style', 'rtl', 'replace');
	wp_enqueue_style(
		'style-scss',
		get_template_directory_uri() . '/css/style.css',
		null, // an array of dependent styles
		THEME_VERSION, // version number
		// ...and no CSS media type
	);

	wp_enqueue_script('mason-navigation', get_template_directory_uri() . '/js/navigation.js', array(), THEME_VERSION, true);
	wp_enqueue_script('theme-scrips', get_template_directory_uri() . '/dist/bundle.js', array(), THEME_VERSION, true);


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'mason_scripts');


/**
 * Add Icons to Nav Items via ACF
 */

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects($items, $args)
{

	// loop
	foreach ($items as &$item) {

		// vars
		$icon = get_field('icon', $item);


		// append icon
		if ($icon) {

			$item->title = '<i class="isax isax-' . $icon . '"></i>' . $item->title;
		}
	}

	// return
	return $items;
}


/**
 * Limit Excerpt Length
 */

add_filter( 'excerpt_length', function($length) {
    return 15;
}, PHP_INT_MAX );

/**
 * Change Excerpt More Append
 */

function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
 * Enqueue Styles & Scripts for Slider (Splide JS)
 */

wp_register_style( 'SplideCSS', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.2/dist/css/splide-core.min.css' );
wp_enqueue_style('SplideCSS');

wp_register_script( 'SplideJS', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.2/dist/js/splide.min.js', null, null, true );
wp_enqueue_script('SplideJS');


/**
 * Enqueue Styles & Scripts for AOS (Animate On Scroll)
 */

wp_register_style( 'AOSCSS', 'https://unpkg.com/aos@2.3.1/dist/aos.css' );
wp_enqueue_style('AOSCSS');

wp_register_script( 'AOSJS', 'https://unpkg.com/aos@2.3.1/dist/aos.js', null, null, true );
wp_enqueue_script('AOSJS');


/**
 * Enqueue Scripts for Masonry JS
 */

wp_register_script( 'masonryJS', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', null, null, true );
wp_enqueue_script('masonryJS');


/**
 * Enqueue Scripts for ImagesLoaded JS
 */

wp_register_script( 'imagesLoadedJS', 'https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js', null, null, true );
wp_enqueue_script('imagesLoadedJS');



/**
 * Enqueue Scripts for Chart JS
 */

wp_register_script( 'chartJS', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js', null, null, false );
wp_enqueue_script('chartJS');

/**
 * Enqueue Scripts for Chart - Radial Guage Extention JS
 */

wp_register_script( 'chartJSRadialExtention', 'https://pandameister.github.io/chartjs-chart-radial-gauge/docs/js/Chart.RadialGauge.umd.js', null, null, false );
wp_enqueue_script('chartJSRadialExtention');




/**
 * Enqueue Styles & Scripts for jQuery Modal
*/

wp_register_style( 'modalCSS', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css' );
wp_enqueue_style('modalCSS');

wp_register_script( 'modalJS', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js', null, null, true );
wp_enqueue_script('modalJS');


/**
 * Enqueue Styles for React Spring Bottom Sheet
*/

wp_register_style( 'reactSringCSS', 'https://unpkg.com/react-spring-bottom-sheet/dist/style.css' );
wp_enqueue_style('reactSringCSS');

/**
 * Enqueue Scripts for LottieFiles
 */

wp_register_script( 'lottieJS', 'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js', null, null, true );
wp_enqueue_script('lottieJS');

/**
 * ACF Options Page
 */

if( function_exists('acf_add_options_page') ) {
	

	acf_add_options_page(array(
		'page_title' 	=> 'Sitewide Controls',
		'menu_title'	=> 'Sitewide Controls',
		'menu_slug' 	=> 'sitewide-controls',
		'capability'	=> 'edit_posts',
		'icon_url'      => 'dashicons-admin-generic',
		'redirect'		=> false
	));
}

/**
* Customize the Favorites Button CSS Classes
*/
add_filter( 'favorites/button/css_classes', 'custom_favorites_button_css_classes', 10, 3 );
function custom_favorites_button_css_classes($classes, $post_id, $site_id)
{
	return "simplefavorite-button btn icon light";
}

/**
* Customize the protected content prefix (default: 'Protected:')
*/
function change_protected_title_prefix() {
    return '<div class="password-protected"><i class="isax isax-lock"></i></div> %s';
}
add_filter('protected_title_format', 'change_protected_title_prefix');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Allow password-protected posts to be searched through Ajax when not logged-in
 */

add_filter( 'posts_search', 'include_password_posts_in_search' );
function include_password_posts_in_search( $search ) {
    global $wpdb;
    if( !is_user_logged_in() ) {    
        $pattern = " AND ({$wpdb->prefix}posts.post_password = '')";
        $search = str_replace( $pattern, '', $search );
    }
    return $search;
}

/**
 * Customize the password-protected form
 */

function my_password_form() {
    global $post;
    $label = 'pwbox-' . ( empty($post->ID) ? rand() : $post->ID );
	$o =  '<div class="pw-wrapper">';
	$o .= '<div class="card accent-1 pw-entry">';
	$o .= '<i class="isax isax-lock-1"></i>';
    $o .= '<form action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">';
    $o .= '<p> Please enter your password to continue </p>';
    $o .= '<input name="post_password" id="' . $label . '" type="password" placeholder="Password"/>';
    $o .= '<input class="btn" type="submit" name="Submit" value="' . esc_attr__("Submit") . '" />';
    $o .= '</form>';
	$o .= '</div>';
	$o .= '</div>';
    return $o;
}

add_filter('the_password_form', 'my_password_form');

add_filter( 'the_password_form', 'wpse_71284_custom_post_password_msg' );

/**
 * Add a password error message to the password form.
 *
 * @wp-hook the_password_form
 * @param   string $form
 * @return  string
 */
function wpse_71284_custom_post_password_msg( $form )
{
    // No cookie, the user has not sent anything until now.
    if ( ! isset ( $_COOKIE[ 'wp-postpass_' . COOKIEHASH ] ) )
        return $form;

    // The refresh came from a different page, the user has not sent anything until now.
    if ( ! wp_get_raw_referer() == get_permalink() )
        return $form;

    // Translate and escape.
    $msg = esc_html__( 'Sorry, your password is incorrect. Please try again.', 'your_text_domain' );

    // We have a cookie, but it doesn’t match the password.
    $msg = "<div class='error-wrap'><p class='sm pw input-error icon'>$msg</p></div>";

    return $form . $msg;
}


/*
 ==================
 Ajax Search - Dashboards Only
======================	 
*/
// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function fetch(){

    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
        success: function(data) {
            jQuery('#datafetch').html( data );
        }
    });

}
</script>

<?php
}

// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch' , 'data_fetch');

function data_fetch(){

    $the_query = new WP_Query( array( 
	'posts_per_page' => -1,
	's' => esc_attr( $_POST['keyword'] ),
	'post_type' => array(‘dashboard’)
	) );
    if( $the_query->have_posts() ) :
        echo '<ul>';
        while( $the_query->have_posts() ): $the_query->the_post(); ?>

            <li><a href="<?php echo esc_url( the_permalink() ); ?>"><?php the_title();?></a></li>

        <?php endwhile; echo '</ul>'; ?>

		<?php else: ?>

			<p>No Dashboards Found</p>

			<?php

        wp_reset_postdata();  
    endif;

    die();
}


/**
 * Register Custom Page Type: Dashboards
 */

add_action( 'init', 'dashboard_register_post_type' );
function dashboard_register_post_type() {
	$args = [
		'label'  => esc_html__( 'Dashboards', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Dashboards', 'mason' ),
			'name_admin_bar'     => esc_html__( 'Dashboard', 'mason' ),
			'add_new'            => esc_html__( 'Add Dashboard', 'mason' ),
			'add_new_item'       => esc_html__( 'Add new Dashboard', 'mason' ),
			'new_item'           => esc_html__( 'New Dashboard', 'mason' ),
			'edit_item'          => esc_html__( 'Edit Dashboard', 'mason' ),
			'view_item'          => esc_html__( 'View Dashboard', 'mason' ),
			'update_item'        => esc_html__( 'View Dashboard', 'mason' ),
			'all_items'          => esc_html__( 'All Dashboards', 'mason' ),
			'search_items'       => esc_html__( 'Search Dashboards', 'mason' ),
			'parent_item_colon'  => esc_html__( 'Parent Dashboard', 'mason' ),
			'not_found'          => esc_html__( 'No Dashboards found', 'mason' ),
			'not_found_in_trash' => esc_html__( 'No Dashboards found in Trash', 'mason' ),
			'name'               => esc_html__( 'Dashboards', 'mason' ),
			'singular_name'      => esc_html__( 'Dashboard', 'mason' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'page',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => false,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-chart-pie',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'custom-fields',
		],
		
		'rewrite' => true
	];

	register_post_type( 'dashboard', $args );
}


