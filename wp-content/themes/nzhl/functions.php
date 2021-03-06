<?php
if ( ! function_exists( 'some_like_it_neat_setup' ) ) :
	/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function some_like_it_neat_setup() {

		/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
		if ( ! isset( $content_width ) ) {
			$content_width = 640; /* pixels */
		}

		/*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on some_like_it_neat, use a find and replace
        * to change 'some-like-it-neat' to the name of your theme in all the template files
        */
		load_theme_textdomain( 'some-like-it-neat', get_template_directory() . '/library/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
        */
		add_theme_support( 'post-thumbnails' );

		/*
        * Enable title tag support for all posts.
        *
        * @link http://codex.wordpress.org/Title_Tag
        */
		add_theme_support( 'title-tag' );

		/*
        * Add Editor Style for adequate styling in text editor.
        *
        * @link http://codex.wordpress.org/Function_Reference/add_editor_style
        */
		add_editor_style( '/assets/css/editor-style.css' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary-navigation', __( 'Primary Menu', 'some-like-it-neat' ) );

		// Enable support for Post Formats.
		if ( 'yes' === get_theme_mod( 'some-like-it-neat_post_format_support' ) ) {
			add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'status', 'gallery', 'chat', 'audio' ) );
		}

		// Enable Support for Jetpack Infinite Scroll
		if ( 'yes' === get_theme_mod( 'some-like-it-neat_infinite_scroll_support' ) ) {
			$scroll_type = get_theme_mod( 'some-like-it-neat_infinite_scroll_type' );
			add_theme_support( 'infinite-scroll', array(
				'type'				=> $scroll_type,
				'footer_widgets'	=> false,
				'container'			=> 'content',
				'wrapper'			=> true,
				'render'			=> false,
				'posts_per_page' 	=> false,
				'render'			=> 'some_like_it_neat_infinite_scroll_render',
				) );

			function some_like_it_neat_infinite_scroll_render() {
				if ( have_posts() ) : while ( have_posts() ) : the_post();
				get_template_part( 'page-templates/partials/content', get_post_format() );
				endwhile;
				endif;
			}
		}

		// Setup the WordPress core custom background feature.
		add_theme_support(
			'custom-background', apply_filters(
				'some_like_it_neat_custom_background_args', array(
					'default-color' => 'ffffff',
					'default-image' => '',
					)
				)
			);

		/**
	 * Including Theme Hook Alliance (https://github.com/zamoose/themehookalliance).
	 */
		include 'library/vendors/theme-hook-alliance/tha-theme-hooks.php' ;

		/**
	 * WP Customizer
	 */
		include get_template_directory() . '/library/vendors/customizer/customizer.php';

		/**
	 * Implement the Custom Header feature.
	 */
		//require get_template_directory() . '/library/vendors/custom-header.php';

		/**
	 * Custom template tags for this theme.
	 */
		include get_template_directory() . '/library/vendors/template-tags.php';

		/**
	 * Custom functions that act independently of the theme templates.
	 */
		include get_template_directory() . '/library/vendors/extras.php';

		/**
	 * Load Jetpack compatibility file.
	 */
		include get_template_directory() . '/library/vendors/jetpack.php';

		/**
	 * Including TGM Plugin Activation
	 */
		include_once get_template_directory() . '/library/vendors/tgm-plugin-activation/class-tgm-plugin-activation.php' ;

		include_once get_template_directory() . '/library/vendors/tgm-plugin-activation/tgm-plugin-activation.php' ;

	}
endif; // some_like_it_neat_setup
add_action( 'after_setup_theme', 'some_like_it_neat_setup' );

