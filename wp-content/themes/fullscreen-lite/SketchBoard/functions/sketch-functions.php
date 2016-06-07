<?php
/***************** EXCERPT LENGTH ************/
function fullscreen_lite_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'fullscreen_lite_excerpt_length');

/***************** READ MORE ****************/
function fullscreen_lite_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'fullscreen_lite_excerpt_more');

/************* CUSTOM PAGE TITLE ***********/
add_filter( 'wp_title', 'fullscreen_lite_title' );
function fullscreen_lite_title($title)
{
	$fullscreen_lite_title = $title;
	if ( is_home() && !is_front_page() ) {
		$fullscreen_lite_title .= get_bloginfo('name');
	}
	if ( is_front_page() ){
		$fullscreen_lite_title .=  get_bloginfo('name');
		$fullscreen_lite_title .= ' | '; 
		$fullscreen_lite_title .= get_bloginfo('description');
	}
	if ( is_search() ) {
		$fullscreen_lite_title .=  get_bloginfo('name');
	}
	if ( is_author() ) { 
		global $wp_query;
		$curauth = $wp_query->get_queried_object();	
		$fullscreen_lite_title .= __('Author: ','fullscreen-lite');
		$fullscreen_lite_title .= $curauth->display_name;
		$fullscreen_lite_title .= ' | ';
		$fullscreen_lite_title .= get_bloginfo('name');
	}
	if ( is_single() ) {
		$fullscreen_lite_title .= get_bloginfo('name');
	}
	if ( is_page() && !is_front_page() ) {
		$fullscreen_lite_title .= get_bloginfo('name');
	}
	if ( is_category() ) {
		$fullscreen_lite_title .= get_bloginfo('name');
	}
	if ( is_year() ) { 
		$fullscreen_lite_title .= get_bloginfo('name');
	}
	if ( is_month() ) {
		$fullscreen_lite_title .= get_bloginfo('name');
	}
	if ( is_day() ) {
		$fullscreen_lite_title .= get_bloginfo('name');
	}
	if (function_exists('is_tag')) { 
		if ( is_tag() ) {
			$fullscreen_lite_title .= get_bloginfo('name');
		}
		if ( is_404() ) {
			$fullscreen_lite_title .= get_bloginfo('name');
		}					
	}
	return $fullscreen_lite_title;
}


add_filter('body_class','fullscreen_lite_class_name');
function fullscreen_lite_class_name($classes) {
	$classes[] = 'fullscreen-lite';
	return $classes;
}