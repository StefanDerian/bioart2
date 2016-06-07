<?php
/**
 * Fullscreen functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 */
/**
 * Registers widget areas.
 *
 */
function fullscreen_lite_widgets_init() {
	register_sidebar(array(
		'name'          => __( 'Page Sidebar', 'fullscreen-lite' ),
		'id'            => 'page-sidebar',
		'before_widget' => '<li id="%1$s" class="ske-container %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="ske-title">',
		'after_title'  => '</h3>',
	));
	register_sidebar(array(
		'name'          => __( 'Blog Sidebar', 'fullscreen-lite' ),
		'id'            => 'blog-sidebar',
		'before_widget' => '<li id="%1$s" class="ske-container %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="ske-title">',
		'after_title' 	=> '</h3>',
	));
}
add_action( 'widgets_init', 'fullscreen_lite_widgets_init' );

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Fullscreen supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
*/
function fullscreen_lite_theme_setup() {
	/*
	 * Makes Fullscreen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'fullscreen-lite' to the name of your theme in all
	 * template files.
	 */
	 load_theme_textdomain( 'fullscreen-lite', get_template_directory() . '/languages' );
	 
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	add_theme_support( 'title-tag' );

	$pre_options = ( get_option('fullscreen_lite_option_tree') != '' ) ? get_option( 'fullscreen_lite_option_tree' ) : false ;
	if ($pre_options) {
		// This theme allows users to set a custom header.
		add_theme_support( 'custom-header', array( 'flex-width' => true, 'width' => 1600, 'flex-height' => true, 'height' => 750, 'default-image' => fullscreen_lite_get_option( 'fullscreen_frontslider_stype' ) ) );
	} else {
		// This theme allows users to set a custom header.
		add_theme_support( 'custom-header', array( 'flex-width' => true, 'width' => 1600, 'flex-height' => true, 'height' => 750, 'default-image' => get_template_directory_uri() . '/images/static-img.jpg') );
	}
	

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'fullscreen_lite_custom_background_args', array('default-color' => 'f5f5f5', 'default-image' => get_template_directory_uri() . '/images/linedpaper.png' ) ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support('post-thumbnails');

	/**
	 * Enable support for Post Formats
	 */
	set_post_thumbnail_size( 600, 220, true );
	add_image_size( 'fullscreen_standard_img',770,365,true); //standard size
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'Header' => __( 'Main Navigation', 'fullscreen-lite' ),
	));

	/**
	 * SETS UP THE CONTENT WIDTH VALUE BASED ON THE THEME'S DESIGN.
	 */
	if ( ! isset( $content_width ) ){
	    $content_width = 900;
	}
}
add_action( 'after_setup_theme', 'fullscreen_lite_theme_setup' ); 

/**
* Funtion to add CSS class to body
*/
function fullscreen_lite_body_class( $classes ) {

	if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && is_front_page() ) {
		$classes[] = 'front-page';
	}
	
	return $classes;
}
add_filter( 'body_class','fullscreen_lite_body_class' );

/**
 * Filter content with empty post title
 *
 */

add_filter('the_title', 'fullscreen_lite_untitled');
function fullscreen_lite_untitled($title) {
	if ($title == '') {
		return __('Untitled','fullscreen-lite');
	} else {
		return $title;
	}
}


/********************************************************
 INCLUDE REQUIRED FILE FOR THEME (PLEASE DON'T REMOVE IT)
*********************************************************/
/**
 * Add Customizer 
 */
require get_template_directory() . '/includes/customizer.php';
/**
 * Add Customizer 
 */
require_once(get_template_directory() . '/SketchBoard/functions/admin-init.php');
/**
 * Add Customizer 
 */
require_once(get_template_directory() . '/includes/sketchtheme-upsell.php');


/**
 * Get Option.
 *
 * Helper function to return the option value.
 * If no value has been saved, it returns $default.
 *
 * @param     string    The option ID.
 * @param     string    The default option value.
 * @return    mixed
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'fullscreen_lite_get_option' ) ) {

  function fullscreen_lite_get_option( $option_id, $default = '' ) {
    
    /* get the saved options */ 
    $options = get_option( 'fullscreen_lite_option_tree' );
    

    /* look for the saved value */
    if ( isset( $options[$option_id] ) && '' != $options[$option_id] ) {

      return fullscreen_lite_wpml_filter( $options, $option_id );
      
    }
    
    return $default;
    
  }
  
}


/**
 * Filter the return values through WPML
 *
 * @param     array     $options The current options    
 * @param     string    $option_id The option ID
 * @return    mixed
 *
 * @access    public
 * @since     2.1
 */
if ( ! function_exists( 'fullscreen_lite_wpml_filter' ) ) {

  function fullscreen_lite_wpml_filter( $options, $option_id ) {
      
    // Return translated strings using WMPL
    if ( function_exists('icl_t') ) {
      
      $settings = get_option('fullscreen_lite_option_tree_settings');
      
      if ( isset( $settings['settings'] ) ) {
      
        foreach( $settings['settings'] as $setting ) {
          
          // List Item & Slider
          if ( $option_id == $setting['id'] && in_array( $setting['type'], array( 'list-item', 'slider' ) ) ) {
          
            foreach( $options[$option_id] as $key => $value ) {
          
              foreach( $value as $ckey => $cvalue ) {
                
                $id = $option_id . '_' . $ckey . '_' . $key;
                $_string = icl_t( 'Theme Options', $id, $cvalue );
                
                if ( ! empty( $_string ) ) {
                
                  $options[$option_id][$key][$ckey] = $_string;
                  
                }
                
              }
            
            }
          
          // All other acceptable option types
          } else if ( $option_id == $setting['id'] && in_array( $setting['type'], apply_filters( 'ot_wpml_option_types', array( 'text', 'textarea', 'textarea-simple' ) ) ) ) {
          
            $_string = icl_t( 'Theme Options', $option_id, $options[$option_id] );
            
            if ( ! empty( $_string ) ) {
            
              $options[$option_id] = $_string;
              
            }
            
          }
          
        }
      
      }
    
    }
    
    return $options[$option_id];
  
  }

}