/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'some_like_it_neat_scripts' ) ) :
	function some_like_it_neat_scripts() {


		if ( SCRIPT_DEBUG || WP_DEBUG ) :
			// Vendor Scripts
			wp_register_script( 'modernizr-js', get_template_directory_uri() . '/assets/js/vendor/modernizr/modernizr.js', array( 'jquery' ), '2.8.2', true );
		wp_enqueue_script( 'modernizr-js', get_template_directory_uri() . '/assets/js/vendor/modernizr/modernizr.js', array( 'jquery' ), '2.8.2', true );

		wp_register_script( 'selectivizr-js', get_template_directory_uri() . '/assets/js/vendor/selectivizr/selectivizr.js', array( 'jquery' ), '1.0.2b', true );
		wp_enqueue_script( 'selectivizr-js', get_template_directory_uri() . '/assets/js/vendor/selectivizr/selectivizr.js', array( 'jquery' ), '1.0.2b', true );

		wp_register_script( 'flexnav-js', get_template_directory_uri() . '/assets/js/vendor/flexnav/jquery.flexnav.js', array( 'jquery' ), '1.3.3', true );
		wp_enqueue_script( 'flexnav-js', get_template_directory_uri() . '/assets/js/vendor/flexnav/jquery.flexnav.js', array( 'jquery' ), '1.3.3', true );

		wp_register_script( 'hoverintent-js', get_template_directory_uri() . '/assets/js/vendor/hoverintent/jquery.hoverIntent.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'hoverintent-js', get_template_directory_uri() . '/assets/js/vendor/hoverintent/jquery.hoverIntent.js', array( 'jquery' ), '1.0.0', true );

		wp_register_script( 'accordion.js', get_template_directory_uri() . '/assets/js/vendor/accordion/accordion.js', array( 'jquery' ), '2.8.2', true );
		wp_enqueue_script( 'accordion.js', get_template_directory_uri() . '/assets/js/vendor/accordion/accordion.js', array( 'jquery' ), '2.8.2', true );

		wp_register_script( 'parallax.js', get_template_directory_uri() . '/assets/js/vendor/parallax/parallax.js', array( 'jquery' ), '1.4.2', true );
		wp_enqueue_script( 'parallax.js', get_template_directory_uri() . '/assets/js/vendor/parallax/parallax.js', array( 'jquery' ), '1.4.2', true );

		// wp_register_script( 'jquery.sticky-kit.js', get_template_directory_uri() . '/assets/js/vendor/sticky-kit-master/jquery.sticky-kit.js', array( 'jquery' ), '2.8.2', true );
		// wp_enqueue_script( 'jquery.sticky-kit.js', get_template_directory_uri() . '/assets/js/vendor/sticky-kit-master/jquery.sticky-kit.js', array( 'jquery' ), '2.8.2', true );

		wp_register_script( 'dataTables.js', get_template_directory_uri() . '/assets/js/vendor/dataTables.js', array( 'jquery' ), '1.10.11', true );
		wp_enqueue_script( 'dataTables.js', get_template_directory_uri() . '/assets/js/vendor/dataTables.js', array( 'jquery' ), '1.10.11', true );


		wp_register_script( 'main.js', get_template_directory_uri() . '/assets/js/vendor/main.js', array( 'jquery' ), '2.8.2', true );
		wp_enqueue_script( 'main.js', get_template_directory_uri() . '/assets/js/vendor/main.js', array( 'jquery' ), '2.8.2', true );
			// Concatonated Scripts
			// wp_enqueue_script( 'development-js', get_template_directory_uri() . '/assets/js/development.js', array( 'jquery' ), '1.0.0', false );

			// Main Style
		wp_enqueue_style( 'some_like_it_neat-datatables',  get_template_directory_uri() . '/assets/css/dataTables.css' );
		wp_enqueue_style( 'some_like_it_neat-style',  get_template_directory_uri() . '/assets/css/style.css' );
		wp_enqueue_style( 'ss_social_circle',  get_template_directory_uri() . '/assets/fonts/webfonts/ss-social-circle.css' );
		wp_enqueue_style( 'tooltipster',  get_template_directory_uri() . '/assets/css/vendor/tooltipster.css' );
		wp_register_style('et-googleFonts', 'https://fonts.googleapis.com/css?family=Noto+Serif|Noto+Sans:400,700');
		wp_enqueue_style( 'et-googleFonts');

		else :
			// Vendor Scripts
			wp_register_script( 'modernizr-js', get_template_directory_uri() . '/assets/js/vendor/modernizr/modernizr.js', array( 'jquery' ), '2.8.2', true );
		wp_enqueue_script( 'modernizr-js', get_template_directory_uri() . '/assets/js/vendor/modernizr/modernizr.js', array( 'jquery' ), '2.8.2', true );

		wp_register_script( 'selectivizr-js', get_template_directory_uri() . '/assets/js/vendor/selectivizr/selectivizr.js', array( 'jquery' ), '1.0.2b', true );
		wp_enqueue_script( 'selectivizr-js', get_template_directory_uri() . '/assets/js/vendor/selectivizr/selectivizr.js', array( 'jquery' ), '1.0.2b', true );

		wp_register_script( 'flexnav-js', get_template_directory_uri() . '/assets/js/vendor/flexnav/jquery.flexnav.js', array( 'jquery' ), '1.3.3', true );
		wp_enqueue_script( 'flexnav-js', get_template_directory_uri() . '/assets/js/vendor/flexnav/jquery.flexnav.js', array( 'jquery' ), '1.3.3', true );

		wp_register_script( 'hoverintent-js', get_template_directory_uri() . '/assets/js/vendor/hoverintent/jquery.hoverIntent.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'hoverintent-js', get_template_directory_uri() . '/assets/js/vendor/hoverintent/jquery.hoverIntent.js', array( 'jquery' ), '1.0.0', true );

		wp_register_script( 'accordion.js', get_template_directory_uri() . '/assets/js/vendor/accordion/accordion.js', array( 'jquery' ), '2.8.2', true );
		wp_enqueue_script( 'accordion.js', get_template_directory_uri() . '/assets/js/vendor/accordion/accordion.js', array( 'jquery' ), '2.8.2', true );

		wp_register_script( 'parallax.js', get_template_directory_uri() . '/assets/js/vendor/parallax/parallax.js', array( 'jquery' ), '1.4.2', true );
		wp_enqueue_script( 'parallax.js', get_template_directory_uri() . '/assets/js/vendor/parallax/parallax.js', array( 'jquery' ), '1.4.2', true );

		wp_register_script( 'isotope.js', get_template_directory_uri() . '/assets/js/vendor/isotope/isotope.js', array( 'jquery' ), '2.8.2', true );
		wp_enqueue_script( 'isotope.js', get_template_directory_uri() . '/assets/js/vendor/isotope/isotope.js', array( 'jquery' ), '2.8.2', true );

		wp_register_script( 'bootstrap-dropdown.js', get_template_directory_uri() . '/assets/js/vendor/bootstrap-dropdown.js', array( 'jquery' ), '2.8.2', true );
		wp_enqueue_script( 'bootstrap-dropdown.js', get_template_directory_uri() . '/assets/js/vendor/bootstrap-dropdown.js', array( 'jquery' ), '2.8.2', true );


		// wp_register_script( 'jquery.sticky-kit.js', get_template_directory_uri() . '/assets/js/vendor/sticky-kit-master/jquery.sticky-kit.js', array( 'jquery' ), '2.8.2', true );
		// wp_enqueue_script( 'jquery.sticky-kit.js', get_template_directory_uri() . '/assets/js/vendor/sticky-kit-master/jquery.sticky-kit.js', array( 'jquery' ), '2.8.2', true );

		wp_register_script( 'matchHeight.js', get_template_directory_uri() . '/assets/js/vendor/matchHeight/matchHeight.js', array( 'jquery' ), '2.8.2', true );
		wp_enqueue_script( 'matchHeight.js', get_template_directory_uri() . '/assets/js/vendor/matchHeight/matchHeight.js', array( 'jquery' ), '2.8.2', true );


		wp_register_script( 'main.js', get_template_directory_uri() . '/assets/js/vendor/main.js', array( 'jquery' ), '2.8.2', true );
		wp_enqueue_script( 'main.js', get_template_directory_uri() . '/assets/js/vendor/main.js', array( 'jquery' ), '2.8.2', true );
			// Concatonated Scripts
			// wp_enqueue_script( 'production-js', get_template_directory_uri() . '/assets/js/production-min.js', array( 'jquery' ), '1.0.0', false );

			// Main Style
		wp_enqueue_style( 'some_like_it_neat-style',  get_template_directory_uri() . '/assets/css/style.css' );
		wp_enqueue_style( 'ss_social_circle',  get_template_directory_uri() . '/assets/fonts/webfonts/ss-social-circle.css' );
		wp_enqueue_style( 'tooltipster',  get_template_directory_uri() . '/assets/css/vendor/tooltipster.css' );
		wp_register_style('et-googleFonts', 'https://fonts.googleapis.com/css?family=Noto+Serif|Noto+Sans:400,700');
		wp_enqueue_style( 'et-googleFonts');

		endif;

		// Dashicons
		wp_enqueue_style( 'dashicons' );

			// if ( is_page( 'news' ) ) {
			// 	wp_enqueue_script( 'jquery-masonry' );
			// }


		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'some_like_it_neat_scripts' );

	//Jquery Rollback
	function rollback_jquery() {
		wp_deregister_script('jquery');
		wp_register_script('jquery', "https" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") .
			"://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js", false, null);
		wp_enqueue_script('jquery');
	}

	add_action("wp_enqueue_scripts", "rollback_jquery");
endif; // Enqueue Scripts and Styles

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function some_like_it_neat_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'some-like-it-neat' ),
			'id'            => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
			)
		);

	register_sidebar(
		array(
			'name'          => 'Sidebar Front Page',
			'id'            => 'sidebar-frontpage',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
			)
		);

	register_sidebar(
		array(
			'name'          => 'Blog Page',
			'id'            => 'sidebar-blog',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
			)
		);
}
add_action( 'widgets_init', 'some_like_it_neat_widgets_init' );

