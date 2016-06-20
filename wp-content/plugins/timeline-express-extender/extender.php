<?php
/*
 Plugin Name: Timeline Express Extender
 Description: extends timeline express.
 Author :Stefan Derian Hartono
 */
 require('extender_container/ajax-button.php');


 function enqueue_ajax_scripts(){
 	wp_register_script('ajax-script1',plugins_url('/js/ajax-action.js',__FILE__),array('jquery'));
 	wp_enqueue_script('ajax-script1');
 	wp_localize_script( 'ajax-script1', 'ajax_object',
 		array( 'ajax_url' => admin_url( 'admin-ajax.php' )));
 }
 add_action('wp_enqueue_scripts','enqueue_ajax_scripts');

 add_action('wp_ajax_single_post','single_post_callback');
 add_action('wp_ajax_nopriv_single_post','single_post_callback');
 function single_post_callback(){

 	

 	$return = array();
 	$args = array('p' =>  intval($_POST['postId'] ));
 	$post_result = new WP_Query(array('p' =>  intval($_POST['postId'] )));

 	if ( $post_result->have_posts() ) {

 		while ( $post_result->have_posts() ) {
 			$post_result->the_post();

 			$return['title']=get_the_title();
 			$return['content']=get_the_content();
 		}
 		
 	} else {
	// no posts found
 		$return['title']='not found';
 		$return['content']='not found';
 	}
 	/* Restore original Post Data */
 	wp_reset_postdata();
 	

 	wp_send_json_success($return);
 	die();
 }




 add_action( 'timeline-express-after-excerpt' ,'ajax_buttons',10,3);