<?php
/***********************************************
*  ENQUQUE CSS AND JAVASCRIPT
************************************************/
//ENQUEUE JQUERY 
function fullscreen_lite_script_enqueqe() {
	if(!is_admin()) {
		wp_enqueue_script('fullscreen_componentssimple_slide', get_template_directory_uri() .'/js/custom.js',array('jquery'),'1.0',1 );
		wp_enqueue_script("comment-reply");
	}

}
add_action('init', 'fullscreen_lite_script_enqueqe');

//ENQUEUE FRONT SCRIPTS
function fullscreen_lite_theme_stylesheet()
{
	global $is_IE;
	$theme = wp_get_theme();

	if($is_IE ) {
		wp_enqueue_style( 'fullscreen-ie-style', get_template_directory_uri().'/css/ie-style.css', false, $theme->Version );
		wp_enqueue_style( 'fullscreen-ie-awesome-stylesheet', get_template_directory_uri().'/css/font-awesome-ie7.css', false, $theme->Version );
	}

	wp_enqueue_script('hoverIntent');
	wp_enqueue_script('fullscreen-superfish', get_template_directory_uri().'/js/superfish.js',array('jquery'),true,'1.0');
	wp_enqueue_script('fullscreen-AnimatedHeader', get_template_directory_uri().'/js/cbpAnimatedHeader.js',array('jquery'),true,'1.0');
	wp_enqueue_script('fullscreen-easingslide',get_template_directory_uri().'/js/jquery.easing.1.3.js',array('jquery'),'1.0',true);
	wp_enqueue_script('fullscreen-waypoints',get_template_directory_uri().'/js/waypoints.js',array('jquery'),'1.0',true );
	
	wp_enqueue_style('fullscreen-stylesheet', get_stylesheet_uri());
	wp_enqueue_style('fullscreen-animation-stylesheet', get_template_directory_uri().'/css/skt-animation.css', false, $theme->Version);
	wp_enqueue_style('fullscreen-awesome-stylesheet', get_template_directory_uri().'/css/font-awesome.css', false, $theme->Version);
	
	/*SUPERFISH*/
	wp_enqueue_style( 'fullscreen-superfish-stylesheet', get_template_directory_uri().'/css/superfish.css', false, $theme->Version);
	wp_enqueue_style( 'fullscreen-bootstrap-stylesheet', get_template_directory_uri().'/css/bootstrap-responsive.css', false, $theme->Version);
	
	/*GOOGLE FONTS*/
	wp_enqueue_style( 'fullscreen-googleFontsCarrois','//fonts.googleapis.com/css?family=Carrois+Gothic', false, $theme->Version);

}
add_action('wp_enqueue_scripts', 'fullscreen_lite_theme_stylesheet');

function fullscreen_lite_head() {
	
	if(!is_admin()) {
		require_once(get_template_directory().'/includes/fullscreen-custom-css.php');
	}
 
}
add_action('wp_head', 'fullscreen_lite_head');