/**
 * Initializing Flexnav Menu System
 */
if ( ! function_exists( 'dg_add_flexnav' ) ) :
	function dg_add_flexnav() {
		?>
		<script>
				// Init Flexnav Menu
			jQuery(document).ready(function($){
				$(".flexnav").flexNav({
						'animationSpeed' : 250, // default drop animation speed
						'transitionOpacity': true, // default opacity animation
							'buttonSelector': '.menu-button', // default menu button class
							'hoverIntent': true, // use with hoverIntent plugin
							'hoverIntentTimeout': 350, // hoverIntent default timeout
							'calcItemWidths': false // dynamically calcs top level nav item widths
						});
			});
		</script>
		<?php
	}
	add_action( 'wp_footer', 'dg_add_flexnav' );
	endif;
/**
 * Add Singular Post Template Navigation
 */
if ( ! function_exists( 'some_like_it_neat_post_navigation' ) ) :
	function some_like_it_neat_post_navigation() {
		if ( function_exists( 'get_the_post_navigation' ) && is_singular() ) {
			echo get_the_post_navigation(
				array(
					'prev_text'    => __( '%title', 'some-like-it-neat' ),
					'next_text'    => __( '%title', 'some-like-it-neat' ),
					'screen_reader_text' => __( 'Page navigation', 'some-like-it-neat' )
					)
				);
		} else {
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'some-like-it-neat' ),
					'after'  => '</div>',
					)
				);
		}
	}
	endif;
	add_action( 'tha_entry_after', 'some_like_it_neat_post_navigation' );