$pre_options = ( get_option('fullscreen_lite_option_tree') != '' ) ? get_option( 'fullscreen_lite_option_tree' ) : false ;

if ( $pre_options) {

	add_action( 'wp_ajax_fullscreen_lite_migrate_option', 'fullscreen_lite_migrate_options' );
	add_action( 'wp_ajax_nopriv_fullscreen_lite_migrate_option', 'fullscreen_lite_migrate_options' );
	
	function fullscreen_lite_migrate_options() {

		set_theme_mod('fullscreen_lite_colorpicker', fullscreen_lite_get_option( 'fullscreen_colorpicker' ) );
		set_theme_mod('fullscreen_lite_logo_img', fullscreen_lite_get_option( 'fullscreen_logo_img' ) );
		set_theme_mod('fullscreen_lite_home_blog_sec', 'on' );
		
		set_theme_mod('fullscreen_lite_home_blog_title', __('Latest Post', 'fullscreen-lite' ) );
		set_theme_mod('fullscreen_lite_home_blog_num', '6' );
		
		set_theme_mod('fullscreen_lite_rat_first_section_title', fullscreen_lite_get_option( 'fullscreen_rat_first_section_title' ) );
		set_theme_mod('fullscreen_lite_rat_first_section_content', fullscreen_lite_get_option( 'fullscreen_rat_first_section_content' ) );

		set_theme_mod('fullscreen_lite_rat_second_section_title', fullscreen_lite_get_option( 'fullscreen_rat_second_section_title' ) );
		set_theme_mod('fullscreen_lite_rat_second_section_content', fullscreen_lite_get_option( 'fullscreen_rat_second_section_content' ) );

		set_theme_mod('fullscreen_lite_rat_third_section_title', fullscreen_lite_get_option( 'fullscreen_rat_third_section_title' ) );
		set_theme_mod('fullscreen_lite_rat_third_section_content', fullscreen_lite_get_option( 'fullscreen_rat_third_section_content' ) );

		set_theme_mod('fullscreen_lite_blogpage_heading', fullscreen_lite_get_option( 'fullscreen_blogpage_heading' ) );

		set_theme_mod('fullscreen_lite_fbook_link', fullscreen_lite_get_option( 'fullscreen_fbook_link' ) );
		set_theme_mod('fullscreen_lite_twitter_link', fullscreen_lite_get_option( 'fullscreen_twitter_link' ) );
		set_theme_mod('fullscreen_lite_pinterest_link', fullscreen_lite_get_option( 'fullscreen_pinterest_link' ) );
		set_theme_mod('fullscreen_lite_dribbble_link', fullscreen_lite_get_option( 'fullscreen_dribbble_link' ) );
		set_theme_mod('fullscreen_lite_tumblr_link', fullscreen_lite_get_option( 'fullscreen_tumblr_link' ) );


		set_theme_mod('fullscreen_lite_copyright', fullscreen_lite_get_option( 'fullscreen_copyright' ) );

		echo __('All the settings migrated successfully.', 'fullscreen-lite');

		// delete_option( 'fullscreen_lite_option_tree' );
		// delete_option( 'fullscreen_lite_option_tree_settings' );

		die();

	}

	add_action('admin_menu', 'fullscreen_lite_migrate_menu');
	function fullscreen_lite_migrate_menu() {
		add_theme_page( __('Migrate Options', 'fullscreen-lite'), __('Migrate Options', 'fullscreen-lite'), 'administrator', 'sktmigrate', 'fullscreen_lite_migrate_menu_options' );
	}

	function fullscreen_lite_migrate_menu_options() { ?>
		<h1><?php _e('Migrate Settings to Customizer', 'fullscreen-lite') ?></h1>
		<p><?php _e('As per the new WordPress guidelines it is required to use the Customizer for implementing theme options.', 'fullscreen-lite'); ?></p>
		<p><?php _e('So click on this button for migrate the options from previous version.', 'fullscreen-lite'); ?></p>
		<button id="fullscreen-migrate-btn" class="button button-primary"><?php _e( 'Migrate to Customizer', 'fullscreen-lite' ); ?></button>
		<script type="text/javascript">
		jQuery(document).ready(function(){
			'use strict';
			jQuery('#fullscreen-migrate-btn').click(function() {
			    jQuery.ajax({
			        url: "<?php echo esc_url( home_url('/') );?>wp-admin/admin-ajax.php",
			        type: 'POST',
			        data: { action: 'fullscreen_lite_migrate_option' },
			        success: function( response ) {
						alert( response );
						// var wp_adminurl = "<?php echo esc_url( home_url('/') ).'wp-admin/themes.php'; ?>";
						// jQuery(location).attr("href", wp_adminurl);
			        }
			    });
				return false;

			});
		});
		</script>
	<?php }
} ?>