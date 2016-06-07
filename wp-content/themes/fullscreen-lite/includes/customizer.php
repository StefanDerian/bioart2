<?php

function fullscreen_lite_customize_register( $wp_customize ) {

	// Do stuff with $wp_customize, the WP_Customize_Manager object.
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->remove_control('header_textcolor');
	
	// ====================================
	// = Background Image Size for custom-background
	// ====================================
	$wp_customize->add_setting( 'fullscreen_lite_background_size', array(
		'default'        => 'auto',
		'theme_supports' => 'custom-background',
		'sanitize_callback' => 'fullscreen_lite_sanitize_textarea',
	));
	$wp_customize->add_control('fullscreen_lite_background_size', array(
		'label' => __('Breadcrumb Background Image Size','fullscreen-lite'),
		'section' => 'background_image',
	));
	// ====================================
	// = Fullscreen Lite Theme Pannel
	// ====================================
	$wp_customize->add_panel( 'sketchthemes', array(
		'title' => __( 'Fullscreen Lite Options', 'fullscreen-lite'),
		'priority' => 10,
	) );

	// ====================================
	// = Fullscreen Lite Theme Sections
	// ====================================
	$wp_customize->add_section( 'home_page_settings' , array(
		'title' => __('Home Landing Page Section','fullscreen-lite'),
		'panel' => 'sketchthemes',
		'active_callback' => 'is_front_page'
	) );
	$wp_customize->add_section( 'blog_page_settings' , array(
		'title' => __('Blog Settings','fullscreen-lite'),
		'panel' => 'sketchthemes',
	) );
	$wp_customize->add_section( 'footer_settings' , array(
		'title' => __('Footer Settings','fullscreen-lite'),
		'panel' => 'sketchthemes',
	) );
	$wp_customize->add_section( 'social_link_settings' , array(
		'title' => __('Social Links','fullscreen-lite'),
		'panel' => 'sketchthemes',
	) );

	// ====================================
	// = General Settings Sections
	// ====================================
	$wp_customize->add_setting( 'fullscreen_lite_colorpicker', array(
		'default'           => '#3793ef',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fullscreen_lite_colorpicker', array(
		'priority'	  => 1,
		'label'       => __( 'Theme Color Scheme', 'fullscreen-lite' ),
		'section'     => 'colors',
	) ) );
	
	$wp_customize->add_setting( 'fullscreen_lite_logo_img', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control(  new WP_Customize_Image_Control( $wp_customize, 'fullscreen_lite_logo_img', array(
		'label' => __( 'Logo Image', 'fullscreen-lite' ),
		'description' => __('Change Logo ( Prefered max. logo image size: width * height ( 370px * 72px) )', 'fullscreen-lite'),
		'section' => 'title_tagline',
		'mime_type' => 'image',
	) ) );

	// ====================================
	// = Home Page Settings Sections
	// ====================================
	$wp_customize->add_setting( 'fullscreen_lite_home_blog_sec', array(
		'default'           => 'on',
		'sanitize_callback' => 'fullscreen_lite_sanitize_on_off',
	) );
	$wp_customize->add_control( 'fullscreen_lite_home_blog_sec', array(
		'label' => __( 'Home Blog Section ON/OFF', 'fullscreen-lite' ),
		'section' => 'home_page_settings',
		'type' => 'radio',
		'choices' => array(
			'on' =>'ON',
			'off'=> 'OFF'
		),
	) );

	$wp_customize->add_setting( 'fullscreen_lite_home_blog_title', array(
		'default'        => __('Latest Post', 'fullscreen-lite'),
		'sanitize_callback' => 'fullscreen_lite_sanitize_textarea',
	));
	$wp_customize->add_control('fullscreen_lite_home_blog_title', array(
		'label' => __('Home Blog Section Title','fullscreen-lite'),
		'section' => 'home_page_settings',
	));

	$wp_customize->add_setting( 'fullscreen_lite_home_blog_num', array(
		'default'        => '6',
		'sanitize_callback' => 'fullscreen_lite_sanitize_textarea',
	));
	$wp_customize->add_control('fullscreen_lite_home_blog_num', array(
		'label' => __('Number Of Blogs','fullscreen-lite'),
		'section' => 'home_page_settings',
	));

	$wp_customize->add_setting( 'fullscreen_lite_rat_first_section_title', array(
		'default'        => __('Section One', 'fullscreen-lite'),
		'sanitize_callback' => 'fullscreen_lite_sanitize_textarea',
	));
	$wp_customize->add_control('fullscreen_lite_rat_first_section_title', array(
		'label' => __('Home First Section Title','fullscreen-lite'),
		'description' => __('(Create a custom link in Menus and put <b>#section1</b> in URL and Navigation Label according to you for landing page.))<br/>Enter title for home first section.', 'fullscreen-lite'),
		'section' => 'home_page_settings',
	));

	$wp_customize->add_setting( 'fullscreen_lite_rat_first_section_content', array(
		'default'        => '<p class="big-paragraph">'.__('FullScreen fits best for corporate, small business, portfolio, creative, personal websites. Professional way for you to present your agency, presonal or business portfolio.', 'fullscreen-lite').'</p><div class="row-fluid"><div class="span9"><p>'.__('Proin consequat sollicitudin mauris ut cursus. Phasellus sapien quam, egestas non tempor quis, elementum quis dui. Aliquam erat volutpat. In sit amet lectus nisi. In a elit sed velit placerat interdum a quis erat. Sed eget nibh quis turpis venenatis eleifend non eu augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin mauris ut cursus.', 'fullscreen-lite'). '</p><p>'. __('Phasellus sapien quam, egestas non tempor quis, elementum quis dui. Aliquam erat volutpat. In sit amet lectus nisi. In a elit sed velit placerat interdum a quis erat. Sed eget nibh quis turpis venenatis eleifend non eu augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin mauris ut cursus. Phasellus sapien quam, egestas non tempor quis, elementum quis dui. Aliquam erat volutpat. In sit amet.', 'fullscreen-lite'). '</p><ul><li class="square">'. __('Lorem ipsum dolor sit amet', 'fullscreen-lite'). '</li><li class="square">'. __('Proin consequat sollicitudin', 'fullscreen-lite'). '</li><li class="square">'. __('Phasellus sapien quam', 'fullscreen-lite'). '</li><li class="square">'. __('Sed eget nibh quis turpis venenatis', 'fullscreen-lite'). '</li></ul><p>'. __('Phasellus sapien quam, egestas non tempor quis, elementum quis dui. Aliquam erat volutpat. In sit amet lectus nisi. In a elit sed velit placerat interdum a quis erat.', 'fullscreen-lite'). '</p>'.'</div><div class="span3"><img src="'.get_template_directory_uri().'/images/img_girl.jpg" alt="Section Image" /></div></div>',
		'sanitize_callback' => 'fullscreen_lite_sanitize_textarea',
	));
	$wp_customize->add_control('fullscreen_lite_rat_first_section_content', array(
		'type' => 'textarea',
		'label' => __('Home First Section Content','fullscreen-lite'),
		'description' => __('Enter content for Home First Section', 'fullscreen-lite'),
		'section' => 'home_page_settings',
	));

	$wp_customize->add_setting( 'fullscreen_lite_rat_second_section_title', array(
		'default'        => __('Section Two', 'fullscreen-lite'),
		'sanitize_callback' => 'fullscreen_lite_sanitize_textarea',
	));
	$wp_customize->add_control('fullscreen_lite_rat_second_section_title', array(
		'label' => __('Home Second Section Title','fullscreen-lite'),
		'description' => __('(Create a custom link in Menus and put <b>#section1</b> in URL and Navigation Label according to you for landing page.))<br/>Enter title for home second section.', 'fullscreen-lite'),
		'section' => 'home_page_settings',
	));

	$wp_customize->add_setting( 'fullscreen_lite_rat_second_section_content', array(
		'default'        => '<p class="big-paragraph">'.__('FullScreen fits best for corporate, small business, portfolio, creative, personal websites. Professional way for you to present your agency, presonal or business portfolio.', 'fullscreen-lite').'</p><div class="row-fluid"><div class="span3"><img src="'.get_template_directory_uri().'/images/img_boy.jpg" alt="'.__('Section Image','fullscreen-lite').'" /></div><div class="span9"><p>'.__('Proin consequat sollicitudin mauris ut cursus. Phasellus sapien quam, egestas non tempor quis, elementum quis dui. Aliquam erat volutpat. In sit amet lectus nisi. In a elit sed velit placerat interdum a quis erat. Sed eget nibh quis turpis venenatis eleifend non eu augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin mauris ut cursus.', 'fullscreen-lite'). '</p><p>'. __('Phasellus sapien quam, egestas non tempor quis, elementum quis dui. Aliquam erat volutpat. In sit amet lectus nisi. In a elit sed velit placerat interdum a quis erat. Sed eget nibh quis turpis venenatis eleifend non eu augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin mauris ut cursus. Phasellus sapien quam, egestas non tempor quis, elementum quis dui. Aliquam erat volutpat. In sit amet.', 'fullscreen-lite'). '</p><ul><li class="square">'. __('Lorem ipsum dolor sit amet', 'fullscreen-lite'). '</li><li class="square">'. __('Proin consequat sollicitudin', 'fullscreen-lite'). '</li><li class="square">'. __('Phasellus sapien quam', 'fullscreen-lite'). '</li><li class="square">'. __('Sed eget nibh quis turpis venenatis', 'fullscreen-lite'). '</li></ul><p>'. __('Phasellus sapien quam, egestas non tempor quis, elementum quis dui. Aliquam erat volutpat. In sit amet lectus nisi. In a elit sed velit placerat interdum a quis erat.', 'fullscreen-lite'). '</p>'.'</div></div>',
		'sanitize_callback' => 'fullscreen_lite_sanitize_textarea',
	));
	$wp_customize->add_control('fullscreen_lite_rat_second_section_content', array(
		'type' => 'textarea',
		'label' => __('Home Second Section Content','fullscreen-lite'),
		'description' => __('Enter content for Home Second Section', 'fullscreen-lite'),
		'section' => 'home_page_settings',
	));

	$wp_customize->add_setting( 'fullscreen_lite_rat_third_section_title', array(
		'default'        => __('Section Three', 'fullscreen-lite'),
		'sanitize_callback' => 'fullscreen_lite_sanitize_textarea',
	));
	$wp_customize->add_control('fullscreen_lite_rat_third_section_title', array(
		'label' => __('Home Third Section Title','fullscreen-lite'),
		'description' => __('(Create a custom link in Menus and put <b>#section1</b> in URL and Navigation Label according to you for landing page.))<br/>Enter title for home third section.', 'fullscreen-lite'),
		'section' => 'home_page_settings',
	));

	$wp_customize->add_setting( 'fullscreen_lite_rat_third_section_content', array(
		'default'        => '<p class="big-paragraph">'.__('FullScreen fits best for corporate, small business, portfolio, creative, personal websites. Professional way for you to present your agency, presonal or business portfolio.', 'fullscreen-lite').'</p><div class="row-fluid"><div class="span9"><p>'.__('Proin consequat sollicitudin mauris ut cursus. Phasellus sapien quam, egestas non tempor quis, elementum quis dui. Aliquam erat volutpat. In sit amet lectus nisi. In a elit sed velit placerat interdum a quis erat. Sed eget nibh quis turpis venenatis eleifend non eu augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin mauris ut cursus.', 'fullscreen-lite'). '</p><p>'. __('Phasellus sapien quam, egestas non tempor quis, elementum quis dui. Aliquam erat volutpat. In sit amet lectus nisi. In a elit sed velit placerat interdum a quis erat. Sed eget nibh quis turpis venenatis eleifend non eu augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin mauris ut cursus. Phasellus sapien quam, egestas non tempor quis, elementum quis dui. Aliquam erat volutpat. In sit amet.', 'fullscreen-lite'). '</p><ul><li class="square">'. __('Lorem ipsum dolor sit amet', 'fullscreen-lite'). '</li><li class="square">'. __('Proin consequat sollicitudin', 'fullscreen-lite'). '</li><li class="square">'. __('Phasellus sapien quam', 'fullscreen-lite'). '</li><li class="square">'. __('Sed eget nibh quis turpis venenatis', 'fullscreen-lite'). '</li></ul><p>'. __('Phasellus sapien quam, egestas non tempor quis, elementum quis dui. Aliquam erat volutpat. In sit amet lectus nisi. In a elit sed velit placerat interdum a quis erat.', 'fullscreen-lite'). '</p>'.'</div><div class="span3"><img src="'.get_template_directory_uri().'/images/img_lamp.jpg" alt="Section Image" /></div></div>',
		'sanitize_callback' => 'fullscreen_lite_sanitize_textarea',
	));
	$wp_customize->add_control('fullscreen_lite_rat_third_section_content', array(
		'type' => 'textarea',
		'label' => __('Home Third Section Content','fullscreen-lite'),
		'description' => __('Enter content for Home Third Section', 'fullscreen-lite'),
		'section' => 'home_page_settings',
	));

	
	// ====================================
	// = Blog Page Settings Sections
	// ====================================
	$wp_customize->add_setting( 'fullscreen_lite_blogpage_heading', array(
		'default'        => __('Blog', 'fullscreen-lite'),
		'sanitize_callback' => 'fullscreen_lite_sanitize_textarea',
	));
	$wp_customize->add_control('fullscreen_lite_blogpage_heading', array(
		'label' => __( 'Enter Blog Page Title', 'fullscreen-lite'),
		'description' => __('Enter Blog Page Title text.', 'fullscreen-lite'),
		'section' => 'blog_page_settings',
	));

	// ====================================
	// = Social Settings Sections
	// ====================================
	$wp_customize->add_setting( 'fullscreen_lite_fbook_link', array(
		'default'        => '#',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('fullscreen_lite_fbook_link', array(
		'label' => __('Facebook Link', 'fullscreen-lite'),
		'description' => __('Enter Facebook Link.', 'fullscreen-lite'),
		'section' => 'social_link_settings',
	));

	$wp_customize->add_setting( 'fullscreen_lite_twitter_link', array(
		'default'        => '#',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('fullscreen_lite_twitter_link', array(
		'label' => __('Twitter Link', 'fullscreen-lite'),
		'description' => __('Enter Twitter link.', 'fullscreen-lite'),
		'section' => 'social_link_settings',
	));

	$wp_customize->add_setting( 'fullscreen_lite_pinterest_link', array(
		'default'        => '#',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('fullscreen_lite_pinterest_link', array(
		'label' => __('Pinterest Link', 'fullscreen-lite'),
		'description' => __('Enter Pinterest link.', 'fullscreen-lite'),
		'section' => 'social_link_settings',
	));

	$wp_customize->add_setting( 'fullscreen_lite_dribbble_link', array(
		'default'        => '#',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('fullscreen_lite_dribbble_link', array(
		'label' => __('Dribbble Link', 'fullscreen-lite'),
		'description' => __('Enter Dribbble link.', 'fullscreen-lite'),
		'section' => 'social_link_settings',
	));

	$wp_customize->add_setting( 'fullscreen_lite_tumblr_link', array(
		'default'        => '#',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('fullscreen_lite_tumblr_link', array(
		'label' => __('Tumblr Link', 'fullscreen-lite'),
		'description' => __('Enter Tumblr link.', 'fullscreen-lite'),
		'section' => 'social_link_settings',
	));
	
	// ====================================
	// = Footer Settings Sections
	// ====================================
	$wp_customize->add_setting( 'fullscreen_lite_copyright', array(
		'default'        => __('Proudly Powered by WordPress', 'fullscreen-lite'),
		'sanitize_callback' => 'fullscreen_lite_sanitize_textarea',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('fullscreen_lite_copyright', array(
		'label' => __('Copyright Text','fullscreen-lite'),
		'section' => 'footer_settings',
	));
	
}
add_action( 'customize_register', 'fullscreen_lite_customize_register' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Twenty Fifteen 1.0
 */
function fullscreen_lite_customize_preview_js() {
	wp_enqueue_script( 'fullscreen-lite-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'fullscreen_lite_customize_preview_js' );


// sanitize textarea
function fullscreen_lite_sanitize_textarea( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function fullscreen_lite_sanitize_on_off( $input ) {
	$valid = array(
		'on' =>'ON',
		'off'=> 'OFF'
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function fullscreen_lite_sanitize_background_repeat( $input ) {
	$valid = array(
		'no-repeat'  => __('No Repeat', 'fullscreen-lite'),
		'repeat'     => __('Tile', 'fullscreen-lite'),
		'repeat-x'   => __('Tile Horizontally', 'fullscreen-lite'),
		'repeat-y'   => __('Tile Vertically', 'fullscreen-lite'),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function fullscreen_lite_sanitize_background_position( $input ) {
	$valid = array(
		'left'       => __('Left', 'fullscreen-lite'),
		'center'     => __('Center', 'fullscreen-lite'),
		'right'      => __('Right', 'fullscreen-lite'),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function fullscreen_lite_sanitize_background_attachment( $input ) {
	$valid = array(
		'scroll'     => __('Scroll', 'fullscreen-lite'),
		'fixed'      => __('Fixed', 'fullscreen-lite'),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function fullscreen_lite_active_brand_section( $control ) {
	if ( $control->manager->get_setting('fullscreen_lite_home_brand_sec')->value() == 'on' ) {
		return true;
	} else {
		return false;
	}
}

function fullscreen_lite_active_breadcrumb_image( $control ) {
	if ( $control->manager->get_setting('breadcrumbbg_image')->value() != '' ) {
		return true;
	} else {
		return false;
	}
}