/**
 * Custom Hooks and Filters
 */
if ( ! function_exists( 'some_like_it_neat_add_breadcrumbs' ) ) :
	function some_like_it_neat_add_breadcrumbs() {
		if ( ! is_front_page() ) {
			if ( function_exists( 'HAG_Breadcrumbs' ) ) { HAG_Breadcrumbs(
				array(
					'prefix'     => __( 'You are here: ', 'some-like-it-neat' ),
					'last_link'  => true,
					'separator'  => '|',
					'excluded_taxonomies' => array(
						'post_format'
						),
					'taxonomy_excluded_terms' => array(
						'category' => array( 'uncategorized' )
						),
					'post_types' => array(
						'gizmo' => array(
							'last_show'          => false,
							'taxonomy_preferred' => 'category',
							),
						'whatzit' => array(
							'separator' => '&raquo;',
							)
						)
					)
				);
		}
	}
}
add_action( 'tha_content_top', 'some_like_it_neat_add_breadcrumbs' );
endif;

if ( ! function_exists( 'some_like_it_neat_optional_scripts' ) ) :
	function some_like_it_neat_optional_scripts() {
		// Link Color
		if ( '' != get_theme_mod( 'some_like_it_neat_add_link_color' )  ) {
		} ?>
		<style type="text/css">
			/*a { color: <?php //echo get_theme_mod( 'some_like_it_neat_add_link_color' ); ?>; }*/
		</style>
		<?php
	}
	add_action( 'wp_head', 'some_like_it_neat_optional_scripts' );
	endif;

	if ( ! function_exists( 'some_like_it_neat_mobile_styles' ) ) :
		function some_like_it_neat_mobile_styles() {
			$value = get_theme_mod( 'some_like_it_neat_mobile_hide_arrow' );

			if ( 0 == get_theme_mod( 'some_like_it_neat_mobile_hide_arrow' ) ) { ?>
				<style>
					.menu-button i.navicon {
						display: none;
					}
				</style>
				<?php
			} else {

			}
		}
		add_action( 'wp_head', 'some_like_it_neat_mobile_styles' );
		endif;

		if ( ! function_exists( 'some_like_it_neat_add_footer_divs' ) ) :
			function some_like_it_neat_add_footer_divs() {
				?>

				<div class="footer-left">
					<?php echo esc_attr( get_theme_mod( 'some_like_it_neat_footer_left', __( '&copy; All Rights Reserved', 'some-like-it-neat' ) ) ); ?>

				</div>
				<div class="footer-right">
					<?php echo esc_attr( get_theme_mod( 'some_like_it_neat_footer_right', 'Footer Content Right' ) );  ?>
				</div>
				<?php
			}
			add_action( 'tha_footer_bottom', 'some_like_it_neat_add_footer_divs' );
			endif;

			add_action( 'tha_head_bottom', 'some_like_it_neat_add_selectivizr' );
			function some_like_it_neat_add_selectivizr() {
				?>
	<!--[if (gte IE 6)&(lte IE 8)]>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/selectivizr/selectivizr-min.js"></script>
	<noscript><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" /></noscript>
	<![endif]-->
	<?php
}

