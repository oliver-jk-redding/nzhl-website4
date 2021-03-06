<?php
/**
 * WordPress Widget Boilerplate
 *
 * The WordPress Widget Boilerplate is an organized, maintainable boilerplate for building widgets using WordPress best practices.
 *
 * @package   NZHL Upcoming Events
 * @author    Your Name <email@example.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2014 Your Name or Company Name
 *
 * @wordpress-plugin
 * Plugin Name:       NZHL Upcoming Events
 * Plugin URI:        http://oliverredding.com
 * Description:       NZHL Upcoming Events Widget for Sidebar
 * Version:           1.0.0
 * Author:            Ollie Redding
 * Author URI:        http://oliverredding.com
 * Text Domain:       Oliver Redding
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /lang
 * GitHub Plugin URI: https://github.com/<owner>/<repo>
 */

 // Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}
// TODO: change 'Widget_Name' to the name of your plugin
class NZHL_Upcoming_Events extends WP_Widget {
    /**
     * @TODO - Rename "widget-name" to the name your your widget
     *
     * Unique identifier for your widget.
     *
     *
     * The variable name is used as the text domain when internationalizing strings
     * of text. Its value should match the Text Domain file header in the main
     * widget file.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    protected $widget_slug = 'nzhl-upcoming-events-widget';
    /*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/
	/**
	 * Specifies the classname and description, instantiates the widget,
	 * loads localization files, and includes necessary stylesheets and JavaScript.
	 */
	public function __construct() {
		// load plugin text domain
		add_action( 'init', array( $this, 'widget_textdomain' ) );
		// Hooks fired when the Widget is activated and deactivated
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
		// TODO: update description
		parent::__construct(
			$this->get_widget_slug(),
			__( 'NZHL_Upcoming_Events', $this->get_widget_slug() ),
			array(
				'classname'  => $this->get_widget_slug().'-class',
				'description' => __( 'A widget which shows a list of the upcoming events for the next year.', $this->get_widget_slug() )
				)
			);
		// Register admin styles and scripts
		add_action( 'admin_print_styles', array( $this, 'register_admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_scripts' ) );
		// Register site styles and scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_scripts' ) );
		// Refreshing the widget's cached output with each new post
		add_action( 'save_post',    array( $this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );
	} // end constructor
    /**
     * Return the widget slug.
     *
     * @since    1.0.0
     *
     * @return    Plugin slug variable.
     */
    public function get_widget_slug() {
    	return $this->widget_slug;
    }
    /*--------------------------------------------------*/
	/* Widget API Functions
	/*--------------------------------------------------*/
	/**
	 * Outputs the content of the widget.
	 *
	 * @param array args  The array of form elements
	 * @param array instance The current instance of the widget
	 */
	public function widget( $args, $instance ) {

		// Check if there is a cached output
		$cache = wp_cache_get( $this->get_widget_slug(), 'widget' );
		if ( !is_array( $cache ) )
			$cache = array();
		if ( ! isset ( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;
		if ( isset ( $cache[ $args['widget_id'] ] ) )
			return print $cache[ $args['widget_id'] ];


		extract( $args, EXTR_SKIP );
		$widget_string = $before_widget;

		// TODO: Here is where you manipulate your widget's values based on their input fields
		query_posts('category_name=Events&orderby=date&order=DESC&posts_per_page=2');

		$widget_heading = "<h3><a href='/category/events'>Upcoming Events</a></h3>";

		$event_info = '';

		if ( have_posts() ) : while ( have_posts() ) : the_post();

			$thumb_id = get_post_thumbnail_id();
			if($thumb_id) {
			  $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
			  $thumb_url = $thumb_url_array[0];
			}
			else {
			  $thumb_url = '/wp-content/themes/nzhl/assets/img/middle-earth-map-with-logo2.jpg';
			}

			$event_info .= "<div class='wg-event-container'>
			<a class='wg-event-details' href='" . get_permalink() . "'>
			<div><h5h4 class='wg-event-title'>" . get_the_title() . "</h4></div>
			<div><span class='wg-event-date'>" . date_range_to_string(get_field('event_date'), get_field('event_end_date')) . "</span></div>
			<div><span class='wg-event-location'>" . get_field('location') . "</span></div>
			</a>
			<div class='wg-event-img' style='background-image: url(" . $thumb_url . ");'></div>
			</div>";

		endwhile; endif;
		// <div style='margin-top: 5px;'><span class='wg-event-link'>More info</span></div>

		$home_page = get_post(7);

		$calendar_link = "<a href='".get_field('nzhl_calendar', 7)."' download class='download-link'>Download the NZHL <b>".date('Y')." Calendar</b></a>";
		$rankings_link = "<a href='".get_field('nzhl_rankings_table', 7)."' download class='download-link'>Download the NZHL <b>".date('Y')." Table Rankings</b></a>";

		$widget_string .= $widget_heading.$event_info.$calendar_link.$rankings_link;

		ob_start();
		include( plugin_dir_path( __FILE__ ) . 'views/widget.php' );
		$widget_string .= ob_get_clean();
		$widget_string .= $after_widget;
		$cache[ $args['widget_id'] ] = $widget_string;
		wp_cache_set( $this->get_widget_slug(), $cache, 'widget' );
		print $widget_string;
		// error_log('WIDGET PAINTING COMP STRING: '.$widget_string);
	} // end widget


	public function flush_widget_cache()
	{
		wp_cache_delete( $this->get_widget_slug(), 'widget' );
	}
	/**
	 * Processes the widget's options to be saved.
	 *
	 * @param array new_instance The new instance of values to be generated via the update.
	 * @param array old_instance The previous instance of values before the update.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		// TODO: Here is where you update your widget's old values with the new, incoming values
		return $instance;
	} // end widget
	/**
	 * Generates the administration form for the widget.
	 *
	 * @param array instance The array of keys and values for the widget.
	 */
	public function form( $instance ) {
		// TODO: Define default values for your variables
		$instance = wp_parse_args(
			(array) $instance
			);
		// TODO: Store the values of the widget in their own variable
		// Display the admin form
		include( plugin_dir_path(__FILE__) . 'views/admin.php' );
	} // end form
	/*--------------------------------------------------*/
	/* Public Functions
	/*--------------------------------------------------*/
	/**
	 * Loads the Widget's text domain for localization and translation.
	 */
	public function widget_textdomain() {
		// TODO be sure to change 'widget-name' to the name of *your* plugin
		load_plugin_textdomain( $this->get_widget_slug(), false, plugin_dir_path( __FILE__ ) . 'lang/' );
	} // end widget_textdomain
	/**
	 * Fired when the plugin is activated.
	 *
	 * @param  boolean $network_wide True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog.
	 */
	public function activate( $network_wide ) {
		// TODO define activation functionality here

	} // end activate
	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @param boolean $network_wide True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog
	 */
	public function deactivate( $network_wide ) {
		// TODO define deactivation functionality here
	} // end deactivate
	/**
	 * Registers and enqueues admin-specific styles.
	 */
	public function register_admin_styles() {
		wp_enqueue_style( $this->get_widget_slug().'-admin-styles', plugins_url( 'css/admin.css', __FILE__ ) );
	} // end register_admin_styles
	/**
	 * Registers and enqueues admin-specific JavaScript.
	 */
	public function register_admin_scripts() {
		wp_enqueue_script( $this->get_widget_slug().'-admin-script', plugins_url( 'js/admin.js', __FILE__ ), array('jquery') );
	} // end register_admin_scripts
	/**
	 * Registers and enqueues widget-specific styles.
	 */
	public function register_widget_styles() {
		wp_enqueue_style( $this->get_widget_slug().'-widget-styles', plugins_url( 'css/widget.css', __FILE__ ) );
	} // end register_widget_styles
	/**
	 * Registers and enqueues widget-specific scripts.
	 */
	public function register_widget_scripts() {
		wp_enqueue_script( $this->get_widget_slug().'-script', plugins_url( 'js/widget.js', __FILE__ ), array('jquery') );
	} // end register_widget_scripts
} // end class
// TODO: Remember to change 'Widget_Name' to match the class name definition
add_action( 'widgets_init', create_function( '', 'register_widget("NZHL_Upcoming_Events");' ) );
