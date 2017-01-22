<?php
/*
	Plugin Name: WordPress Posts Timeline
	Plugin URI: http://wordpress.org/extend/plugins/wordpress-posts-timeline
	Description: Outputs WordPress posts in a vertical timeline
	Author: Wylie Hobbs
	Version: 1.7
	Author URI: http:/wyliehobbs.com/demos/wordpress-posts-timeline
	Text Domain: wordpress-posts-timeline
	Domain Path: /lang
 */
 
/*  Copyright 2013  Wylie Hobbs  (email : wylie@wyliehobbs.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define('WPTIMELINE_UNIQUE', 'wptimeline');
define('WPTIMELINE_VERSION', 1.7);

/*

** AS OF v1.1, shortcode arguments are no longer used **

get shrortcode attributes, pass to display function
*/
function timeline_shortcode($atts){
	$args = shortcode_atts( array(
		      'type' => 'timeline',
		      'show' => 10,
		      'date' => 'F, Y',
		      'length' => 10,
		      'images' => 'yes'
     		), $atts );


     
     return display_timeline($args);
 }
 
add_shortcode('wp-timeline', 'timeline_shortcode');

//display the timeline
function display_timeline($args){

	$post_args = array(
			'post_type' => 'timeline',
			'numberposts' => '10',
			'orderby' => 'post_date',
			'order' => get_option('timeline_order_posts'),
			'post_status' => 'publish',

		);
	
		$posts = get_posts( $post_args );
		$out =  '<div id="timeline">';
		$out .=   '<ul>';

		foreach ( $posts as $post ) : setup_postdata($post);

		// $postObject = get_fields( $post->ID );
		// $link = @$postObject['news-link']->guid;
		$postObject = get_fields( $post->ID );
		$link = @$postObject['news-link'];

	        $out .=  '<li><div class="outerblock"><div class="innerblock">';
	        	if( get_option('timeline_post_link') == 'yes'){
	        		$out .=  '<a class="milestone-link" href="'. $link .'" target="_blank"><h3 class="timeline-date">';
					if( get_option('timeline_show_titles') == 'yes'){
						$out .=  " ".get_the_title($post->ID)." ";
					}
					$out .=  '</h3></a>';
	        	}
	        	else{
	            	$out .=  '<a class="milestone-link" href="'. $link .'" target="_blank"><h3 class="timeline-date">';
					if( get_option('timeline_show_titles') == 'yes'){
						$out .=  " ".get_the_title($post->ID)." ";
					}
					$out .=  '</h3></a>';
	            }
				if ( get_option('timeline_include_images') == 'yes' ){
					if ( featured_image() == true && has_post_thumbnail( $post->ID ) ){
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						$alt_text = get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true);
						$out .=  '<span class="timeline-image">'
							 . '<img width="100%" src="' .  $image[0] . '" alt="' . $alt_text . '" />'
							 . '</span>';
					}
					
				}
				$out .=  '<span class="timeline-text">'. get_the_content($post->ID) .'</span>';
				$out .=  '</div></div></li>';

    	endforeach;

		$out .=  '</ul>';
		$out .=  '</div> <!-- #timeline -->';
		wp_reset_postdata();
		return $out;
}

//trim text function found on http://www.jooria.com/Limit-Characters-From-Your-Text-a139.html
function timeline_text($limit){
	$str = get_the_content('', true, '');
	$str = strip_tags($str);
	return $str;

}

//is shortcode active on page? if so, add styles to header
function has_timeline_shortcode( $posts ) {

        if ( empty($posts) )
            return $posts;

        $shortcode_found = false;

        foreach ($posts as $post) {

            if ( !( stripos($post->post_content, '[wp-timeline') === false ) ) {
                $shortcode_found = true;
                break;
            }
        }

        if ( $shortcode_found ) {
            add_timeline_styles();
        }
        return $posts;
    }

add_action('the_posts', 'has_timeline_shortcode');

//add styles to header
function add_timeline_styles(){
	add_action('wp_print_styles', 'timeline_styles');
}
function timeline_styles(){

		wp_register_style($handle = 'timeline', $src = plugins_url('css/timeline.css', __FILE__), $deps = array(), $ver = '1.0.0', $media = 'all');
		wp_enqueue_style('timeline');
}


//check featured image theme support, add
function featured_image(){
	if ( !current_theme_supports( 'post_thumbnails' ) ) {
		if ( function_exists( 'add_theme_support' ) ) { 
			
			add_theme_support( 'post-thumbnails' );
			add_image_size( 'timeline-thumb', 80, 9999 ); //80 pixels wide (and unlimited height)
			return true;
		}
	}
	else{
		
		add_image_size( 'timeline-thumb', 80, 9999 ); //80 pixels wide (and unlimited height)
		return true;
	}

}

//do shortcode for get_the_excerpt() && get_the_content()
add_filter('get_the_content', 'do_shortcode');
add_filter('get_the_excerpt', 'do_shortcode');

//add options page
require_once('inc/timeline_options.php');

?>