// add_action('init', 'timeline_register');
// Our custom post type function for the timeline
// function timeline_register() {

// 	$labels = array(
// 		'name' => _x('Timeline', 'post type general name'),
// 		'singular_name' => _x('Milestone', 'post type singular name'),
// 		'add_new' => _x('Add New', 'Milestone'),
// 		'add_new_item' => __('Add New Milestone'),
// 		'edit_item' => __('Edit Milestone'),
// 		'new_item' => __('New Milestone'),
// 		'view_item' => __('View Milestones'),
// 		'search_items' => __('Search Milestones'),
// 		'not_found' =>  __('Nothing found'),
// 		'not_found_in_trash' => __('Nothing found in Trash'),
// 		'parent_item_colon' => ''
// 		);

// 	$args = array(
// 		'labels' => $labels,
// 		'description' => 'description',
// 		'public' => true,
// 		'publicly_queryable' => true,
// 		'show_ui' => true,
// 		'query_var' => true,
// 		'menu_icon' => get_stylesheet_directory_uri() . '',
// 		'rewrite' => true,
// 		'capability_type' => 'post',
// 		'hierarchical' => false,
// 		'menu_position' => null,
// 		'menu_icon' => 'dashicons-clock',
// 		'supports' => array(
// 			'title', 'editor', 'author', 'thumbnail',
// 			'custom-fields', 'revisions', 'page-attributes', 'post-formats'
// 			),
// 		);

// 	register_post_type( 'timeline' , $args );
// }

// add_action('init', 'jobs_register');

// add_action('init', 'events_register');
// Our custom post type function for the new events section
// function events_register() {

// 	$labels = array(
// 		'name' => _x('Events', 'post type general name'),
// 		'singular_name' => _x('Event', 'post type singular name'),
// 		'add_new' => _x('Add New', 'Event'),
// 		'add_new_item' => __('Add New Event'),
// 		'edit_item' => __('Edit Event'),
// 		'new_item' => __('New Event'),
// 		'view_item' => __('View Event'),
// 		'search_items' => __('Search Event'),
// 		'not_found' =>  __('Nothing found'),
// 		'not_found_in_trash' => __('Nothing found in Trash'),
// 		'parent_item_colon' => ''
// 		);

// 	$args = array(
// 		'labels' => $labels,
// 		'description' => 'description',
// 		'public' => true,
// 		'publicly_queryable' => true,
// 		'show_ui' => true,
// 		'query_var' => true,
// 		'menu_icon' => get_stylesheet_directory_uri() . '',
// 		'rewrite' => true,
// 		'capability_type' => 'post',
// 		'hierarchical' => 1077,
// 		'menu_position' => null,
// 		'menu_icon' => 'dashicons-calendar-alt',
// 		'supports' => array(
// 			'title', 'author', 'editor', 'thumbnail', 'revisions', 'page-attributes',
// 			'post-formats'
// 			),
// 		);

// 	register_post_type( 'events' , $args );
// }

  	// add_action('init', 'eventtables_register');
// Our custom post type function for the new events section
// function eventtables_register() {

// 	$labels = array(
// 		'name' => _x('Eventtables', 'post type general name'),
// 		'singular_name' => _x('Eventtable', 'post type singular name'),
// 		'add_new' => _x('Add New', 'Eventtable'),
// 		'add_new_item' => __('Add New Eventtable'),
// 		'edit_item' => __('Edit Eventtable'),
// 		'new_item' => __('New Eventtable'),
// 		'view_item' => __('View Eventtable'),
// 		'search_items' => __('Search Eventtable'),
// 		'not_found' =>  __('Nothing found'),
// 		'not_found_in_trash' => __('Nothing found in Trash'),
// 		'parent_item_colon' => ''
// 		);

// 	$args = array(
// 		'labels' => $labels,
// 		'description' => 'description',
// 		'public' => true,
// 		'publicly_queryable' => true,
// 		'show_ui' => true,
// 		'query_var' => true,
// 		'menu_icon' => get_stylesheet_directory_uri() . '',
// 		'rewrite' => true,
// 		'capability_type' => 'post',
// 		'hierarchical' => false,
// 		'menu_position' => null,
// 		'menu_icon' => 'dashicons-schedule',
// 		'supports' => array(
// 			'title', 'author', 'thumbnail',
// 			'custom-fields', 'revisions', 'page-attributes',
// 			'post-formats'
// 			),
// 		);

// 	register_post_type( 'eventtables' , $args );
// }

	// Add IDs to Header Tags
add_filter( 'the_content', 'add_ids_to_header_tags' );
function add_ids_to_header_tags( $content ) {
	if ( ! is_single() ) {
		return $content;
	}
	$pattern = '#(?P<full_tag><(?P<tag_name>h\d)(?P<tag_extra>[^>]*)>(?P<tag_contents>[^<]*)</h\d>)#i';
	if ( preg_match_all( $pattern, $content, $matches, PREG_SET_ORDER ) ) {
		$find = array();
		$replace = array();
		foreach( $matches as $match ) {
			if ( strlen( $match['tag_extra'] ) && false !== stripos( $match['tag_extra'], 'id=' ) ) {
				continue;
			}
			$find[]    = $match['full_tag'];
			$id        = sanitize_title( $match['tag_contents'] );
			$id_attr   = sprintf( ' id="%s"', $id );
			$extra     = sprintf( ' <a class="deep-link" href="#%s"></a>', $id );
			$replace[] = sprintf( '<%1$s%2$s%3$s>%4$s%5$s</%1$s>', $match['tag_name'], $match['tag_extra'], $id_attr, $match['tag_contents'], $extra );
		}
		$content = str_replace( $find, $replace, $content );
	}
	return $content;
}

function friendlyURL($string){
	$string = preg_replace("`\[.*\]`U","",$string);
	$string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
	$string = htmlentities($string, ENT_COMPAT, 'utf-8');
	$string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
	$string = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $string);
	return strtolower(trim($string, '-'));
}

// add_filter( 'excerpt_more', 'modify_read_more_link' );
// function modify_read_more_link() {
// 	return '<a class="more-link" href="' . get_permalink() . '">Read more ...</a>';
// }

add_filter('excerpt_more', 'modify__excerpt_read_more_link');
function modify__excerpt_read_more_link($more) {
	global $post;
	return '... <a class="more-link" href="' . get_permalink() . '">Read more</a>';
}

// Changing excerpt length
add_filter('excerpt_length', 'new_excerpt_length');
function new_excerpt_length($length) {
	return 50;
}

// Changing excerpt more
// function new_excerpt_more($more) {
// return '...';
// }
// add_filter('excerpt_more', 'new_excerpt_more');

add_action('wp_head', 'add_favicons');
function add_favicons() {?>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/images/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri();?>/images/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri();?>/images/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri();?>/images/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri();?>/images/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri();?>/images/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri();?>/images/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri();?>/images/apple-touch-icon-152x152.png" />
	<?php }


  	// global $wp_rewrite; $wp_rewrite->flush_rules();

	function var_dump_pre($mixed = null) {
		echo '<pre>';
		var_dump($mixed);
		echo '</pre>';
		return null;
	}

	function getWordsForSearch($text, $limit) {
		$array = explode(" ", $text, $limit+1);

		if (count($array) > $limit)
		{
			unset($array[$limit]);
		}
		return implode(" ", $array);
	}

	function getWords($text, $limit) {
		$text = strip_tags($text);
		$array = explode(" ", $text, $limit+1);

		$src = array_pop($match);

		if (count($array) > $limit)
		{
			unset($array[$limit]);
		}
		return implode(" ", $array);
	}

	function getWordsWithImage($text, $limit) {
		preg_match( '@src="([^"]+)"@' , $text, $match );
		$text = strip_tags($text);
		$array = explode(" ", $text, $limit+1);



		$src = array_pop($match);

		if (count($array) > $limit)
		{
			unset($array[$limit]);
		}
		$words = implode(" ", $array);

		return $words.='<img src="'.$src.'">';
	}

	function countWords($text) {
		$array = explode(" ", $text);

		return count($array);
	}

	function searchfilter($query) {

		if ($query->is_search && !is_admin() ) {
			$query->set('post_type', 'post');
			$query->set('posts_per_page', 12);
		}

		return $query;
	}

	add_filter('pre_get_posts','searchfilter');


/**
 * Add HTML5 theme support.
 */
function wpdocs_after_setup_theme() {
	add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );


function get_permalink_check($title, $id) {
	if (  get_page_by_title( $title ) ) {
		return get_permalink( get_page_by_title($title) );
	} else {
		return get_permalink( $id );
	}
}



add_filter( 'wp_calculate_image_srcset', function( $sources )
{
	foreach( $sources as &$source )
	{
		if( isset( $source['url'] ) )
			$source['url'] = set_url_scheme( $source['url'], 'https' );
	}
	return $sources;

}, PHP_INT_MAX );

function date_to_string($date) {
	$date = explode('-', $date);
	$monthName = DateTime::createFromFormat('!m', $date[1]);
	$monthName = $monthName->format('F');
	$dateString = $date[0].' '.$monthName.' '.$date[2];
	return $dateString;
}

function date_range_to_string($startDate, $endDate) {
	if($startDate < $endDate) {
		$startDate = explode('-', $startDate);
		$endDate = explode('-', $endDate);
		$equal = '';
		if($startDate[1] == $endDate[1] && $startDate[2] == $endDate[2]) {
			$equal = 'month and year';
		}
		elseif($startDate[2] == $endDate[2]) {
			$equal = 'year';
		}
		$startMonthName = DateTime::createFromFormat('!m', $startDate[1]);
		$startMonthName = $startMonthName->format('F');
		$endMonthName = DateTime::createFromFormat('!m', $endDate[1]);
		$endMonthName = $endMonthName->format('F');
		if($equal == 'month and year') {
			$dateString = $startDate[0].'-'.$endDate[0].' '.$startMonthName.' '.$startDate[2];
		}
		elseif($equal == 'year') {
			$dateString = $startDate[0].' '.$startMonthName.' - '.$endDate[0].' '.$endMonthName.' '.$startDate[2];
		}
		else {
			$dateString = $startDate[0].' '.$startMonthName.' '.$startDate[2].' - '.$endDate[0].' '.$endMonthName.' '.$endDate[2];
		}
	}
	else {
		$dateString = date_to_string($startDate);
	}
	return $dateString;
}

// if (function_exists('register_field_group')) {
// 	register_field_group(array (
// 		'id' => 'acf_event-properties',
// 		'title' => 'Event Properties',
// 		'fields' => array (
// 			array (
// 				'key' => 'field_5622633c684cf',
// 				'label' => 'Event Start Date',
// 				'name' => 'event_date',
// 				'type' => 'date_picker',
// 				'required' => 1,
// 				'date_format' => 'yy-mm-dd',
// 				'display_format' => 'dd/mm/yy',
// 				'first_day' => 1,
// 			),
// 			array (
// 				'key' => 'field_6733744D795dg',
// 				'label' => 'Event End Date',
// 				'name' => 'event_end_date',
// 				'type' => 'date_picker',
// 				'required' => 0,
// 				'date_format' => 'yy-mm-dd',
// 				'display_format' => 'dd/mm/yy',
// 				'first_day' => 1,
// 				'instructions' => 'If event is a one-day event, leave this blank.'
// 			),
// 		),
// 		'location' => array (
// 			array (
// 				array (
// 					'param' => 'post_taxonomy',
// 					'operator' => '!=',
// 					'value' => 'Event',
// 					'order_no' => 0,
// 					'group_no' => 0,
// 				),
// 			),
// 		),
// 		'options' => array (
// 			'position' => 'side',
// 			'layout' => 'default',
// 			'hide_on_screen' => array (
// 			),
// 		),
// 		'menu_order' => 0,
// 	));
// }

// if (function_exists('register_field_group')) {
// 	register_field_group(array (
// 		'id' => 'acf_featured-image',
// 		'title' => 'Featured Image',
// 		'fields' => array (
// 			array (
// 				'key' => 'field_562cbea91702c',
// 				'label' => 'Featured Image',
// 				'name' => 'featured_image',
// 				'type' => 'image',
// 				'save_format' => 'id',
// 				'preview_size' => 'thumbnail',
// 				'library' => 'all',
// 				'required' => 1
// 			),
// 		),
// 		'location' => array (
// 			array (
// 				array (
// 					'param' => 'post_type',
// 					'operator' => '==',
// 					'value' => 'Event',
// 					'order_no' => 0,
// 					'group_no' => 0,
// 				),
// 			),
// 			array (
// 				array (
// 					'param' => 'post_type',
// 					'operator' => '==',
// 					'value' => 'post',
// 					'order_no' => 0,
// 					'group_no' => 1,
// 				),
// 			),
// 		),
// 		'options' => array (
// 			'position' => 'side',
// 			'layout' => 'default',
// 			'hide_on_screen' => array (
// 			),
// 		),
// 		'menu_order' => 0,
// 	));

// }



